<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendWallet;
use Session;

class SendWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.send_wallets.index')->with('send_wallets', SendWallet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.send_wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icon= $request->icon;

        $icon_new_name = time().$icon->getClientOriginalname();

        $icon->move('uploads/wallets', $icon_new_name);

        $wallet = SendWallet::create([
            'name' => $request->name,
            'icon' => 'uploads/wallets/' . $icon_new_name,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'my_account' => $request->my_account
        ]);

        return redirect()->route('send_wallets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.send_wallets.edit')->with('wallet', SendWallet::find($id));
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
        $wallet = SendWallet::find($id);

        if ($request->hasFile('icon')) {

            $icon = $request->icon;
            $icon_new_name = time() . $icon->getClientOriginalname();

            $icon->move('uploads/wallets', $icon_new_name);

            $wallet->icon = 'uploads/wallets/'. $icon_new_name;
        }
        $wallet->name = $request->name;
        $wallet->amount = $request->amount;
        $wallet->currency = $request->currency;
        $wallet->my_account = $request->my_account;
        $wallet->save();
        Session::flash('success', 'Wallet Successfully Updated');
        return redirect()->route('send_wallets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = SendWallet::find($id);
        $wallet->delete();
        Session::flash('success', 'You Successfully Deleted a Wallet');
        return redirect(route('send_wallets'));
    }
}
