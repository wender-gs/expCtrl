<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Transactions extends Model
{
    use HasFactory;

    // retorna a soma das despesas
    public static function getSomaExpense() {
        $transactions = DB::select('SELECT SUM(transactionValue) as totalExpense FROM transactions WHERE fk_id_user = :id AND transactionIdentifier = "expense"', [':id' => Auth::user()->id]);

        return $transactions;
    }

    // reetorna a soma das receitas
    public static function getSomaRecipe() {
        return DB::select('SELECT SUM(transactionValue) as totalRecipe FROM transactions WHERE fk_id_user = :id AND transactionIdentifier = "recipe"', [':id' => Auth::user()->id]);
    }

    // deleta uma transação
    public static function transactionsDelete($id, $type){
        DB::table('transactions')->where('id', '=', $id)->where('transactionIdentifier', '=', $type)->delete();
    }

    // altera o status de pendente para quitada/pago
    public static function updateStatus($id, $type) {
        DB::table('transactions')->where('id', '=', $id)->where('transactionIdentifier', '=', $type)->update(['isPaid' => 0]);
    }

    // recuperar os valores para exibir na view de transactions
    public static function viewTransaction($id) {
        return  DB::table('transactions')->where('id', '=', $id)->get();
    }
}
