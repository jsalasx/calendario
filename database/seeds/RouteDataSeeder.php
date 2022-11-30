<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::collection('routes_data')->delete();
        $obj_json = (file_get_contents("./database/seeds/route_data.json"));
        $chars = str_split($obj_json);

        $find = "created_at";
        $find_array = str_split($find);
        $cont = 0;
        $pos = array();
       for($i=0;$i<count($chars);$i++) {
            if ($chars[$i]==$find_array[0]) {
                $cont ++;
                for($j=1;$j<count($find_array);$j++) {
                    if ($chars[$i+$j]===$find_array[$j]) {
                        $cont++;
                    }
                }
                if ($cont == count($find_array)) {
                    $pos[] = $i;
                }
                $cont=0;
            }
       }

       $cont = 0;
       foreach($pos as $p) {
           $cadena_con_coma = substr($obj_json, $p-$cont, 36 );
           $cadena = substr($cadena_con_coma, 0, -1);
           $obj_json = str_replace($cadena_con_coma, $cadena, $obj_json);
           $cont ++;
       }
       $obj_json_decoded = json_decode($obj_json,true);
       $obj_json_decoded = $obj_json_decoded["routes_data"];
        for($i=0;$i<count($obj_json_decoded);$i++) {
            DB::collection('routes_data')->insert( $obj_json_decoded[$i] );
        }
    }
}
