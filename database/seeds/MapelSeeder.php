<?php

use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = new \App\Mapel;
        $mapel->nama = "Matematika";
        $mapel->save();

        $mapel2 = new \App\Mapel;
        $mapel2->nama = "IPA";
        $mapel2->save();

        $mapel3 = new \App\mapel;
        $mapel3->nama = "IPS";
        $mapel3->save();

        $mapel4 = new \App\Mapel;
        $mapel4->nama = "B. Indonesia";
        $mapel4->save();

        $mapel5 = new \App\Mapel;
        $mapel5->nama = "B. Inggris";
        $mapel5->save();
    }
}
