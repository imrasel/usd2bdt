<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TrRate;
use App\SendWallet;
use App\ReceiveWallet;


class TrRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trrates = TrRate::all();
        return view('admin.trrates.index', compact('trrates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sendwallets = SendWallet::all();
        $receivewallets = ReceiveWallet::all();
        return view('admin.trrates.create', compact('sendwallets', 'receivewallets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'send_wallet' => 'required|integer',
            'receive_wallet' => 'required|integer',
            'send_rate' => 'required',
            'receive_rate' => 'required',
        ]);

        $trrate = new TrRate;
        $trrate->sendwallet_id = $request->send_wallet;
        $trrate->receivewallet_id = $request->receive_wallet;
        $trrate->send_rate = $request->send_rate;
        $trrate->receive_rate = $request->receive_rate;
        $trrate->save();

        return redirect()->route('trrate.index');
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
        $trrate = TrRate::find($id);

        return view('admin.trrates.edit', compact('trrate'));
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
        $trrate = TrRate::find($id);
        $trrate->send_rate = $request->send_rate;
        $trrate->receive_rate = $request->receive_rate;
        $trrate->save();
        return redirect()->route('trrate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trrate = TrRate::find($id);    
        $trrate->delete();
        
        return redirect()->route('trrate.index');
    }
}
