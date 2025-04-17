<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Channel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
