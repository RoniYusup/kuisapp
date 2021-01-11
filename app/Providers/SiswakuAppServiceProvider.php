<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class SiswakuAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman ='';
    if (Request::segment(1) == 'siswa') {
        $halaman = 'siswa';
     } 
    if (Request::segment(1) == 'dosen') {
        $halaman = 'dosen';
    }
    if (Request::segment(1) == 'matakuliah') {
        $halaman = 'matakuliah';
    }
    if (Request::segment(1) == 'soal') {
        $halaman = 'soal';
    }
    if (Request::segment(1) == 'studi') {
        $halaman = 'studi';
    }
    if (request()->segment(1) == 'user') {
            $halaman = 'user';
        }
    view()->share('halaman', $halaman);
    }
}
