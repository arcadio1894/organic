<?php

namespace Tests\Feature\Login;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectFormLogin()
    {
        $departments = [];
        $response = $this->get(route('login', $departments));

        $response->assertStatus(200);

        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function LoginDisplayValidationError()
    {
        $response = $this->post(route('login', []));
        $response->assertStatus(302);
        $response->assertSessionHasErrors('dni');
    }

    /** @test */
    public function LoginAuthenticateUser()
    {
        $departments = [];
        $user = factory(User::class)->create();

        $response = $this->post(route('login', [
            'dni' => $user->dni,
            'password' => 'password'
        ]));
        $response->assertRedirect(route('home', $departments));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function RegisterAndAuthenticateUser()
    {
        $departments = [];
        Artisan::call('migrate');
        Artisan::call('db:seed');

        $response = $this->post(route('register', [
            'name' => 'Juan Perez',
            'dni' => '10000001',
            'email' => 'juanperez@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '958585852',
            'address' => 'Av. Peru 123',
            'postcode' => '+51',
            'city' => 'Trujillo',
            'country' => 'Perú',
        ]));
        $response->assertRedirect(route('home', $departments));

    }

    /** @test */
    public function VerifyIfUserIsDatabase()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');

        $this->post(route('register', [
            'name' => 'Juan Perez',
            'dni' => '10000001',
            'email' => 'juanperez@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '958585852',
            'address' => 'Av. Peru 123',
            'postcode' => '+51',
            'city' => 'Trujillo',
            'country' => 'Perú',
        ]));

        $this->assertDatabaseHas('users', [
            'name' => 'Juan Perez',
            'dni' => '10000001',
        ]);
    }

    /** @test */
    public function IndexReturnAView()
    {
        $departments = [];
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('home', $departments));

        $response->assertStatus(200);
    }

}
