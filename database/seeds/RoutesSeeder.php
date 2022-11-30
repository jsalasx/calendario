<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection('routes')->delete();
        $obj_json = file_get_contents('./database/seeds/routes.json');
        //$users = str_replace("\"deleted_at\" : null,","\"deleted_at\" : null",$users);
        //$users = json_encode($users);
        $obj_json_decoded = json_decode($obj_json,true);
        $obj_json_decoded = $obj_json_decoded["routes"];
        for($i=0;$i<count($obj_json_decoded);$i++) {
            DB::collection('routes')->insert( $obj_json_decoded[$i] );
        }
    }
}
