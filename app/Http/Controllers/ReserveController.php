<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use Session;
use ScrollText;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reserves.index')->with('reserves', Reserve::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reserves.create');
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

        $icon->move('uploads/reserves', $icon_new_name);

        $reserve = Reserve::create([
            'name' => $request->name,
            'icon' => 'uploads/reserves/' . $icon_new_name,
            'amount' => $request->amount,
            'currency' => $request->currency
        ]);
        return redirect()->route('reserves');
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
        return view('admin.reserves.edit')->with('wallet', Reserve::find($id));
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
        $wallet = Reserve::find($id);

        if ($request->hasFile('icon')) {

            $icon = $request->icon;
            $icon_new_name = time() . $icon->getClientOriginalname();

            $icon->move('uploads/wallets', $icon_new_name);

            $wallet->icon = 'uploads/wallets/'. $icon_new_name;
        }
        $wallet->name = $request->name;
        $wallet->amount = $request->amount;
        $wallet->currency = $request->currency;
        $wallet->save();
        Session::flash('success', 'Wallet Successfully Updated');
        return redirect()->route('reserves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = Reserve::find($id);
        $wallet->delete();
        Session::flash('success', 'You Successfully Deleted a Wallet');
        return redirect(route('reserves'));
    }

    public function scroll_text() {
        
        return view('admin.scroll.index')->with('scrolls', ScrollText::all());
    }
}
