<?php

namespace App\Enumerat;

enum Urls: string
{
    case Base = 'http://127.0.0.2:8000/api/';

    case Patient = "patient";
    case PatientSearch = 'patient/search';
    case PatientRays = "patient/rays";
    case PatientTests = "patient/tests";
    case PatientMedicines = "patient/medicines";
    case PatientInspections = "patient/inspections";
    case SearchForPatient = 'patient/search-patient';
}
