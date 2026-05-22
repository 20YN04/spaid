<?php

namespace Database\Seeders;

use App\Models\Availability;
use App\Models\Psychologist;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Hours of day each psychologist offers a 1-hour slot (24h, local time).
     * Weekdays only.
     */
    protected array $slotHours = [9, 10, 11, 14, 15, 16];

    protected int $daysAhead = 14;

    public function run(): void
    {
        $today = CarbonImmutable::now()->startOfDay();

        Psychologist::query()->each(function (Psychologist $psy) use ($today): void {
            for ($d = 1; $d <= $this->daysAhead; $d++) {
                $day = $today->addDays($d);

                if ($day->isWeekend()) {
                    continue;
                }

                foreach ($this->slotHours as $hour) {
                    $start = $day->setTime($hour, 0);
                    $end = $start->addHour();

                    Availability::updateOrCreate(
                        [
                            'psychologist_id' => $psy->id,
                            'start_time' => $start,
                        ],
                        [
                            'end_time' => $end,
                            'is_booked' => false,
                        ],
                    );
                }
            }
        });
    }
}
