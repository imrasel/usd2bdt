<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use Session;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rates.index')->with('rates', Rate::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rates.create');
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

        $rate = Rate::create([
            'name' => $request->name,
            'icon' => 'uploads/wallets/' . $icon_new_name,
            'buy' => $request->buy,
            'sell' => $request->sell
        ]);
        Session::flash('success', 'New Rate Created Successfully');
        return redirect()->route('rates');
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
        return view('admin.rates.edit')->with('rate', Rate::find($id));
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
        $rate = Rate::find($id);

        if ($request->hasFile('icon')) {

            $icon = $request->icon;
            $icon_new_name = time() . $icon->getClientOriginalname();

            $icon->move('uploads/wallets', $icon_new_name);

            $rate->icon = 'uploads/wallets/'. $icon_new_name;
        }
        $rate->name = $request->name;
        $rate->buy = $request->buy;
        $rate->sell = $request->sell;
        $rate->save();
        Session::flash('success', 'Rate Successfully Updated');
        return redirect()->route('rates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rate::find($id);
        $rate->delete();
        Session::flash('success', 'You Successfully Deleted a Rate');
        return redirect(route('rates'));
    }


    



}
