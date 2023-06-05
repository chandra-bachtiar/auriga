<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Image;
use App\Models\BussinessUnit;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bu = BussinessUnit::all();
        $product = product::all();
        return view('product.index', compact('product','bu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, product $product)
    {
        $this->validate($request, [
            'item_number' => 'required',
            'business_unit_id' => 'required',
            'sku_dch' => 'required',
            'item_name' => 'required',
            'uom' => 'required',
            'cbm' => 'required',
            'kgs' => 'required',
            'price' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $input = $request->all();
        if ($request->file('gambar')) {
            File::delete('img/product/' . $product->gambar);
            $file = $request->file('gambar');
            $file_name = str_replace(" ", "", $product->item_name).time();
            $destinationPath = public_path('img/product');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['gambar'] = $file_name;
        }
        $product = product::create($input);
        toast()->success('Data have been succesfully saved!');
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bu = BussinessUnit::all();
        $product = product::find($id);
        return view('product.edit',compact('product','bu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item_number' => 'required',
            'business_unit_id' => 'required',
            'sku_dch' => 'required',
            'item_name' => 'required',
            'uom' => 'required',
            'cbm' => 'required',
            'kgs' => 'required',
            'price' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $product = product::find($id);
        if ($request->file('gambar')) {
            File::delete('img/product/' . $product->gambar);
            $file = $request->file('gambar');
            $file_name = str_replace(" ", "", $product->item_name).time();
            $destinationPath = public_path('img/product');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['gambar'] = $file_name;
        }
        $product->update($input);
        toast()->success('Product updated successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
}
