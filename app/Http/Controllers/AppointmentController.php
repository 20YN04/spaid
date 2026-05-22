<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatus;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function store(StoreAppointmentRequest $request): RedirectResponse
    {
        $user = $request->user();

        $this->authorize('create', Appointment::class);

        $appointment = DB::transaction(function () use ($user, $request): Appointment {
            $availability = Availability::query()
                ->whereKey($request->validated('availability_id'))
                ->where('is_booked', false)
                ->lockForUpdate()
                ->firstOrFail();

            $availability->forceFill(['is_booked' => true])->save();

            return Appointment::create([
                'user_id' => $user->id,
                'psychologist_id' => $availability->psychologist_id,
                'availability_id' => $availability->id,
                'scheduled_at' => $availability->start_time,
                'status' => AppointmentStatus::Scheduled,
            ]);
        });

        return redirect()
            ->route('dashboard')
            ->with('status', "Appointment confirmed for {$appointment->scheduled_at->format('Y-m-d H:i')}.");
    }

    public function destroy(Appointment $appointment): RedirectResponse
    {
        $this->authorize('delete', $appointment);

        DB::transaction(function () use ($appointment): void {
            $appointment->forceFill(['status' => AppointmentStatus::Cancelled])->save();
            $appointment->availability?->forceFill(['is_booked' => false])->save();
        });

        return redirect()->route('dashboard')->with('status', 'Appointment cancelled.');
    }
}
