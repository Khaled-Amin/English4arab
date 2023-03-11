<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\CouponSection;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{


    public function index()
    {
        $Sections = Section::all();
        return view('admin.section.index', compact('Sections'));
    }


    public function create()
    {
        return view('admin.section.create');
    }
    public function edit(Section $Section)
    {
        return view('admin.section.edit', ['section' =>$Section]);
    }


    public function prepareDate(Request $request , $inputs , $key= 'image'){

        if ($request->hasFile($key)){
            unset($inputs['image']);
            $inputs['image'] = uploadImage($request->$key);
        }else
            unset($inputs['image']);
        return $inputs;
    }

    public function store(SectionRequest $request)
    {
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        Section::create($inputs);
        return response()->json([
            'message' => 'تم اضافة القسم بنجاح.'
        ]);
    }


    public function update(Section $Section , SectionRequest $request)
    {
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        $Section->update($inputs);
        return response()->json([
            'message' => 'تم تعديل القسم بنجاح.'
        ]);

    }

    public function destroy(Section $Section)
    {
        CouponSection::where('section_id' , $Section->id)->delete();
        $Section->delete();
        return response()->json([
            'message' => 'تم ازالة القسم بنجاح'
        ]);
    }

}
