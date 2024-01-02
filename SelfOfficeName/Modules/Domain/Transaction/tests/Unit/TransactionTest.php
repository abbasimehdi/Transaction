<?php

namespace Selfofficename\Modules\Domain\Transaction\tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;
use Selfofficename\Modules\InfraStructure\Models\User;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->account = Account::factory(1)->create()->first();
        $this->card = Card::factory(1)->create()->first();
    }

    /**
     * @test
     */
    public function transaction_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('transactions', [
                'source_card_id', 'destination_card_number', 'amount', 'status'
            ]));
    }


    /** @test
     * @doesNotPerformAssertions
     */
    public function it_has_one_card()
    {
        Transaction::factory()->create([
            'source_card_id' => $this->card->id,
        ]);
    }
}
