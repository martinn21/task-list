<?php

use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groups = factory(App\Models\Groups::class, 10)->make();

        foreach ($groups as $group) {
            repeat:
            try {
                $group->save();
            } catch (QueryException $e) {
                $group = factory(App\Models\Groups::class)->make();
                goto repeat;
            }
        }
    }
}
