<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:project', function () {
    $this->comment('Star Media Group Article Portal');
})->purpose('Display the project name');
