<?php

namespace App\Http\Controllers;

use App\Enumerat\Urls;
use App\Enumerat\UserType;
use App\Mail\VerfyRequest;
use App\Models\Doctor;
use App\Models\DoctorPatients;
use App\Models\Patient;
use App\Models\User;
use Dflydev\DotAccessData\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request as FacadRequest;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('patient')->find(Auth::id());
        $props = [
            'user' => $user,
        ];
        $patient = Patient::whereRelation('user', 'id', Auth::id())->first();
        if ($user->role == UserType::Patient) {
            $userInfo = [
                __('forms.name') => $user->name,
                __('forms.email') => $user->email,
                __('forms.phone') => $user->patient->phone,
                __('forms.address') => $user->patient->address,
                __('forms.regFileNumber') => $user->patient->file_number,
            ];
            $props = [
                'user' => $user,
                'userInfo' => $userInfo,
                'tests' => count(ApiController::getData($request, Urls::PatientTests, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
                'rays' => count(ApiController::getData($request, Urls::PatientRays, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
                'inspections' => count(ApiController::getData($request, Urls::PatientInspections, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
                'medicines' => count(ApiController::getData($request, Urls::PatientMedicines, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
            ];
            return view('Dashboard.Patient.index', $props);
        }
        if ($user->role == UserType::Doctor) {
            $userInfo = [
                __('forms.name') => $user->name,
                __('forms.email') => $user->email,
                __('forms.phone') => $user->doctor->phone,
                __('forms.address') => $user->doctor->address,
                __('forms.practiceNumber') => $user->doctor->practice_number,
            ];
            $lastPatient = Patient::with('user')->whereIn('id', DoctorPatients::orderByDesc('id')->where('code', '>', 1)->take(6)->get('patient_id'))->get();
            $props = [
                'user' => $user,
                'userInfo' => $userInfo,
                'unactivePatient' => Patient::whereIn('id', DoctorPatients::query()->where('code', '>', 1)->pluck('patient_id'))->count(),
                'activePatient' =>  Patient::whereIn('id', DoctorPatients::query()->where('code', '=', 1)->pluck('patient_id'))->count(),
                'lastPatient' => $lastPatient,
            ];
            return view('dashboard.doctor.index', $props);
        }
        $props = [
            'user' => $user,
            'patients' => Patient::count(),
            'doctors' => Doctor::count(),
            'doctorsUnderActive' => Doctor::whereNotNull('code')->count(),
            'activeDoctor' => Doctor::whereNull('code')->count(),
            'doctorsData' => User::with('doctor')->whereRelation('doctor', 'code', '!=', null)->get(),
        ];
        return view('dashboard', $props);
    }

    public function patientTestsIndex(Request $request, $id = null)
    {
        if ($id) {
            $props = [
                'user' => $request->user(),
                'patientId' => $request->get('patient_id') ?? null,
                'data' => ApiController::showData(Urls::PatientTests, $id),
            ];
            return view('Dashboard.Patient.show-test', $props);
        }
        if ($request->has('patient_id'))
            $patient = Patient::where('file_number', $request->get('patient_id'))->first();
        else
            $patient = Patient::whereRelation('user', 'id', Auth::id())->first();
        $props = [
            'user' => $request->user(),
            'patientId' => $request->get('patient_id'),
            'headers' => ['ID', __('forms.name'), __('patient.type'), __('patient.result'), __('patient.hospital'), __('patient.date')],
            'body' => ApiController::getData($request, Urls::PatientTests, id: $patient?->file_number ?? $request->get('patient_id')),
        ];

        return view('Dashboard.Patient.tests', $props);
    }

    public function patientRaysIndex(Request $request, $id = null)
    {
        if ($id) {
            $props = [
                'user' => $request->user(),
                'patientId' => $request->get('patient_id') ?? null,
                'data' =>  ApiController::showData(Urls::PatientRays, $id),
            ];
            return view('Dashboard.Patient.show-ray', $props);
        }
        if ($request->has('patient_id'))
            $patient = Patient::where('file_number', $request->get('patient_id'))->first();
        else
            $patient = Patient::whereRelation('user', 'id', Auth::id())->first();
        $props = [
            'user' => $request->user(),
            'patientId' => $request->get('patient_id'),
            'headers' => ['ID', __('forms.name'), __('patient.type'), __('patient.result'), __('patient.hospital'), __('patient.date')],
            'body' => ApiController::getData($request, Urls::PatientRays, id: $patient?->file_number ?? $request->get('patient_id')),
        ];

        return view('Dashboard.Patient.rays', $props);
    }

    public function patientInspectionsIndex(Request $request, $id = null)
    {
        if ($id) {
            $props = [
                'user' => $request->user(),
                'patientId' => $request->get('patient_id') ?? null,
                'data' => ApiController::showData(Urls::PatientInspections, $id)
            ];
            return view('Dashboard.Patient.show-inspections', $props);
        }
        if ($request->has('patient_id'))
            $patient = Patient::where('file_number', $request->get('patient_id'))->first();
        else
            $patient = Patient::whereRelation('user', 'id', Auth::id())->first();
        $props = [
            'user' => $request->user(),
            'patientId' => $request->get('patient_id'),
            'headers' => ['ID', __('forms.name'), __('patient.type'), __('patient.result'), __('patient.hospital'), __('patient.date')],
            'body' => ApiController::getData($request, Urls::PatientInspections, id: $patient?->file_number ?? $request->get('patient_id'))
        ];

        return view('Dashboard.Patient.inspections', $props);
    }

    public function patientMedicinesIndex(Request $request, $id = null)
    {
        if ($request->has('patient_id')) {
            $patient = Patient::where('file_number', $request->get('patient_id'))->first();
        } else
            $patient = Patient::whereRelation('user', 'id', Auth::id())->first();
        if ($id) {
            $props = [
                'user' => $request->user(),
                'patientId' => $request->get('patient_id') ?? null,
                'data' => ApiController::showData(Urls::PatientMedicines, $id)
            ];
            return view('Dashboard.Patient.show-medicines', $props);
        }

        $props = [
            'user' => $request->user(),
            'patientId' => $request->get('patient_id'),
            'headers' => ['ID', __('patient.name'),  __('patient.type'),  __('patient.quantity'), __('patient.duration'), __('patient.case_number')],
            'body' => ApiController::getData($request, Urls::PatientMedicines, id: $patient?->file_number ?? $request->get('patient_id'))
        ];

        return view('Dashboard.Patient.medicines', $props);
    }

    public function activeDoctor(Request $request)
    {
        Doctor::query()->where('id', $request->id)->update([
            'code' => null,
        ]);
        return redirect()->back();
    }

    public function patientManager(Request $request)
    {
        $data = Patient::with('user')->paginate(6);
        $props = [
            'data' => $data->items(),
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
            'user' => $request->user()
        ];
        return view('Dashboard.Admin.patient', $props);
    }

    public function doctorManager(Request $request)
    {
        $data = Doctor::with('user')->paginate(6);
        $props = [
            'data' => $data->items(),
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
            'user' => $request->user()
        ];
        return view('Dashboard.Admin.doctor', $props);
    }

    public function deletePatient(Patient $patient, Request $request)
    {
        $patient->delete();
        return redirect()->route('patient-manager');
    }

    public function showPatient(Patient $patient, Request $request)
    {
        $notes = DoctorPatients::where('patient_id', $patient->id)->whereNull('code')->get('note');
        return view('Dashboard.Admin.show-patient', ['patient' => $patient->load('user'), 'user' => $request->user(), 'notes' => $notes]);
    }

    public function editDoctor(Doctor $doctor, Request $request)
    {
        return view('Dashboard.Admin.edit-doctor', ['doctor' => $doctor->load('user'), 'user' => $request->user(),]);
    }

    public function updateDoctor(Doctor $doctor, Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "address" => "required",
            "practice_number" => "required",
        ]);
        $doctor->update($data);
        $doctor->user?->update($data);
        return redirect()->route('doctor-manager');
    }

    public function activeFiles(Request $request)
    {
        $search = $request->get('search') ?? null;
        $patient = Patient::query()
            ->whereIn('id', DoctorPatients::where('code', 1)->get('patient_id'))
            ->when($search, fn ($query, $search) => $query->whereRelation('user', 'name', 'like', "%$search%"))
            ->paginate(6);
        return view('dashboard.doctor.active-files', [
            'user' => $request->user(),
            'search' => $search ?? '',
            'data' => $patient->items(),
            'current_page' => $patient->currentPage(),
            'last_page' => $patient->lastPage(),
        ]);
    }

    public function unActiveFiles(Request $request)
    {
        $search = $request->get('search') ?? null;
        $patient = Patient::query()
            ->whereIn('id', DoctorPatients::where('code', '>', 1)->get('patient_id'))
            ->when($search, fn ($query, $search) => $query->whereRelation('user', 'name', 'like', "%$search%"))
            ->paginate(6);
        return view('dashboard.doctor.unactive-files', [
            'user' => $request->user(),
            'search' => $search ?? '',
            'data' => $patient->items(),
            'current_page' => $patient->currentPage(),
            'last_page' => $patient->lastPage(),
        ]);
    }

    public function activePatientIndex()
    {
        return view('dashboard.doctor.active');
    }

    public function activePatient(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:doctor_patients,code',
        ]);
        $doctor = Doctor::query()->whereRelation('user', 'id', '=', Auth::id())->first();
        $doctorPatient = DoctorPatients::query()
            ->where('code', $request->input('code'))
            ->where('doctor_id', $doctor->id)
            ->first();
        $patient = Patient::query()->findOrFail($doctorPatient->patient_id);
        $doctorPatient = DoctorPatients::query()
            ->where('doctor_id', $doctor->id)
            ->where('patient_id', $patient->id)
            ->whereNotNull('code')
            ->where('code', '!=', 1)
            ->where('code', '!=', 0);

        $doctorPatient->update([
            'code' => 1
        ]);

        return to_route('patient.tests', ['patient_id' => $patient->file_number]);
    }

    public function showActivePatient(Request $request, Patient $patient)
    {
        $user = $patient->user;
        $userInfo = [
            'الاسم' => $user->name,
            'البريد الالكتروني' => $user->email,
            'رقم التلفون' => $user->patient->phone,
            'العنوان' => $user->patient->address,
            "رقم الملف الطبي" => $user->patient->file_number,
        ];
        $props = [
            'user' => $user,
            'userInfo' => $userInfo,
            'patientId' => $patient->id,
            'tests' => count(ApiController::getData($request, Urls::PatientTests, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
            'rays' => count(ApiController::getData($request, Urls::PatientRays, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
            'inspections' => count(ApiController::getData($request, Urls::PatientInspections, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
            'medicines' => count(ApiController::getData($request, Urls::PatientMedicines, id: $patient?->file_number ?? $request->get('patient_id'))['data']),
        ];
        return view('Dashboard.Patient.index', $props);
    }

    public function deleteDoctor(Doctor $doctor, Request $request)
    {
        $doctor->delete();
        return redirect()->route('doctor-manager');
    }

    public function searchForFileIndex()
    {
        return view('dashboard.doctor.search', [
            'user' => FacadRequest::user()
        ]);
    }

    public function searchForFile(Request $request)
    {
        $request->validate([
            'search' => 'required',
            'emergency' => ''
        ]);
        try {
            DB::beginTransaction();

            $code = UtilitiesController::createCode();
            $patient = Patient::with('user')->where('file_number', $request->search)->first();
            if (!$patient) {
                $url = Urls::Base->value . Urls::SearchForPatient->value;
                $data = UtilitiesController::urlWithToken()->get($url, ['search' => $request->search]);
                if ($data->status() != 200) {
                    return redirect()->back()->withErrors(['search' => __('forms.findSearchError')]);
                }
                return to_route('patient.tests', ['patient_id' => $data->json()['file_number']]);
            }
            $doctor = Doctor::query()->whereRelation('user', 'id', Auth::id())->first();
            $doctor->patients()->attach($patient->id, ['code' => $code]);
            $email = $request->get('emergency') == 'on' ?  User::query()->where('role', UserType::Admin)->first()?->email : $patient->user->email;
            // send code to patient email
            if (Mail::to($email)->send(new VerfyRequest($code, $doctor))) {
                DB::commit();
                return redirect()->route('dashboard');
            } else {
                DB::rollBack();
                return redirect()->back()->withErrors(['search' => __('forms.sendMailError')]);
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['search' => $e->getMessage()]);
        }
    }

    public function addNoteIndex($patient_id)
    {
        return view('dashboard.doctor.add-note', ['patientId' => $patient_id]);
    }

    public function addNote(Request $request)
    {
        $request->validate([
            'note' => 'required|string',
            'id' => 'required|exists:patients,file_number'
        ]);
        $id = $request->get('id');

        DoctorPatients::query()
            ->where('code', 1)
            ->where('patient_id', Patient::firstWhere('file_number', $id)?->id)
            ->where('doctor_id', Doctor::whereRelation('user', 'id', Auth::id())->first()?->id)
            ->update([
                'note' => $request->note,
                'code' => 0
            ]);

        return redirect()->route('dashboard');
    }

    public function changeLang(string $lang)
    {
        if (!in_array($lang, ['ar', 'en']))
            abort(404);
        App::setLocale($lang);
        // Session
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
