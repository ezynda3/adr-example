<?php

use Phinx\Seed\AbstractSeed;
use Carbon\Carbon;

class ShiftSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $shifts = [];

        $dt = Carbon::create(2016, 3, 1, 0);

        foreach (range(0, 31) as $i) {
            foreach (range(0, 3) as $j) {

                $shifts[] = [
                    'manager_id' => rand(26, 35),
                    'employee_id' => rand(1, 25),
                    'break' => 0.5,
                    'start_time' => $dt->copy()->addDays($i)->addHours($j * 8),
                    'end_time' => $dt->copy()->addDays($i)->addHours($j * 8 + 8),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }

        $this->insert('shifts', $shifts);
    }
}
