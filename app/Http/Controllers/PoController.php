<?php

namespace App\Http\Controllers;

use App\Exports\PoExport;
use App\Imports\PoImport;
use App\Mail\PoMail;
use App\Models\BussinessUnit;
use App\Models\po;
use App\Models\po_detail;
use App\Models\MailtoAuriga;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

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
        $auth2 = auth()->user();
        $po_all = po::where('sales',Auth::user()->fullname)->orderBy('id_po', 'desc')->get();
        $pov_admin = po::with(['po_detail','bu'])->get();
        $pov = po::with(['po_detail','bu'])->where('sales',$auth)->get();
        
        $po = po::join('po_details','po_details.id_po','=','pos.id_po')->where('sales', Auth::user()->fullname)->get();

        if($auth2->hasRole('admin')){
            return view('purchaseorder.indexPo',['po'=>$po,'pov'=>$pov_admin,'auth'=>$auth,'po_all'=>$po_all]);
        }else if($auth2->hasRole('user')){
            return view('purchaseorder.indexPo',['po'=>$po,'pov'=>$pov,'auth'=>$auth,'po_all'=>$po_all]);
        }
    }

    public function createPo(){
        $auth = Auth::user()->fullname;
        $product = product::all();
        return view('purchaseorder.detailPo',compact('product','auth'));
    }

    public function sendMail(){
        $filename = 'poexport2.xlsx';
        $exportPath = public_path('excel/po');
        Excel::store(new PoExport, $filename);
        Mail::to('dimassidiqp29@gmail.com')->send(new PoMail($exportPath));
        // $excelFile->save($destinationPath.'/'.$exportPath);
        // dd($excelFile);

    }

    public function testExport(){
        $filename = 'bismillah.xlsx';
        Excel::store(new PoExport, 'bismillah.xlsx','exce');
        $emailData = [
            'email'=>'dimassidiqp29@gmail.com',
            'attachment'=>public_path('excel/po/'.$filename)
        ];
        $receiver = MailtoAuriga::all();

        foreach($receiver as $i){
            Mail::to($i->email)->send(new PoMail($emailData));
        }
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

        $generatecode = "PO" . Str::upper(Str::random(6));

        $po = po::create([
            'id_bu' => $request->id_bu,
            'no_order' => $generatecode,
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
        //dd($po_detail);
        // SEND EMAIL WITH ATTACHMENT
        $filename = $po->no_order . '-' . now()->format('d F Y').'.xlsx';
        $items = po::with('po_detail')->where('id_po',$po->id)->get();
        $emailData = [
            'id_bu' => $request->id_bu,
            'no_order' => $generatecode,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'sales' => $request->sales,
            'remarks' => $request->remarks,
            'date' => $request->date,
            'order_type' => $request->order_type,
            'approval' => $request->approval,
            'grand_total' => $request->grand_total,
            'items' => $items[0]->po_detail,
            'attachment'=>public_path('excel/po/'.$filename)
        ];
        Excel::store(new PoExport(compact('emailData')),$filename,'exce');
        $receiver = MailtoAuriga::all();
        foreach($receiver as $i){
            Mail::to($i->email)->send(new PoMail($emailData));
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
