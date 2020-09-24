<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class EmployerregisterController extends Controller
{
    public function Employerregister()
    {
        $user = User::create([
           
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            $slu =request('cname'),
            'cname' => request('cname'),
            'user_id' => $user->id,
            'slug' =>  $slu
        ]);

        return redirect()->to('login');
    }
}
