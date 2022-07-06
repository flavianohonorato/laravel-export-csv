<?php

namespace App\Console\Commands;

use App\Jobs\ProcessJsonToCsv;
use Illuminate\Console\Command;

class ProcessJsonToCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export-to-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export from database to csv file';

    /**
     * @return void
     */
    public function handle()
    {
        $this->info('Executando a job ProcessJsonToCsv....');
        ProcessJsonToCsv::dispatch();
        $this->info('Job executado com sucesso!');
    }
}
