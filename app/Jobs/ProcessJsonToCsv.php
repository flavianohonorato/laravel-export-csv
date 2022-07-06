<?php

namespace App\Jobs;

use App\Services\UserService;
use App\Support\Csv;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessJsonToCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @return mixed
     * @throws Exception
     */
    public function handle()
    {
        if (!$users = $this->getAll()) {
            throw new Exception('Ainda não existem registros a serem exportados');
        }

        Csv::createCsvFromArray($users);

        info('USERS', [$users]);
    }

    public function failed(\Throwable $throwable)
    {
        logger('Erro ao processar a job ' . __CLASS__, [$throwable->getMessage()]);
    }

    /**
     * @return array
     */
    private function getAll(): array
    {
        return (new UserService())->getAll();
    }
}
