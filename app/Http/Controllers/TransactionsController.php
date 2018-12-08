<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Session;
use App\SendWallet;
use App\ReceiveWallet;
use App\Reserve;
use App\Rate;
use Mail;
use App\Mail\SendMail;
use App\User;
use App\Category;
Use Auth;
Use App\Notifications\PendingNotification;
Use App\Notifications\ProcessingNotification;
Use App\Notifications\CompleteNotification;
Use App\Notifications\CancelNotification;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('admin.transactions.index')->with('transactions', $transactions )
                                               ->with('scroll', Category::find(1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'receiveAccount' => 'required'

        // ]);
        
        // dd($request->send_wallet);
        $transaction = new Transaction;
        $transaction->send_wallet = $request->send_wallet;
        $transaction->receive_wallet = $request->receive_wallet;
        $transaction->sendAmount = $request->sendAmount;
        $transaction->receiveAmount = $request->receiveAmount;
        $transaction->receiveAccount = $request->receiveAccount;
        $transaction->email = $request->receive_email;
        $transaction->user_id = Auth::user()->id;
        $transaction->user_name = Auth::user()->name;
        $transaction->usd2bdt_transaction = $request->usd2bdt_transaction;

        $transaction->save();

        $user = Auth::user();
        $transaction['id'] = $request->usd2bdt_transaction;
        $transaction['send_wallet'] = $request->send_wallet;
        $transaction['receive_wallet'] = $request->receive_wallet;
        $transaction['receive_amount'] = $request->receiveAmount;
        $user->notify(new PendingNotification($user, $transaction));

        return view('confirm')->with([
            'send_wallet' => $request->send_wallet,
            'receive_wallet' => $request->receive_wallet,
            'sendAmount' => $request->sendAmount,
            'receiveAmount' => $request->receiveAmount,
            'receiveAccount' => $request->receiveAccount,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'receiveCur' => $request->receiveCur,
            'sendCur' => $request->sendCur,
            'usd2bdt_transaction' => $request->usd2bdt_transaction,
            'all_send_wallets' => SendWallet::all(),

            'all_receive_wallet' => ReceiveWallet::all(),
            'scroll' => Category::find(1),
        ]);
 
    }

    public function confirm(Request $request) 
    {
        $slug = $request->usd2bdt_transaction;
        $email = $request->user_email;
        $username = $request->user_name;
        $transaction = Transaction::where('usd2bdt_transaction', '=', $slug)->first();

        $transaction->user_transaction = $request->user_transaction;
        $transaction->user_transaction_email = $request->user_transaction_email;
        $transaction->status = $request->status;
        $transaction->save();

        $user = Auth::user();
        $user->notify(new ProcessingNotification($user));
        return redirect()->route('thanks');
        
    }
    // public function thanks($email) 
    // {
    //     $data = array( 'email' => $email, 'first_name' => 'USD2BDT', 'from' => 'raselyz@gmail.com', 'from_name' => 'RaselAhmed' );

    //     Mail::send( 'mail', $data, function( $message ) use ($data)
    //     {
    //         $message->to($data['email'])->from( $data['from'], $data['first_name'] )->subject( 'Your Order is Submitted' );
    //     });

    //     return view('thanks');
        
    // }
    public function thanks() 
    {
        return view('thanks');
    }

    public function exchange_update($id) 
    {
        $transaction = Transaction::where('usd2bdt_transaction', '=', $id)->first();
        if (Auth::user()->id != $transaction->user_id) {
            return redirect()->route('index');
        }
        $transaction_id = $transaction->id;
        $usd2bdt_transaction = $id;
        $send_wallet = $transaction->send_wallet;
        $receive_wallet = $transaction->receive_wallet;
        $user_transaction = $transaction->user_transaction;
        $user_transaction_email = $transaction->user_transaction_email;
        $scroll = Category::find(1);

        return view('users.exchange_update', 
            compact('user_transaction', 'user_transaction_email','send_wallet', 'receive_wallet', 'usd2bdt_transaction', 'scroll', 'transaction_id'));
    }

    public function exchange_update_store(Request $request, $id) 
    {
        $transaction = Transaction::find($id);

        $transaction->user_transaction = $request->user_transaction;
        $transaction->user_transaction_email = $request->user_transaction_email;
        $transaction->status = 'Processing';
        $transaction->save();

        $user = Auth::user();
        $user->notify(new ProcessingNotification($user));

        return redirect()->route('thanks');
    }
   


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('admin.transactions.edit')->with('transaction', Transaction::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $transaction = Transaction::find($id);
         $user = User::find($transaction->user_id);
         if($request->status == 'Completed')
         {
            $user->notify(new CompleteNotification($transaction));
         }

         if($request->status == 'Canceled')
         {
            $user->notify(new CancelNotification($transaction));
         }

        $transaction->status = $request->status;
        $transaction->save();
        Session::flash('success', 'You Successfully Updated Transaction');
        return redirect(route('transactions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transactions');
    }
}
