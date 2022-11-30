<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection('calendars')->delete();
        $obj_json = file_get_contents('./database/seeds/calendar.json');
        //$users = str_replace("\"deleted_at\" : null,","\"deleted_at\" : null",$users);
        //$users = json_encode($users);
        $obj_json_decoded = json_decode($obj_json,true);
        $obj_json_decoded = $obj_json_decoded["calendar"];
        for($i=0;$i<count($obj_json_decoded);$i++) {
            DB::collection('calendars')->insert( $obj_json_decoded[$i] );
        }
    }
}
