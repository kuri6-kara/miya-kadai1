<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;
use App\Models\Contact;

class ChannelContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Channel_Contact::class, 35)->create();
    }
}
