<?php

namespace App\Http\Controllers;

use App\Models\BussinessUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Testing\Fakes\BusFake;

class BussinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bu = BussinessUnit::all();
        return view('businessunit.index', compact('bu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businessunit.index');
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
            'agency_code' => 'required|max:255',
            'business_unit' => 'required|max:255',
            'brand_name' => 'required|max:255',
            'company' => 'required|max:255',
        ]);

        BussinessUnit::create([
            'agency_code' => $request->agency_code,
            'business_unit' => $request->business_unit,
            'brand_name' => $request->brand_name,
            'company' => $request->company,
        ]);
        toast()->success('Data have been succesfully saved!');
        return redirect('business-unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BussinessUnit  $bussinessUnit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bu = BussinessUnit::find($id);
        return view('business-unit.show',compact('bu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BussinessUnit  $bussinessUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bu = BussinessUnit::find($id);
        return view('businessunit.edit',compact('bu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BussinessUnit  $bussinessUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'agency_code' => 'required|max:255',
            'business_unit' => 'required|max:255',
            'brand_name' => 'required|max:255',
            'company' => 'required|max:255',
        ]);

        $bu = BussinessUnit::find($id);
        $input = $request->all();
        $bu->update($input);
        toast()->success('Business Unit updated successfully');
        return redirect()->route('business-unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BussinessUnit  $bussinessUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bu = BussinessUnit::find($id);
        $bu->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
}
