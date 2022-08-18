<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransactionController extends Controller
{
    public function transactionsShow() {
        if(Auth::check()) {
            $transactions = DB::select('SELECT id, fk_id_user, transactionDate, drawer, transactionValue, isPaid, category, wallet, transactionIdentifier FROM transactions WHERE fk_id_user = :id ORDER BY transactionDate DESC', [':id' => Auth::user()->id]);

            return view('admin.transactions.transacoes', [
                'transations' => $transactions, 
                'totalExpense' => Transactions::getSomaExpense()[0]->totalExpense,
                'totalRecipe' => Transactions::getSomaRecipe()[0]->totalRecipe
            ]);
        }

        return redirect()->route('admin.login');
    }

    public function cadExpense(Request $request, $id, $type) {

        if(Auth::check()) {
            $expenses = new Transactions();

            try{
                $expenses->fk_id_user = $id;
                $expenses->transactionValue = str_replace(',', '.', $request->value_expense);
                $expenses->isPaid = isset($request->isPaid) ? ($request->isPaid == 'no' ? false : false) : true;
                $expenses->transactionDate = $request->dateExpense;
                $expenses->drawer = $request->payerExpense;
                $expenses->category = $request->catExpense;
                $expenses->wallet = $request->walletExpense;
                $expenses->transactionIdentifier = $type;
                $expenses->save();

                return redirect()->route('admin', ['report' => 'regSuccess']);

            }catch(PDOException $e){
                return redirect()->route('admin', ['report' => 'regFailed']);
            }
        }
    }

    public function cadRecipe(Request $request, $id, $type) {

        if(Auth::check()) {
            $recipes = new Transactions();

            try{
                $recipes->fk_id_user = $id;
                $recipes->transactionValue = str_replace(',', '.', $request->value);
                $recipes->isPaid = isset($request->isPaid) ? ($request->isPaid == 'no' ? false : false) : true;
                $recipes->transactionDate = $request->date;
                $recipes->drawer = $request->payer;
                $recipes->category = $request->cat;
                $recipes->wallet = $request->wallet;
                $recipes->transactionIdentifier = $type;
                $recipes->save();

                return redirect()->route('admin', ['report' => 'regSuccess']);
            }catch(PDOException $e){
                return redirect()->route('admin', ['report' => 'regFailed']);
            }            
        }
    }

    public function deleteTransactions($id, $type) {
        Transactions::transactionsDelete($id, $type);
        return redirect()->route('admin.transaction'); 
    }

    public function updateStatusTransaction($id, $type){
        Transactions::updateStatus($id, $type);
        return redirect()->route('admin.transaction');
    }

    public function getUpdade($id){
        return json_encode(Transactions::viewTransaction($id));
    }
}
