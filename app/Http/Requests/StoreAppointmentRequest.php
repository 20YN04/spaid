<?php

namespace App\Http\Requests;

use App\Enums\AppointmentStatus;
use App\Models\Availability;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StoreAppointmentRequest extends FormRequest
{
    public const MAX_ACTIVE_APPOINTMENTS = 2;

    public function authorize(): bool
    {
        return $this->user() !== null && $this->user()->triage_completed;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'availability_id' => [
                'required',
                Rule::exists('availabilities', 'id')->where(function ($q) {
                    $q->where('is_booked', 0)->where('start_time', '>', now());
                }),
                $this->matchesUserSpecialty(),
            ],
        ];
    }

    protected function matchesUserSpecialty(): Closure
    {
        return function (string $attribute, mixed $value, Closure $fail): void {
            $availability = Availability::with('psychologist')->find($value);

            if (! $availability || ! $availability->psychologist) {
                $fail('Selected slot is unavailable.');

                return;
            }

            $triage = $this->user()->triageResult()->first();
            if (! $triage) {
                $fail('Triage must be completed before booking.');

                return;
            }

            if (! $availability->psychologist->handlesIssue($triage->issue_type)) {
                $fail('Selected psychologist does not handle your program type.');
            }
        };
    }

    protected function passedValidation(): void
    {
        $activeCount = $this->user()
            ->appointments()
            ->where('status', AppointmentStatus::Scheduled->value)
            ->where('scheduled_at', '>', now())
            ->count();

        if ($activeCount >= self::MAX_ACTIVE_APPOINTMENTS) {
            throw ValidationException::withMessages([
                'availability_id' => 'Computer says no: You have reached the maximum allowed limit of 2 active booking sessions.',
            ]);
        }
    }
}
