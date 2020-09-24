<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

  // public function __construct()
  //   {
  //       $this->middleware('seeker',['except'=>array('index')]);
  //   }


    public function index($id, Company $company) {
      return view('company.index', compact('company'));
    }

    public function create(){
      return view('company.create');
    }

    

    public function store(Request $request) { 
      // $request->get('address');
      // $this->validate($request, [
      //     'address' => 'required',
      //     'phone_number' => 'required|numeric|min:10',
      //     //'phone_number' => 'required|regex:/(01)[0-9]{9}/',
      //     'bio' => 'required|min:20',
      //     'experience' => 'required'
      // ]);


      $user_id = auth()->user()->id;
      Company::where('user_id',$user_id)->update([
          'address' => request('address'),
          'phone' => request('phone'),
          'website' => request('website'),
          'slogan' => request('slogan'),
          'description' => request('description'),
      ]);

      return redirect()->back()->with('message', 'Company update success');
  }

  public function coverphoto(Request $request){

    $this->validate($request, [
      'cover_photo'=>'required|mimes:jpg,jpeg,png'
  ]);
  

    $user_id = auth()->user()->id;
    if($request->hasFile('cover_photo')){
      $file = $request->file('cover_photo');
      $ext = $file->getClientOriginalExtension();
      $filename = time().'.'.$ext;
      $file->move('uploads/coverphoto/', $filename);

      Company::where('user_id',$user_id)->update([
        'cover_photo' => $filename
      ]);
      return redirect()->back()->with('message', 'Cover image successfully update');

    }
  }
  public function companylogo(Request $request) {
    // $this->validate($request, [
    //     'avatar'=>'required|mimes:jpg,jpeg,png'
    // ]);
    
    $user_id = auth()->user()->id;
    if($request->hasFile('company_logo')){
        $file = $request->file('company_logo');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/logo', $filename);

        Company::where('user_id',$user_id)->update([
            'logo' => $filename
        ]);
        return redirect()->back()->with('message', 'Logo image successfully update');
      }
}
}
