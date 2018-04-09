<?php

use Illuminate\Database\Seeder;

class TimeSheetTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        factory('App\TimeSheet', 30)->create();
    }
}
