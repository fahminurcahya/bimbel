<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->username = "admin";
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = \Hash::make("admin");
        $user->level = "admin";
        $user->save();

        $user2 = new \App\User;
        $user2->username = "fahmi";
        $user2->name = "fahmi";
        $user2->email = "fahmi@gmail.com";
        $user2->password = \Hash::make("fahmi");
        $user2->level = "akademik";
        $user2->save();

        $user3 = new \App\User;
        $user3->username = "nurcahya";
        $user3->name = "Nurcahya";
        $user3->email = "nurcahya@gmail.com";
        $user3->password = \Hash::make("nurcahya");
        $user3->level = "akademik";
        $user3->save();

        $user4 = new \App\User;
        $user4->username = "nada";
        $user4->name = "nada";
        $user4->email = "nada@gmail.com";
        $user4->password = \Hash::make("nada");
        $user4->level = "siswa";
        $user4->save();

        $user5 = new \App\User;
        $user5->username = "nida";
        $user5->name = "nida";
        $user5->email = "nida@gmail.com";
        $user5->password = \Hash::make("nida");
        $user5->level = "siswa";
        $user5->save();
        $this->command->info("User Admin berhasil dibuat");
    }
}
