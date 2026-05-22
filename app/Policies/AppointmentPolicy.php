<?php

namespace App\Policies;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{
    public const MAX_ACTIVE_APPOINTMENTS = 2;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Appointment $appointment): bool
    {
        return $appointment->user_id === $user->id;
    }

    public function create(User $user): Response
    {
        if (! $user->triage_completed) {
            return Response::deny('Triage must be completed before booking.');
        }

        $activeCount = $user->appointments()
            ->where('status', AppointmentStatus::Scheduled->value)
            ->where('scheduled_at', '>', now())
            ->count();

        if ($activeCount >= self::MAX_ACTIVE_APPOINTMENTS) {
            return Response::deny(
                'Computer says no: You have reached the maximum allowed limit of 2 active booking sessions.'
            );
        }

        return Response::allow();
    }

    public function update(User $user, Appointment $appointment): bool
    {
        return $appointment->user_id === $user->id
            && $appointment->status === AppointmentStatus::Scheduled;
    }

    public function delete(User $user, Appointment $appointment): bool
    {
        return $appointment->user_id === $user->id
            && $appointment->status === AppointmentStatus::Scheduled;
    }

    public function restore(User $user, Appointment $appointment): bool
    {
        return false;
    }

    public function forceDelete(User $user, Appointment $appointment): bool
    {
        return false;
    }
}
