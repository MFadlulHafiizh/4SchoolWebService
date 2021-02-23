<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ruangan')->insert([
         
            [
            'nama'=> 'D 1.1',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '1',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 1.2',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '1',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 1.3',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '1',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 1.4',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '1',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 1.5',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '1',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 2.1',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '2',
            'status'=> 'Ada',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 2.2',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 2.3',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 2.4',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'D 2.5',
            'tipe'=> 'kelas',
            'blok'=> 'D',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'E 1.2',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'E 1.3',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
           ],
            [
            'nama'=> 'E 2.1',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'E 2.2',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'E 2.3',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'E 2.4',
            'tipe'=> 'kelas',
            'blok'=> 'E',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
            ],
            [
            'nama'=> 'G 1',
            'tipe'=> 'kelas',
            'blok'=> 'G',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
             ],
             [
            'nama'=> 'G 2',
            'tipe'=> 'kelas',
            'blok'=> 'G',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
             ],
             [
            'nama'=> 'G 3',
            'tipe'=> 'kelas',
            'blok'=> 'G',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
              ],
             [
            'nama'=> 'G 4',
            'tipe'=> 'kelas',
            'blok'=> 'G',
            'lantai'=> '1',
            'status'=> 'Kosong',
            'deskripsi'=> ''
             ],
            [
            'nama'=> 'G 2.1',
            'tipe'=> 'kelas',
            'blok'=> 'G',
            'lantai'=> '2',
            'status'=> 'Kosong',
            'deskripsi'=> ''
             ]
              
        ]);
    }
}
