<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $channelIds = Channel::pluck('id')->toArray();
        $contactIds = Contact::pluck('id')->toArray();

        return [
            'channel_ids' => $this->$faker->randomElement($channelIDs),
            'contact_id' => $this->$faker->randomElement($contactIDs)
        ];
    }
}
