<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Student;
use App\Course;
use App\Student_course;
use App\StudentPretestAnswer;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboardSiswa(){
        $siswa = Student::all();

        $status_progress = 0;
        $status_pretest = 0;
        $nilaipretest = 0;
        $id_student = 0;
        foreach ($siswa as $murid){
            if ($murid->id_user == Auth::user()->id){
                $status_progress = $murid->progress;
                $status_pretest = $murid->progress_pretest_unit;
                $nilaipretest = $murid->nilai_siswa;
                $id_student = $murid->id;
            }
        }

        $nilairata2pretest = StudentPretestAnswer::where('id_student',$id_student)->avg('jumlah_benar');
        $nilaitertinggipretest = StudentPretestAnswer::where('id_student',$id_student)->max('jumlah_benar');
        $nilaiterendahpretest = StudentPretestAnswer::where('id_student',$id_student)->min('jumlah_benar');

        $unit_siswa = Student::select('unit_start')->where('id_user',Auth::user()->id)->first()->unit_start;
        return view('siswa.dashboard',[
            'statusprogress'=>$status_progress,
            'statuspretest'=>$status_pretest,
            'unit'=>$unit_siswa,
            'nilaipretest'=>$nilairata2pretest*20,
            'nilaipretestmax' => $nilaitertinggipretest*20,
            'nilaipretestmin' => $nilaiterendahpretest*20
        ]);
    }

    public function getDashboardPengajar(){
        $courses = Course::all();
        $siswa = Student::all();
        $adminnotverified = User::where('verified',0)->get();
        $adminnotverifiedcount = $adminnotverified->count();

        $lastuser = DB::table('students')->orderBy('created_at','desc')->first();

        return view('pengajar.dashboard',[
            'students'=>$siswa,
            'lateststudent'=>$lastuser,
            'courses'=>$courses,
            'admincountnorver' => $adminnotverifiedcount,
            'adminnotverfied' =>$adminnotverified
        ]);
    }
    public function getLogin(){
        return view('auth.login');
    }

    public function postSignIn(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = array(
            'username' => $request['username'],
            'password' => $request['password'],
        );

        if(Auth::attempt($credentials)){
            if (!empty($request['remember'])){
                setcookie("remember_login",base64_encode($request['username']),time()+(10*365*24*60*60));
                setcookie("remember_pass",base64_encode($request['password']),time()+(10*365*24*60*60));
            } else {
                if (isset($_COOKIE['remember_login'])){
                    setcookie("remember_login","");
                }
                if (isset($_COOKIE['remember_pass'])){
                    setcookie("remember_pass","");
                }
            }
//            echo Auth::user()->verified;
            if (Auth::user()->verified == 1){
                if (Auth::user()->roles[0]['name'] == "siswa"){
                    return redirect()->route('siswa.dashboard');
                }
                return redirect()->route('pengajar.dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->with('messageLogin','User is unverifiable! Please check your email to verifying your account!');
            }
        }
        return redirect()->back()->with('messageLogin','Incorrect username or password');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
