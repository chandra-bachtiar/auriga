<?php

namespace App\Http\Controllers;
use App\Models\BussinessUnit;
use App\Models\po;
use App\Models\po_detail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bu = BussinessUnit::all();
        return view('purchaseorder.index', compact('bu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user()->fullname;
        $product = product::all();
        $PoDetail = po_detail::all();
        return view('purchaseorder.detailPo',compact('product','auth','PoDetail'));
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
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function show(po $po)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function edit(po $po)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, po $po)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function destroy(po $po)
    {
        //
    }
}
