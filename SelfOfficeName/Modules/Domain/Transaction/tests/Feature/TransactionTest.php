<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\InfraStructure\Models\User;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->token = $this->user->createToken('test token')->accessToken;
        $this->account = Account::factory(1)->create()->first();
        $this->card = Card::factory(10)->create();
    }

    /**
     * @test
     */
    public function a_user_can_be_create_the_transaction(): void
    {
        $response = $this->actingAs($this->user, 'api')->withHeader(
                'Authorization', "Bearer $this->token"

        )
            ->json('POST', "/api/v1/transaction" ,
            [
                'source_card_number'      => $this->card->first()->number,
                'destination_card_number' => $this->card->last()->number,
                'amount'                  => fake()->numberBetween(10000, 100000),
                'expired_date'            => mt_rand(02, 12),
                'cvv2'                    => fake()->numberBetween(100, 999),
                'status'                  => true,
            ]
        );

        $response->assertStatus(ResponseAlias::HTTP_OK);
    }
}
