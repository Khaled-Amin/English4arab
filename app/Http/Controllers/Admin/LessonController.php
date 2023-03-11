<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\CouponLesson;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{


    public function index()
    {
        $Lessons = Lesson::all();
        return view('admin.lesson.index', compact('Lessons'));
    }


    public function create()
    {
        return view('admin.lesson.create');
    }
    public function edit(Lesson $Lesson)
    {
        return view('admin.lesson.edit', ['lesson' =>$Lesson]);
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
            'message' => 'تم اضافة الدرس بنجاح.'
        ]);
    }


    public function update(Lesson $Lesson , LessonRequest $request)
    {
        
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        $Lesson->update($inputs);
        return response()->json([
            'message' => 'تم تعديل الدرس بنجاح.'
        ]);

    }

    public function destroy(Lesson $Lesson)
    {
        $Lesson->delete();
        return response()->json([
            'message' => 'تم ازالة الدرس بنجاح'
        ]);
    }

}
