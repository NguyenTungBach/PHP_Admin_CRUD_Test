<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'eventName' => $this->faker->name(),
            'bandNames' => $this->faker->name(),
            'startDate' => $this->faker->dateTime(),
            'endDate' => $this->faker->dateTime(),
            'thumbnail' => $this->faker->imageUrl(),
            'portfolio_id' => rand(1, 5),
            'ticketPrice' => rand(100000, 1000000),
            'status' => rand(1, 3),
            'created_at' => Carbon::now(),
        ];
    }
}
