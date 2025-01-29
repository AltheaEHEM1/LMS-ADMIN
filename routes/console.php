<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Circulation;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('circulations:update-overdue', function (){
    $now = Carbon::now();

        $updatedRows = Circulation::where('status', 'borrowed')
            ->where('due_date', '<', $now)
            ->update(['status' => 'overdue']);

        $this->info("Updated $updatedRows records to overdue.");
})->purpose('Updaterecordseveryminute')->everyMinute();
