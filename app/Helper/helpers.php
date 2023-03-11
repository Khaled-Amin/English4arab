<?php

use App\Models\Coupon;
use App\Models\CouponSection;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

function uploadImage($image, $folder = 'images')
{
    try {
        $filename  = $image->store(null, $folder);
        return $filename;
    } catch (Exception $e) {
        return "";
    }
}
function lang($key){
    return __($key);
}
function uploadImages($images, $folder = 'images')
{
    $filename  = [];
    foreach ($images as $name => $image)
        $filename[$name] = uploadImage($image, $folder);
    return $filename;
}
function requestHas($r, $key)
{
    if ($r->has($key) && !is_null($r->$key) &&  $r->$key != "")
        return true;
    return false;
}

$serrings = null;
function settings($key = null)
{
    global $serrings;
    if ($serrings == null)
        $serrings  = \App\Models\Setting::all('type', 'key', 'value', 'title')->keyBy('key');
    if ($key)
        return isset($serrings[$key]) ? $serrings[$key] : new Setting();
    return $serrings;
}




$sectionids = null;
function getSectionIds()
{
    global $sectionids;
    if ($sectionids == null) {
        $codes = getCodes();
        $CouponIds = Coupon::where('status', 1)->whereIn('key', $codes)->pluck('id')->toArray();
        $sectionids = CouponSection::select('section_id')->wherein('coupon_id', $CouponIds)->pluck('section_id')->toarray();
    }
  //  dd($sectionids);
    return $sectionids;
}


function getCodes()
{

    $codes = Session::get('codes');
    if (is_array($codes)) {
        return $codes;
    }
    return [];
}

function setCode($code)
{
    $codes = getCodes();
    $codes[] = $code;
    Session::put('codes', $codes);
}
