<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $eventName = $this->faker->name;
        return [
            'name'=> $eventName,
            'slug'=>Str::slug($eventName),
            'startAt'=>$this->faker->dateTimeBetween('-60 days','-30 days'),
            'endAt'=>$this->faker->dateTimeBetween('-30 days','+30 days'),
        ];
    }
}
