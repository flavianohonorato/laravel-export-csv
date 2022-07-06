<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;

class CsvController extends Controller
{
    public function sendDataToJob(CsvRequest $csvRequest)
    {
        try {

        } catch (\Exception $exception) {
            logger('Erro ao enviar dados.', [
                $exception->getMessage(),
                $csvRequest->all()
            ]);
            return response()->json([
                'status' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
        }
    }
}
