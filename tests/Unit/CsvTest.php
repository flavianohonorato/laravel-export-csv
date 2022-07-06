<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Support\Csv;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CsvTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function check_if_csv_file_exists()
    {
        $file = (Csv::getFile());
        $this->assertFileExists($file);
    }

    /**
     * @test
     * @return void
     */
    public function export_from_db_to_csv()
    {
        $user1 = [
            'name' => 'Joao Doe',
            'email' => 'joao@email.com',
            'phone' => '987654327675',
            'cpf' => '013.678.221-72',
            'password' => 'secret'
        ];

        $return = $this->post(route('users.store'), $user1);
        $return->assertSuccessful();

        $user2 = [
            'name' => 'Jane Doe',
            'email' => 'jane@email.com',
            'phone' => '897654543122',
            'cpf' => '012.435.346-78',
            'password' => 'secret'
        ];

        $return = $this->post(route('users.store'), $user2);
        $return->assertSuccessful();

        $this->artisan('export-to-csv')
            ->expectsOutput('Job executado com sucesso!')
            ->assertExitCode(0);
    }
}
