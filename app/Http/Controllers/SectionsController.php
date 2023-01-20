<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Name;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sections= sections::all();
        return view('sections.sections',compact('sections'));
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
        // $input =$request->all();
        // $b_exists = sections::where('sectionName', '=', $input['sectionName'])->exists();
        // if($b_exists){
        //     session()->flash('Error', 'خطأ القسم موجود بالفعل');
        //      return redirect('/sections');
        // }else{
        $validatedData = $request->validate([
            'sectionName'=>'required|unique:sections|max:40',
        ],
        [
        'sectionName.required' => 'يجب ادخال اسم القسم',
        'sectionName.unique' => 'هذا القسم موجود بالفعل',
        'sectionName.max' => 'لا يجب ان يتعدى اسم القسم عن 40 حرف',
        ]);
        sections::create([
        'sectionName'=>$request->sectionName,
        'description'=>$request->description,
        'createdBy'=>Auth()->user()->name,
        ]);
        // }
        session()->flash('Add', 'تم اضافة القسم بنجاح');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request,[
            'sectionName'=>'required|max:40|unique:sections,sectionName,'.$id,

        ],
        [
        'sectionName.required' => 'يجب ادخال اسم القسم',
        'sectionName.unique' => 'هذا القسم موجود بالفعل',
        'sectionName.max' => 'لا يجب ان يتعدى اسم القسم عن 40 حرف',
        ]);
        $section=sections::where('id',$id);
        $section->update([
            'sectionName' => $request->sectionName,
            'description' => $request->description,
        ]);
        session()->flash('edit', 'تم تعديل الفسم بجاح');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        sections::where('id', $request->id)->delete();
        session()->flash('delete', 'تم حذف الفسم بجاح');
        return redirect('/sections');
    }
}