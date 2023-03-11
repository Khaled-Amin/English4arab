<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {
        $sections = Section::paginate();
        return view('site.index' , ['sections' => $sections]);
    }


    public function showSection(Section $section)
    {
        if(!$section->auth())
            return view('site.locked' , ['section' => $section ]);
        return view('site.section' , ['section' => $section ]);
        # code...
    }

    public function showLesson(Lesson $lesson)
    {
        if($lesson->section && !$lesson->section->auth())
            return view('site.locked' , ['section' => $lesson->section ]);




        return view('site.lesson' , ['lesson' => $lesson , 'section' => $lesson->section ]);
    }


    public function fingerprint(Request $request)
    {
        session('key');
        $request->visitor_id ;
        // return view('home');
    }


    public function setCoupon(Request $request )
    {
        $coupon = Coupon::where(['key' => $request->key,'status'=> 1 ])->first();
        //dd($coupon, $request->key);

        if(!$coupon) return response()->json(['message' => 'الكود غير صالح', ], 422);

        $visitor_id = $request->visitor_id;
        $user = CouponUser::where(['coupon_id' => $coupon->id,'visitor_id' => $visitor_id ,])->first();

        $section = Section::where('slug' , $request->section)->first();
        $url = $section ? route('showSection' , $section) : "";

        if($user){
            setCode($coupon->key);
            return response()->json([
                'message' => 'تم اضافة الكود للجهاز',
                'url' => $url
            ], 200);
        }

        if($coupon->users()->count() >= $coupon->number){
            return response()->json([
                'message' => 'الكود غير صالح (تجاوزت الحد الاقصى)'
            ], 422);
        }

        $user = CouponUser::create([
            'coupon_id' => $coupon->id,
            'visitor_id' => $visitor_id ,
        ]);

        setCode($coupon->key);

        return response()->json([
            'message' =>  'تم اضافة الكود للجهاز',
            'url' => $url
        ], 200);
    }

}
