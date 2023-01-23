<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talents;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller{

    public function index(){
        $dataTalent = Talents::all();
        $allData =[
            'allTalent'=> $dataTalent,
            'empty'=> ''
        ];
        return view('used.admin')->with('data',$allData);
    }

    public function delete(Talents $Talent){
        $data = Talents::findOrFail($Talent->id);
        $data->delete();
        Storage::delete($Talent->Image);
        return redirect()->back();
    }
    public function addOrupdate(Request $request){
        $validatedata = $request->validate([
            'Nama' => 'required|min:3|max:50',
            'Umur' => 'required|Integer',
            'Alamat' => 'required',
            'No'=> 'required|min:11|max:13',
            'Deskripsi'=> 'required|max:250',
            'Image'=> 'image|file|max:5000'
        ]);
        if($request->filled('id')){
            $record = Talents::findOrFail($request->id);
            if($request->file('image')){
                Storage::delete($request->oldimage);
                $validatedata['Image']=$request->file('image')
                ->store('store-images/Talents');
            }
            else{
                $validatedata['Image']=$record->Image;
            }
            $record->Nama = $validatedata['Nama'];
            $record->Umur = $validatedata['Umur'];
            $record->Alamat = $validatedata['Alamat'];
            $record->No = $validatedata['No'];
            $record->Deskripsi = $validatedata['Deskripsi'];
            $record->Image = $validatedata['Image'];
            $record->save();
        }
        else{
            $validatedata['Image']=$request->file('image')->store('store-images/Talents');
            Talents::create($validatedata);
        }

        return redirect()->Route('HalamanAdmin');
    }
    public function edit(Talents $Talent){
        $dataTalent = Talents::all();
        $allData =[
            'allTalent'=> $dataTalent,
            'Talent'=> $Talent
        ];
        return view('used.admin')->with('data',$allData);
    }
}
