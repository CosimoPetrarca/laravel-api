<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 30; $i++) {
            $newContact = new Contact();

            $newContact->name = fake()->name;
            $newContact->email = fake()->email;
            $newContact->message = fake()->text();

            $newContact->save();
        }
    }
}
