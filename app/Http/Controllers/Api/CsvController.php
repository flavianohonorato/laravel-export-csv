<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class CsvController extends Controller
{
    /**
     * @var UserService $userService
     */
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param CsvRequest $request
     * @return JsonResponse
     */
    public function sendDataToJob(CsvRequest $request): JsonResponse
    {
        try {
            $validator = validator()->make($request->all(), $request->rules(), $request->messages());

            if ($validator->fails()) {
                return response()->json([
                    'message'  =>  'Ocorreu um erro. Por favor, tente novamente!',
                    'code'     =>  422,
                    'errors'   =>  $validator->errors()
                ]);
            }

            $data = $request->validated();
            $user = $this->userService->store($data);

            if (!$user) {
                return response()->json([
                    'success'   =>  false,
                    'message'   =>  'Ocorreu um erro. Por favor, tente novamente!',
                    'code'      =>  417,
                ]);
            }

            return response()->json([
                'message'   => 'Registro cadastrado com sucesso!',
                'code'      => 201,
                'user'      => $user
            ], 201);
        } catch (\Exception $exception) {
            logger('Erro ao enviar dados.', [
                $exception->getMessage(),
                [$request->all()]
            ]);
            return response()->json([
                'status' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
        }
    }
}
