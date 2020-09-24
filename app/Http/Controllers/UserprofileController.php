<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class UserprofileController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('seeker',['except'=>array('index')]);
    // }
    
    public function index() {
        return view('profile.index');
    }


    public function store(Request $request) { 
        // $request->get('address');
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|numeric|min:10',
            //'phone_number' => 'required|regex:/(01)[0-9]{9}/',
            'bio' => 'required|min:20',
            'experience' => 'required'
        ]);


        $user_id = auth()->user()->id;
        profile::where('user_id',$user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
            'phone_number' => request('phone_number')

        ]);

        return redirect()->back()->with('message', 'profile update success');
    }


    public function coverlatter(Request $request) {

        $this->validate($request, [
            'cover_latter'=>'required|mimes:pdf,doc,docs,jpg,jpeg,png'
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_latter')->store('public/files');
        profile::where('user_id',$user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('message', 'Cover latter has been update');
    }

    public function resume(Request $request) {
        $this->validate($request, [
            'resme'=>'required|mimes:pdf,doc,docs,jpg,jpeg,png'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resme')->store('public/files');
        profile::where('user_id',$user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('message', 'resume has been update');
    }


    public function avatar(Request $request) {
        $this->validate($request, [
            'avatar'=>'required|mimes:jpg,jpeg,png'
        ]);
        
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar', $filename);

            profile::where('user_id',$user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message', 'profile pic has been update');
        }

    }

  

}
