<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sections= sections::all();
        $products= products::all();
        return view('products.products',compact('sections','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validatedData = $request->validate([
            'productName'=>'required|unique:products|max:40',
            'sectionID'=>'required',
        ],
        [
        'productName.required' => 'يجب ادخال اسم المنتج',
        'sectionID.required' => 'يجب ادخال اسم القسم',
        'productName.unique' => 'هذا المنتج موجود بالفعل',
        'productName.max' => 'لا يجب ان يتعدى اسم المنتج عن 40 حرف',
        ]);
        products::create([
        'productName'=>$request->productName,
        'description'=>$request->description,
        'sectionID'=>$request->sectionID,
        ]);
        // }
        session()->flash('Add', 'تم اضافة المنتج بنجاح');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {

        $id = $request->id;
        $this->validate($request,[
            'productName'=>'required|max:40|unique:products,productName,'.$id,

        ],
        [
        'productName.required' => 'يجب ادخال اسم القسم',
        'productName.unique' => 'هذا القسم موجود بالفعل',
        'productName.max' => 'لا يجب ان يتعدى اسم القسم عن 40 حرف',
        ]);
        $products=products::where('id',$id);
        $products->update([
            'productName' => $request->productName,
            'sectionID' => $request->sectionID,
            'description' => $request->description,
        ]);
        session()->flash('edit', 'تم تعديل المنتج بجاح');

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        products::where('id', $request->id)->delete();
        session()->flash('delete', 'تم حذف المنتج بجاح');
        return redirect('/products');
    }
}