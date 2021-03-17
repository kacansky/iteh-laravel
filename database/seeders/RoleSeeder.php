<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $made=0;
       for ($i=0; $i < 1000; $i++) { 
          try {
            Role::factory()->count(1)->create();
            $made=$made+1;
            if($made==40){
                break;
            }
          } catch (\Throwable $th) {
           
          }
       }
    }
}
