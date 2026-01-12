<x-layout :user="$user">
    <div class="cardBox" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="card text-right">
            <div>
                <div class="numbers d-flex align-items-center">
                    <span>{{ $activePatient }}</span>
                </div>
                <div class="cardName {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }} font-13">{{__('dashboard.accepted_patient')}}</div>
            </div>
        </div>

        <div class="card text-right">
            <div>
                <div class="numbers d-flex align-items-center">
                    <span>{{ $unactivePatient }}</span>
                </div>
                <div class="cardName {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }} font-13">{{__('dashboard.unaccepted_patient')}}</div>
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="recentOrders w-100 {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
            <div class="cardHeader">
                <h2>@lang('dashboard.last_unaccepted_patient')</h2>
            </div>

            <table>
                <thead>
                <tr>
                    <td>@lang('forms.email')</td>
                    <td>@lang('dashboard.patient_name')</td>
                    <td>@lang('forms.regFileNumber')</td>
                    <td>@lang('dashboard.options')</td>
                </tr>
                </thead>

                <tbody>
                @foreach ($lastPatient as $patient)
                    <tr>
                        <td>{{ $patient->user->email }}</td>
                        <td>{{ $patient->user->name }}</td>
                        <td>{{ $patient->file_number }}</td>
                        <td>
                            <a href="/doctor/active" class="btn-sm btn-secondary border-0 ">
                                @lang('dashboard.active')
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- ================= New Customers ================ -->
        <div class="recentCustomers text-right">
            <div class="cardHeader">
                <h2>@lang('dashboard.doctor_info')</h2>
            </div>

            <div class="{{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                @foreach ($userInfo as $key => $value)
                    <p class="">{{ $key }}: {{ $value }}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
