<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\CouponLesson;
use App\Models\Lesson;
use Illuminate\Http\Request;

class BookController extends Controller
{


    public function index()
    {
        $Lessons = Lesson::all();
        // $is_PDF = Lesson::select('type')->where('pdf' , 'pdf')->first();
        return view('admin.book.index', compact('Lessons'));
    }


    public function create()
    {
        return view('admin.book.create');
    }
    public function edit(Lesson $Lesson , $id)
    {
        $get_id = Lesson::where('type' , 'pdf')->find($id);
        // dd(Lesson::where('type' , 'pdf')->find($id));
        return view('admin.book.edit', ['lesson' =>$Lesson , 'get_id' => $get_id]);
    }


    public function prepareDate(Request $request , $inputs , $key= 'image'){

        if ($request->hasFile($key)){
            unset($inputs['image']);
            $inputs['image'] = uploadImage($request->$key);
        }else
            unset($inputs['image']);
        return $inputs;
    }

    public function store(LessonRequest $request)
    {
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        Lesson::create($inputs);
        return response()->json([
            'message' => 'تم اضافة الكتب بنجاح.'
        ]);
    }


    public function update(Lesson $Lesson , LessonRequest $request , $id)
    {
        $get_id = Lesson::where('type' , 'pdf')->find($id);
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        $get_id->update($inputs);
        return response()->json([
            'message' => 'تم تعديل الكتب بنجاح.'
        ]);

    }

    public function destroy(Lesson $Lesson , $id)
    {
        $get_id_book = Lesson::where('type' , 'pdf')->find($id);
        $get_id_book->delete();
        return response()->json([
            'message' => 'تم ازالة الكتب بنجاح'
        ]);
    }

}
