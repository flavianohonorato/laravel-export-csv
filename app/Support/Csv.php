<?php

namespace App\Support;

use Exception;
use App\Support\Util;

class Csv
{
    /**
     * @param  array  $data
     * @return void
     * @throws Exception
     */
    public static function createCsvFromArray(array $data)
    {
        $file = self::getFile();

        if (!$file) {
            throw new Exception('Arquivo CSV não existe');
        }

        if (($handle = fopen($file, 'a')) !== false) {
            foreach ($data as $fields) {
                $user = [
                    $fields['id'],
                    $fields['name'],
                    $fields['email'],
                    $fields['cpf'],
                    $fields['phone'],
                    Util::dateToBr($fields['created_at'], true)
                ];

                fputcsv($handle, $user, ';');
            }

            fclose($handle);
        }
    }

    /**
     * @return string
     */
    public static function getFile(): string
    {
        $path = public_path('assets/files/users.csv');

        return file_exists($path) ? $path : file_put_contents($path, '');
    }
}
