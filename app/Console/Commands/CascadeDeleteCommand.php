<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CascadeDeleteCommand extends Command
{
    protected $signature = 'cascade:delete';
    protected $description = 'Cascade delete from parent tables';

    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('films')->truncate();

        DB::table('actors')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->info('Cascade delete completed.');
    }
}
