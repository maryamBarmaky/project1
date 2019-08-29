<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','birthday','avatar','location','bio','language_singer','patogh','extra_art',
        'instagram','grade','sabk_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function publish(Request $request)
    {
        $avatar=$request->file('avatar');
        $filename=time(). '.'.$avatar->getClientOriginalName();
        Image::make($avatar)->resize(300,300)->save(public_path('/upload/avatar/'.$filename));
        $user=Auth::user();
        $user->avatar=$filename;
        $user->save();
        session()->flash('avatar_upload','avatar uploaded');


    }

    public function find_by_id($id)
    {
//        User::where('id',$id)->first();
        return $this->where('id',$id)->first();

    }

    public function delete_avatar()
    {
        $path=\auth()->user()->path();
        File::delete([
            $path,
        ]);
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    public function owns($related)
    {
        return $this->id == $related->user_id;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    public function path()
    {
        return public_path()."/upload/avatar/".$this->avatar;

    }
}
