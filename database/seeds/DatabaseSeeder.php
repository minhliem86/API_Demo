<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $tables = [
         'users',
         'articles'
     ];

     protected $seeders = [
        UserSeeder::class,
        ArticleSeeder::class
     ];

     private function truncateDatabase()
     {
         \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
         foreach ($this->tables as $table) {
              \DB::table($table)->truncate();
          }
          \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
     }
    public function run()
    {
        Model::unguard();
        if(\DB::connection()->getName() === 'mysql'){
            $this->truncateDatabase();
        }
        foreach($this->seeders as $seeder){
          $this->call($seeder);
        }
        Model::reguard();
        // $this->call(UsersTableSeeder::class);
    }
}
