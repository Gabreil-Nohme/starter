<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOne(){
        $user=User::whereHas('phone',function($q){
            $q->where('code',54);
        })->get();

        return response()->json($user);
    }
    public function hasOneP(){
        $phone=Phone::with(['user'=>function($q){
            $q->select('id','name');
        }])->find(1);
        return $phone->user;
    }

    public function hospitalshasMany(){
       $hospital= Hospital::find(1);
       //return $hospital->doctors;
       $hospitalDoctor= Hospital::with('doctors')->find(1);
      // return $hospitalDoctor;
      $doctors=$hospital->doctors;
      foreach($doctors as $doctor){
         //echo $doctor->name.'<br>';
      }
      $doctorHospital= Doctor::find(2);
      return $doctorHospital->hospital->name;
    }
    public function viewHospitals(){
        $hospitals=Hospital::select('id','name','address')->get();
        return view('relations.hospitals',compact('hospitals'));
    }
    public function  viewDoctors($h_id){
        $viewDoctors=Hospital::find($h_id);
        $doctors=$viewDoctors->doctors;
        return view('relations.doctors',compact('doctors'));
    }
    public function whereHasDoctors(){
       return $whereHasDoctors=Hospital::whereHas('doctors')->get();
    }
    public function HasMaleDoctor(){
            return $HasMaleDoctor=Hospital::whereHas('doctors',function($q){
                $q->where('gender',1);
            })->with('doctors')->get();

    }
    public function NotHasDoctor(){
        return $NotHasDoctor=Hospital::whereDoesntHave('doctors')->get();

    }
    public function deleteHospital($h_id){
        $hospitall= Hospital::find($h_id);
        if(!isset($hospitall)){
        return redirect()->back();
        }else{
        $hospitall->doctors()->delete();
        $hospitall->delete();
        return redirect()->route('viewHospitals');
        }

    }
    public function getDoctorService(){
       return $doctor= Doctor::with('services')->find(2);//يعود بمعلومات الدكتور مع تخصصاته
       // return $doctor->services;//يعود بتخصص الدكتور فقط
    }
    public function getServiceDoctor(){
        return $doctors=Service::with(['doctors'=>function($q){
            $q->select('doctors.id','name','title');
        }])->find(1);
    }
}
