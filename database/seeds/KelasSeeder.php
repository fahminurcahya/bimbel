<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = new \App\Kelas;
        $kelas->nama = "V";
        $kelas->save();

        $kelas2 = new \App\Kelas;
        $kelas2->nama = "VI";
        $kelas2->save();

        $kelas3 = new \App\Kelas;
        $kelas3->nama = "VII";
        $kelas3->save();

        $kelas4 = new \App\Kelas;
        $kelas4->nama = "VIII";
        $kelas4->save();

        $kelas5 = new \App\Kelas;
        $kelas5->nama = "IX";
        $kelas5->save();

        $kelas6 = new \App\Kelas;
        $kelas6->nama = "X";
        $kelas6->save();
    }
}
