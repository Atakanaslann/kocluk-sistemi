<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == '2'){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('student.dashboard',$data);
        }else if(Auth::user()->role == '1'){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('coach.dashboard',$data);
        }else if(Auth::user()->role == '0'){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('admin.dashboard',$data);
        }
    }
}