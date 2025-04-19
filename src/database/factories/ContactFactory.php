<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
// use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();
        $itemIds = Item::pluck('id')->toArray();

        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'item_id' => $this->faker->randomElement($itemIds),
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->phoneNumber,
            // 'tel2' => $this->faker->phoneNumber,
            // 'tel3' => $this->faker->phoneNumber,
            'address' => $this->faker->prefecture,
            'address' => $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->realText(120),
            // 'channel_ids' => $this->faker->numberBetween(1, 5),
        ];
    }
}
