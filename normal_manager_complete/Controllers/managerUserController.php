<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NormalUser;
use App\Models\updateMobile;

class managerUserController extends Controller
{
    function getManagerUser($emp_id){
      
      $data = DB::table('employee')
      ->where('emp_id',$emp_id)
      ->get();
      $data2 = DB::table('employee')
      ->join('emp_proj','employee.emp_id','=','emp_proj.emp_id')
      ->join('project','project.proj_id','=','emp_proj.proj_id')
      ->select('employee.*')
      ->where('emp_proj.proj_manager',$emp_id)
      ->get();
 
       //$array = (array)$data['emp_id'];
      /*$data3 = DB::table('issue')
      ->select('issue.*')
      ->where('issue.emp_id',$arrays['emp_id'])
      ->get();*/
      //$array = json_decode(json_encode($data2), true);
      /*$id = $emp_id;
      $data3 = DB::table('issue')
      ->select('issue.*')
      ->whereIn('issue.emp_id', function($query){
          $query->select('employee.emp_id')
          ->from('employee')
         
          ->join('emp_proj','employee.emp_id','=','emp_proj.emp_id')
          ->join('project','project.proj_id','=','emp_proj.proj_id')
          ->where('emp_proj.proj_manager', 103)
           ->get();
      }
        )
      ->get();
      
      $data3 = DB::table('employee')
      ->where('emp_id',$emp_id)
      ->get();*/
      
      return view('managerUser',['employee'=>$data],['reported'=>$data2]);
     
    }
    
    function addIssue(Request $req){
      
      $normaluser = new NormalUser;
      $normaluser->emp_id=$req->emp_id;
      $normaluser->issue_type=$req->issue_type;
      $normaluser->issue_desc=$req->issue_desc;
      $normaluser->issue_status="queued";
      $normaluser->save();
      
      return redirect('manager/'.$req->emp_id);
     
    }

    function UpdateMobileManager($emp_id){
      
          $data = DB::table('employee')
        ->where('emp_id',$emp_id)
        ->get();  
        
        return view('editMobileManager',['emp'=>$emp_id]);

     
    }

    function UpdateManagerMobile(Request $req){
        DB::table('employee')
         ->where('emp_id',$req->emp_id)
         ->update(
         ['mobile_num'=>$req->mobile_num,
          'comm_address'=>$req->comm_address,
         'city'=>$req->city
         ]
      );

      return redirect('manager/'.$req->emp_id);

    }

    function deleteRepotee($emp_id ,$manager_id){
        DB::table('emp_proj')
        ->where('emp_id',$emp_id)
        ->where('proj_manager',$manager_id)
        ->delete();

        return redirect('manager/'.$manager_id);
    }

    function getIssue($id){
        $data= DB::table('issue')
        
        ->get();
     
        //return view('issue',['issue'=>$data3]);
        return view('issue',['issue'=>$data],['ID'=>$id]);
    }

    function addEmployee($id){ 
        return view('addEmployeeToProject',['ID'=>$id]);
    }

    function addedEmployee(Request $req){
       /* DB::table('employee')
        ->where('emp_id',$req->emp_id)
        ->update(
          ['mobile_num'=>$req->mobile_num,
          'comm_address'=>$req->comm_address,
          'city'=>$req->city
          ]
        );*/
        DB::table('emp_proj')
        ->insert(
            [
                'emp_id'=>$req->emp_id,
                'proj_id'=>$req->proj_id,
                'proj_manager'=>$req->proj_manager
            ]
            );
        return redirect('manager/'.$req->id);
    }
}

