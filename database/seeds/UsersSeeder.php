<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::collection('users')->delete();
        $users = file_get_contents('./database/seeds/users.json');
        $users = str_replace("\"deleted_at\" : null,","\"deleted_at\" : null",$users);
        //$users = json_encode($users);
        $users_decoded = json_decode($users,true);
        $users_decoded = $users_decoded["users"];
        for($i=0;$i<count($users_decoded);$i++) {
            DB::collection('users')->insert( $users_decoded[$i] );
        }


    }
}
