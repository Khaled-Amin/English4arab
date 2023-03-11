<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile()
    {
        return view('admin.user.profile');
    }
    public function updateProfile(UserRequest $request)
    {
        $user = auth()->user();
        $input = $request->validated();
        if ($request->hasFile('image'))
            $input['image'] = uploadImage($request->image);
        else
            unset($input['image']);
        if (!$request->password)
            unset($input['password']);
        $user->update($input);
    
        return redirect()->route('profile')
            ->with('success', 'Your Profile updated successfully');
    }
    
    public function index()
    {
        return view('home');
    }
}
