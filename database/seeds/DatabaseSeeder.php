<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(BranchesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UOMsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductInventoriesTableSeeder::class);
    }
}
