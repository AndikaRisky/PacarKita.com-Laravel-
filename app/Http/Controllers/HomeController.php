<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Talents;
use App\Models\Talent_User;
use Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $dataTalent = Talents::all();
        $datawish = Talent_User::where('User_id',[auth()->user()->id])->get();
        $data = [];
        foreach($datawish as $d){
            array_push($data,$d->Talents_id);
        }
        $alldata =[
            'talent' => $dataTalent,
            'wishlist'=> $data
        ];
        return view('used.dashboard',['data'=> $alldata]);
    }
    public function profile(){
        return view('used.profile',['data' =>auth()]);
    }
    public function wishlist(){
        $id = auth()->User()->id;
        $datawish = User::find($id)->Talents;
        return view('used.wishlist',['datalist' =>$datawish]);
    }
    public function aboutUs(){
        return view('used.aboutUs');
    }

}
