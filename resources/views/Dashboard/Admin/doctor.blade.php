<x-layout :user="$user">

    <!-- ================ Order Details List ================= -->
    <div class="details w-100 d-block" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="recentOrders w-100 {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
            <div class="cardHeader">
                <h2>{{ __('doctor.doctors') }}</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>{{ __('doctor.email') }}</td>
                        <td>{{ __('doctor.doctorName') }}</td>
                        <td>{{ __('doctor.practiceNumber') }}</td>
                        <td>{{ __('doctor.options') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $doctor)
                        <tr class="text-center " style="height: 50px">
                            <td>{{ $doctor->user->email }}</td>
                            <td>{{ $doctor->user->name }}</td>
                            <td>{{ $doctor->practice_number }}</td>
                            <td class="d-flex flex-wrap align-items-center h-100 justify-content-center">
                                <a href="{{ route('doctor.edit', $doctor->id) }}"
                                    class="btn-sm btn-info border-0 text-white cursor-pointer mx-2 my-auto">
                                    {{ __('doctor.edit') }}
                                </a>
                                <a href="{{ route('doctor.delete', $doctor->id) }}"
                                    class="btn-sm btn-danger border-0 text-white cursor-pointer mx-2 my-auto">
                                    {{ __('doctor.delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @if ($last_page > 1)
            <x-pigenation :current_page="$current_page" :last_page="$last_page" url="/patient-manager" />
        @endif
    </div>
</x-layout>
