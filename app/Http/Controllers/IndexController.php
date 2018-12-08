<?php

namespace App\Http\Controllers;

use App\Rate;
use App\User;
use App\TrRate;
use App\Reserve;
use App\Category;
use App\SendWallet;
use App\Transaction;
use App\ReceiveWallet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with('send_wallets', SendWallet::all())
                            ->with('receive_wallets', ReceiveWallet::all())
                            ->with('rates', Rate::all())
                            ->with('transactions', Transaction::all())
                            ->with('scroll', Category::find(1))
                            ->with('reserves', Reserve::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rcvinfo(Request $request) 
    {
        $send_wallet_name = SendWallet::find($request->send_wallet_id)->name;
        $sendCur = SendWallet::find($request->send_wallet_id)->currency;
        $receiveCur = ReceiveWallet::find($request->receive_wallet_id)->currency;
        $send_wallet = $request->send_wallet_id;
        $receive_wallet = $request->receive_wallet_id;

        $sendAmount = $request->sendAmount;
        $receiveAmount = $request->receiveAmount;
        $usd2bdt_transaction = $request->usd2bdt_transaction;
        // dd($sendCur);
        return view('rcvinfo')->with([
            'send_wallet_name' => $send_wallet_name,
            'send_wallet' => $send_wallet,
            'receive_wallet' => $receive_wallet,
            'sendAmount' => $sendAmount,
            'receiveAmount' => $receiveAmount,
            'receiveCur' => $receiveCur,
            'sendCur' => $sendCur,
            'usd2bdt_transaction' => $usd2bdt_transaction,
            'all_send_wallet' => SendWallet::all(),
            'all_receive_wallet' => ReceiveWallet::all(),
            'transactions' => Transaction::all(),
            'scroll' => Category::find(1),
        ]);
    }

    public function exchange(Request $request) 
    {

        $send_wallet = SendWallet::find($request->send_wallet)->name;
        $receive_wallet = ReceiveWallet::find($request->receive_wallet)->name;
        $sendAmount = $request->sendAmount;
        $receiveAmount = $request->receiveAmount;
        $receiveAccount = $request->receiveAccount;
        $email = $request->receive_email;
        $user_id = $request->user_id;
        $sendCur = $request->sendCur;
        $receiveCur = $request->receiveCur;
        $usd2bdt_transaction = $request->usd2bdt_transaction;
        // dd($sendCur);
        return view('exchange')->with([
            'send_wallet' => $send_wallet,
            'receive_wallet' => $receive_wallet,
            'sendAmount' => $sendAmount,
            'receiveAmount' => $receiveAmount,
            'receiveAccount' => $receiveAccount,
            'email' => $email,
            'user_id' => $user_id,
            'receiveCur' => $receiveCur,
            'sendCur' => $sendCur,
            'usd2bdt_transaction' => $usd2bdt_transaction,
            'all_send_wallet' => SendWallet::all(),
            'all_receive_wallet' => ReceiveWallet::all(),
            'transactions' => Transaction::all(),
            'scroll' => Category::find(1),
        ]);
    }

    public function ajaxCall(Request $request)
    {
        $row = TrRate::where('sendwallet_id', $request->send_id)
                       ->where('receivewallet_id', $request->receive_id)
                       ->first();
        $row2 = SendWallet::find($request->send_id);
        $row3 = ReceiveWallet::find($request->receive_id);

        $row['send_currency'] = $row2['currency'];
        $row['receive_currency'] = $row3['currency'];
        $row['receive_currency'] = $row3['currency'];
        $row['reserve'] = $row3['amount'];

        $row['send_icon'] = $row2['icon'];
        $row['receive_icon'] = $row3['icon'];

        return response()->json($row);
        return json_encode($row);
    }



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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
