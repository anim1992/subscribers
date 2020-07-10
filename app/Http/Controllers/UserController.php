<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Subscriber;
class UserController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);
        $fileD = fopen($request->file, "r");
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {
            if($value[0] !== null){
                if(filter_var($value[1], FILTER_VALIDATE_EMAIL))
                {
                Subscriber::create(['name'=>$value[0],'email'=>$value[1]]);
                }
            }
        }
        return redirect()->route('home')->with('success', 'Upload successfully');
    }
}
