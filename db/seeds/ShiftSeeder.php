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

        foreach (range(1, 30) as $index) {

            $start_time = Carbon::now()->addDays(rand(1,30))->addHours(rand(1,12));
            $end_time = $start_time->addHours(8);

            $shifts[] = [
                'manager_id'    => rand(26, 35),
                'employee_id'   => rand(1, 25),
                'break'         => 0.5,
                'start_time'    => $start_time,
                'end_time'      => $end_time,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }

        $this->insert('shifts', $shifts);
    }
}
