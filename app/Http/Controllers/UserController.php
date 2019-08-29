<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;


class UserController extends Controller
{
    protected $user;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        return view('user.index',['user'=>$this->user]);
    }


    public function avatar_upload(Request $request )
    {
        if ($request->hasFile('avatar'))
        {
            request()->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $user=\auth()->user()->publish($request);
            return back();
        }
        return back();
    }

    public function avatar_delete($id)
    {
        $user=\auth()->user()->find_by_id($id);
        $avatar=\auth()->user()->delete_avatar();
        $user->avatar='default.jpg';
        $user->save();
        session()->flash('avatar_delete','avatar delete ');
        return back();

    }

    public function store(Request $request,$id)
    {
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'birthday' => 'date|nullable',
        ]);
        if ( ! trim($request->password)) {
            $this->user->update($request->except('password'));
        } else {
            $this->user->update($request->all());
        }

        session()->flash('user-update','profile update success');
        return back();
    }

    public function destroy($id)
    {

        $user=\auth()->user()->find_by_id($id);

        $avatar=\auth()->user()->delete_avatar();
        $user->delete();
        session()->flash('user-delete','user deleted');
        return back();

    }

//    public function sabk_upload(Request $request)
//    {
//        if ($request->hasFile('sabk_id'))
//        {
//            request()->validate([
//                'sabk_id' => 'required|mimes:audio/mpeg',
//                'title'=>'required',
//
//            ]);
//            $song=$request->file('sabk_id');
//            $filename=time(). '.'.$song->getClientOriginalName();
//            $location = public_path('audio/' . $filename);
//            $song->move($location,$filename);
//            dd('ناقص');
//
//            //ناقص
//
//            return back();
//        }
//        return back();    }


}
