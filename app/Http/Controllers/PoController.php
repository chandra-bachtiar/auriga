<?php

namespace App\Http\Controllers;
use App\Models\BussinessUnit;
use App\Models\po;
use App\Models\po_detail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $po = po::all();
        return view('purchaseorder.indexPo',compact('po','auth'));
    }

    public function createPo(){
        $auth = Auth::user()->fullname;
        $product = product::all();
        $PoDetail = po_detail::join('pos','pos.id_po','=','po_details.id_po');
        dd($PoDetail);
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
        $this->validate($request,[
            'id_bu' => 'required',
            'customer_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'sales' => 'required',
            'date' => 'required',
        ]);

        $po = po::create([
            'id_bu' => $request->id_bu,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'sales' => $request->sales,
            'remarks' => $request->remarks,
            'date' => $request->date,
            'order_type' => $request->order_type,
            'approval' => $request->approval,
            'grand_total' => $request->grand_total,
        ]);

        foreach($request->number_item as $key => $value){
            $po_detail = po_detail::create([
                'id_po' => $po->id,
                'number_item' => $request->number_item[$key],
                'sku_dch' => $request->sku_dch[$key],
                'item_name' => $request->item_name[$key],
                'uom' => $request->uom[$key],
                'price_exclude' => $request->price_exclude[$key],
                'price_include' => $request->price_include[$key],
                'qty' => $request->qty[$key],
                'disc' => $request->disc[$key],
                'value' => $request->value[$key],
            ]);
        }

        //return status success dan status code 
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil disimpan',
            'data' => $po
        ], 200);
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
