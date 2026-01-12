<x-layout :user="$user">

    <!-- ================ Order Details List ================= -->
    <div class="details w-100 d-block">
        <div dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" class="recentOrders w-100 {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
            <div class="cardHeader">
                <h2>@lang('main.activeFiles')</h2>
            </div>

            <table class="overflow-auto">
                <thead>
                    <tr>
                        <td>@lang('forms.email')</td>
                        <td>@lang('dashboard.patient_name')</td>
                        <td>@lang('forms.regFileNumber')</td>
                        <td>@lang('dashboard.options')</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $patient)
                        <tr>
                            <td style="min-width: 200px">{{ $patient->user->email }}</td>
                            <td style="min-width: 200px">{{ $patient->user->name }}</td>
                            <td style="min-width: 200px">{{ $patient->file_number }}</td>
                            <td style="min-width: 200px">
                                <a href="{{ route('patient.tests', ['patient_id' => $patient->file_number]) }}"
                                    class="btn-sm btn-info border-0 text-white cursor-pointer">
                                    @lang('dashboard.show')
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
