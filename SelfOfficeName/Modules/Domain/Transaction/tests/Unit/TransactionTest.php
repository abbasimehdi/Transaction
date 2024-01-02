<?php

namespace Selfofficename\Modules\Domain\Transaction\tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Selfofficename\Modules\Core\Traits\ConvertNumberToEnglish;
use Selfofficename\Modules\Core\Traits\ConvertNumberToPersian;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;
use Selfofficename\Modules\InfraStructure\Models\User;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;
    use ConvertNumberToEnglish;
    use ConvertNumberToPersian;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->account = Account::factory(1)->create()->first();
        $this->card = Card::factory(1)->create()->first();
        $this->transaction = Transaction::factory(1)->create()->first();
        $this->commission = Commission::factory(1)->create()->first();
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

    /** @test
     * @doesNotPerformAssertions
     */
    public function convert_persian_arabic_numbers_to_english()
    {
        $this->convertToEnglish($this->convertToPersian($this->card));
    }

    /** @test
     */
    public function an_transaction_belongs_to_a_card()
    {
        $this->assertEquals($this->card->id, $this->transaction->source_card_id);
        $this->assertInstanceOf(Card::class, $this->transaction->card);
        $this->assertEquals($this->card->id, $this->transaction->card->id);
    }

    /** @test
     */
    public function an_transaction_has_one_a_commission()
    {
        $this->assertEquals($this->transaction->id, $this->commission->transaction_id);
        $this->assertInstanceOf(Transaction::class, $this->commission->transaction);
        $this->assertEquals($this->transaction->id, $this->commission->transaction->id);
    }
}
