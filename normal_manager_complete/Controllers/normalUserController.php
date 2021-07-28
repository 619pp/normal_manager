<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NormalUser;
use App\Models\updateMobile;
class normalUserController extends Controller
{
    function getNormalUser($emp_id){
      // $data = DB::select("select * from employee where user_name = 'imadam' ");
      $data = DB::table('employee')
      ->where('emp_id',$emp_id)
      ->get();
        return view('normalUser',['employee'=>$data]);
     
    }
    
    function addIssueNormal(Request $req){
      
      $normaluser = new NormalUser;
      $normaluser->emp_id=$req->emp_id;
      $normaluser->issue_type=$req->issue_type;
      $normaluser->issue_desc=$req->issue_desc;
      $normaluser->issue_status="queued";
      $normaluser->save();
      
      return redirect('normal/'.$req->emp_id);
     
    }

    function UpdateMobileNormalUser($emp_id){
      
          $data = DB::table('employee')
        ->where('emp_id',$emp_id)
        ->get();  
        
        return view('editMobileNormalUser',['emp'=>$emp_id]);

      
    }

    function UpdateNormal(Request $req){
      $data = DB::table('employee')
      ->where('emp_id',$req->emp_id)
      ->get();
 

      DB::table('employee')
      ->where('emp_id',$req->emp_id)
      ->update(
        ['mobile_num'=>$req->mobile_num,
        'comm_address'=>$req->comm_address,
        'city'=>$req->city
        ]
      );

      return redirect('normal/'.$req->emp_id);

    }
}
