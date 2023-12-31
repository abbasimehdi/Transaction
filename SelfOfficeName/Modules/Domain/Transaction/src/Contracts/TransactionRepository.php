<?php

namespace Selfofficename\Modules\Domain\Transaction\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;
use Selfofficename\Modules\Core\Http\Contracts\BaseRepository;
use Selfofficename\Modules\Core\Traits\ConvertNumberToEnglish;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;
use Selfofficename\Modules\Domain\Transaction\Patterns\SmsStrategy;
use Selfofficename\Modules\InfraStructure\Models\User;


class TransactionRepository extends BaseRepository
{
    use ConvertNumberToEnglish;

    protected $data;
    protected $amount = 0;

    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return Transaction::class;
    }

    /**
     ** @TODO
     * Refactor queries
     * @param array $data
     * @return JsonResponse
     */
    public function transaction(array $data): JsonResponse
    {
        try {
            $this->data = $this->convert2english($data);
            $this->data['source_card_id'] = $this->getCardNumberdetail()->id;
            $this->data['amount'] = $this->data['amount'] + config('transaction.settings.commission');

            $transaction = $this->create($this->data);

            // Insert commission
            Commission::query()->create([
                "transaction_id" => $transaction->id,
                'amount' => config('transaction.settings.commission')
            ]);

            // Update source card number amount
            Card::find($this->data['source_card_id'])
                ->decrement('amount', $transaction['amount']);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            return DB::rollback();
        }

        // Send sms wu=ith strategy pattern;
        return response()->json((new SmsStrategy($this->data))->send(), 200);
    }

    /**
     * @return Builder|Model|object|null
     */
    public function getCardNumberdetail()
    {
        return Card::query()->where('number', $this->data['source_card_number'])->first();
    }

    public function mostTransaction(): JsonResponse
    {
        $user = User::query()
            ->join('accounts', 'users.id', 'accounts.user_id')
            ->join('cards', 'accounts.id', 'cards.account_id')
            ->join('transactions', 'cards.id', 'transactions.source_card_id')
            ->where('transactions.created_at', '>=', now()->subMinutes(2000))
            ->select('users.*', DB::raw("count(users.id) as count"))
            ->groupBy('users.id')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();
        return response()->json(['result' =>
            $user->with('accounts')
        ]);
    }
}
