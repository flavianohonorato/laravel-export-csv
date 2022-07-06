<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function get_all_users()
    {
        $return = $this->get(route('users.index'));

        $return->assertOk();
    }

    /**
     * @test
     *
     * @return void
     */
    public function create_new_user()
    {
        $data = [
            'name' => 'Joao Doe',
            'email' => 'joao@email.com',
            'phone' => '987654327675',
            'cpf' => '01258638372',
            'password' => 'secret'
        ];

        $return = $this->post(route('users.store'), $data);

        $return->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'email' => $data['email']
        ]);
    }
}
