<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule::command('send:daily-videos')
//     // ->dailyAt('04:00');
//     ->everyMinute()->withoutOverlapping();

Schedule::command('send:daily-videos --batch=1')->everyMinute()->withoutOverlapping();
// Schedule::command('send:daily-videos --batch=2')->dailyAt('04:05')->withoutOverlapping();
// Schedule::command('send:daily-videos --batch=3')->dailyAt('04:10')->withoutOverlapping();
