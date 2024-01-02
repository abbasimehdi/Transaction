<?php

namespace Selfofficename\Modules\Domain\Transaction\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Selfofficename\Modules\Core\Exceptions\Customexception;
use Selfofficename\Modules\Core\Http\Contracts\BaseRepository;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;
use Selfofficename\Modules\Domain\Transaction\Patterns\SmsStrategy;
use Selfofficename\Modules\InfraStructure\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TransactionRepository extends BaseRepository
{
    protected $data;
    protected array $result = [];
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
    public function transaction(array $data)
    {
        try {
            $this->data = $data;
            $this->data['source_card_id'] = $this->getCardNumberdetail()->id;
            $this->data['amount'] = $this->data['amount'] + config('transaction.settings.commission');

            // Create a transaction
            $transaction = $this->create($this->data);

            // Insert commission
            $this->vreateACommission($transaction);

            // Update source card number amount
            $this->updatecardBalance($transaction);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return (new Customexception())->message($e);
        }

        // Send sms wu=ith strategy pattern;
        return response()->json((new SmsStrategy($this->data))->send(), ResponseAlias::HTTP_OK);
    }

    /**
     * @return Builder|Model|object|null
     */
    public function getCardNumberdetail()
    {
        return Card::query()->where('number', $this->data['source_card_number'])->first();
    }

    /**
     * @return JsonResponse
     */
    public function mostTransaction(): JsonResponse
    {
        $users = User::query()
            ->join('accounts', 'users.id', 'accounts.user_id')
            ->join('cards', 'accounts.id', 'cards.account_id')
            ->join('transactions', 'cards.id', 'transactions.source_card_id')
            ->where('transactions.created_at', '>=', now()->subMinutes(2000))
            ->select('users.*', DB::raw("count(users.id) as count"))
            ->groupBy('users.id')
            ->orderBy('count', 'desc')
            ->limit(3)
            ->get();

        $users = $users->map(function ($user) {
            $user->transactions =  Transaction::query()->whereHas('card.account' , function ($query) use($user)
            {
                return $query->where('user_id', $user->id);
            }
            )->latest()->take(10)->get();

            return  $user;
        });

        return response()->json(['result' =>
           $users
        ]);
    }

    /**
     * @param $transaction
     * @return Model|Builder
     */
    private function vreateACommission($transaction): Model|Builder
    {
        return Commission::query()->create([
            "transaction_id" => $transaction['id'],
            'amount' => config('transaction.settings.commission')
        ]);
    }

    /**
     * @return void
     */
    private function updatecardBalance($transaction): void
    {
        Card::find($this->data['source_card_id'])
            ->decrement('amount', $transaction['amount']);
    }
}
