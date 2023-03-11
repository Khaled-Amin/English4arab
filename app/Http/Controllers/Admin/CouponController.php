<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    public function index()
    {
        $Coupons = Coupon::all();
        return view('admin.coupon.index', compact('Coupons'));
    }


    public function create()
    {
        return view('admin.coupon.create');
    }
    public function edit(Coupon $Coupon)
    {
        return view('admin.coupon.edit', ['coupon' =>$Coupon]);
    }


    public function prepareDate(Request $request , $inputs , $key= 'image'){

        if ($request->hasFile($key)){
            unset($inputs['image']);
            $inputs['image'] = uploadImage($request->$key);
        }else
            unset($inputs['image']);
        return $inputs;
    }

    public function store(CouponRequest $request)
    {
        $inputs = $request->validated();
        $inputs = $this->prepareDate($request , $inputs);
        $coupon = Coupon::create($inputs);
        $coupon->sections()->attach($request->section_ids);
        return response()->json([
            'message' => 'تم انشاء الكود بنجاح.'
        ]);
    }


    public function update(Coupon $Coupon )
    {
        // $inputs = $request->validated();
        // $inputs = $this->prepareDate($request , $inputs);
        // $Coupon->update($inputs);
        // $Coupon->sections()->syncWithoutDetaching($request->section_ids);
        
        $Coupon->update([
            'status' => $Coupon->status == 1 ? 0 : 1
        ]);
        return redirect()->route('coupon.index');

    }



    public function destroy(Coupon $Coupon)
    {
        $Coupon->delete();
        return response()->json([
            'message' => 'تم حذف الكود بنجاح'
        ]);
    }

}
