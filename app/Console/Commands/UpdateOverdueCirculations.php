<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Circulation;
use Carbon\Carbon;

class UpdateOverdueCirculations extends Command
{
    protected $signature = 'circulations:update-overdue';
    protected $description = 'Update circulation records to overdue if due date has passed';

    public function handle()
    {
        $now = Carbon::now();

        $updatedRows = Circulation::where('status', 'borrowed')
            ->where('due_date', '<', $now)
            ->update(['status' => 'overdue']);

        $this->info("Updated $updatedRows records to overdue.");
    }
}
