<?php

namespace App\Http\Controllers;

use App\Enumerat\Gender;
use App\Enumerat\UserType;
use App\Mail\DoctorRegisterMail;
use App\Mail\SendCode;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('Auth.register');
    }

    public function doctorRegisterIndex()
    {
        return view('Auth.doctor-register');
    }

    public function patientRegisterIndex()
    {
        return view('Auth.patient-register');
    }

    public function doctorRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'address' => 'required|string',
            'phone' => 'required|string|unique:doctors,phone',
            'practice_number' => 'required|string',
        ]);
        $code = UtilitiesController::createCode();
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'D',
        ]);
        $user->save();

        $doctor = new Doctor([
            'address' => $request->address,
            'phone' => $request->phone,
            'practice_number' => $request->practice_number,
            'code' => $code,
        ]);
        $doctor->user()->associate($user);
        $doctor->save();
        // send mail with code
        // UtilitiesController::sendCode($user->email, $code);

        return redirect()->route('login');
    }

    public function verifyDoctorIndex()
    {
        return view('Auth.verify-doctor');
    }

    public function doctorVerify(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);
        $doctor = Doctor::where('code', $request->code)->first();
        if ($doctor) {
            $doctor->code = null;
            $doctor->save();
            return redirect()->route('login');
        } else {
            return redirect()->back()->with('error', 'رمز التحقق غير صحيح');
        }
    }

    public function registerPatientIndex()
    {
        return view('Auth.register-patient');
    }

    public function patientRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'phone' => 'required|string',
            'file_number' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'age' => 'required|numeric'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'P',
        ]);
        $user->save();
        $patient = new Patient([
            'phone' => $request->phone,
            'address' => $request->address,
            'file_number' => $request->file_number,
            'gender' => $request->gender == 'male' ? Gender::MAlE : Gender::FEMALE,
            'age' => $request->age,
        ]);
        $patient->user()->associate($user);
        $patient->save();

        return redirect()->route('login');
    }

    public function loginIndex()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|exists:users,email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return redirect()->back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
        }
        if (Doctor::query()->whereRelation('user', 'id', Auth::id())->first()?->code != null) {
            Auth::logout();
            return redirect()->back()->with('message', 'الرجاء الانتضار حتى تتم الموافقة من قبل الادمن');
        }
        return redirect()->route('dashboard');
    }

    // logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
