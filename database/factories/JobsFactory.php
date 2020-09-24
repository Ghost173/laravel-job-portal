<?php

namespace Database\Factories;
use App\Models\User;

use App\Models\Company;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jobs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'company_id' =>Company::all()->random()->id,
            'title' => $title=$this->faker->text,
            'slung' => str_slug($title),
            'position'=>$this->faker->jobTitle,
            'address' => $this->faker->address,
            'category_id'=> rand(1,5),
            'type' =>'fulltime',
            'status'=> rand(0,1),
            'description' => $this->faker->paragraph(rand(2,10)),
            'roles' => $this->faker->text,
            'laste_date' => $this->faker->dateTime

        ];
    }
}
