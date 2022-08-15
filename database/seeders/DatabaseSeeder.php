<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(5)
            ->has(Post::factory(2))
            ->create();

        DB::table('users')->insert([
            'name' => 'test',
            'login' => 'test',
            'password' => bcrypt('test'),
        ]);
    }
}
