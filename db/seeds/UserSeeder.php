<?php

use Carbon\Carbon;
use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $employees = [];
        foreach (range(1,25) as $index) {
            $employees[] = [
                'name'          => $faker->name,
                'role'          => 'employee',
                'email'         => $faker->email,
                'phone'         => $faker->phoneNumber,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }

        $managers = [];
        foreach (range(1,10) as $index) {
            $employees[] = [
                'name'          => $faker->name,
                'role'          => 'manager',
                'email'         => $faker->email,
                'phone'         => $faker->phoneNumber,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }

        $this->insert('users', $employees);
        $this->insert('users', $managers);
    }
}
