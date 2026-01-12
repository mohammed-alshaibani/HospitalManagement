<x-layout :user="$user">

    <!-- ================ Order Details List ================= -->
    <div dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" class="details w-100 d-block">
        <div class="recentOrders w-100 {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
            <div class="cardHeader">
                <h2>{{ __('doctor.inactiveFiles') }}</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td style="min-width: 200px">{{ __('doctor.email') }}</td>
                        <td style="min-width: 200px">{{ __('doctor.patientName') }}</td>
                        <td style="min-width: 200px">{{ __('doctor.fileNumber') }}</td>
                        <td style="min-width: 200px">{{ __('doctor.options') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $patient)
                        <tr>
                            <td>{{ $patient->user->email }}</td>
                            <td>{{ $patient->user->name }}</td>
                            <td>{{ $patient->file_number }}</td>
                            <td>
                                <a href="/doctor/active" class="btn-sm btn-secondary border-0 ">
                                    {{ __('doctor.patient.activate') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @if ($last_page > 1)
            <x-pigenation :current_page="$current_page" :last_page="$last_page" url="/doctor/active-files" />
        @endif
    </div>
</x-layout>
