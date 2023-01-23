<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Talents;
use App\Models\Talent_User;

class UserController extends Controller
{
    public function home(){
        return view('used.home');
    }

    public function viewlogin(){
        return view('used.login');
    }

    public function login(Request $request){
        $datalogin = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(Auth::attempt($datalogin)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with("loginError","Login Gagal");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function viewregister(){
        return view('used.register');
    }
    public function register(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:50|unique:users',
            'no'=> 'required|min:11|max:13',
            'email'=> 'required|email|min:4|max:100|unique:users',
            'password'=> 'required|min:6|max:100'
        ]);
        $validateData['password']= Hash::make($validateData['password']);
        user::create($validateData);
        return redirect('/login')->with('success', 'REGISTRASI BERHASIL SILAHKAN LOGIN!');
    }

    public function index(){
        return view('used.edit',['data' =>auth()]);
    }

    public function update(Request $request,$id)
    {
        $validatedata = $request->validate([
            'name' => 'required|max:30',
            'address' => 'max:255',
            'image' => 'image|file|max:2080',
        ]);
        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
            $validatedata['image']=$request->file('image')->store('store-images/Users');
        };

        // Save image path to database
        $record = User::findOrFail($id);
        $record->name = $validatedata['name'];
        $record->address = $validatedata['address'];
        $record->image = $validatedata['image'];
        $record->save();
        return redirect('dashboard/profile');
    }
    public function addlist(Talents $Talent){
        $in = [
            'User_id' => auth()->user()->id,
            'Talents_id'=> $Talent->id,
        ];
        Talent_User::create($in);
        return redirect('/dashboard');
    }
    public function delete(Talents $Talent){
        $user = Talent_User::where('User_id',[auth()->user()->id])->where('Talents_id',$Talent->id);
        $user->delete();
        return redirect('/dashboard');
    }
}
