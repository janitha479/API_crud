<?php

namespace App\Http\Controllers;

use App\Models\student_we;
use Illuminate\Http\Request;


class studentController extends Controller
{
    function viewStd(){
        $data = student_we::all();
        return response()->json(['student_details',$data],200);
    }

    function viewStdById($id){
        $data = student_we::find($id);
        if(!$data){
        return response()->json(['Error'=>'Student Id is Not Found'],404);
    }else{
        return response()->json(['ID Found',$data],200);
    }
    }

    function deleteStd($id){
        $data = student_we::find($id);
        if(!$data){
            return response()->json(['ID NOt Found',$data],404);
        }else{
            $data->delete();
            return response()->json(['Status'=>'Student Deleted Successfully'],200);
        }
    }


    function storeStd(request $request){
        $data = new student_we;
        $data->name =$request->name;
        $data->nic =$request->nic; 
        $data->course =$request->course; 
        $data->contact =$request->contact;
         $data->save();
         return response()->json(['Status'=>'Student Added successfully'],200);

    }


    function Updatestd(request $request , $id){
        $data = student_we::find( $id);
        if(!$data){
            return response()->json(['Status'=> 'ID Not Found'],404);
        }else{
        $data->name =$request->name ?? $data->name;
        $data->nic =$request->nic ?? $data->nic; 
        $data->course =$request->course ?? $data->course; 
        $data->contact =$request->contact ?? $data->contact;
        $data->save();

         return response()->json(['Status'=>'Student Details Updateed successfully','Updated details'=> $data],200);
        }

    }
}
