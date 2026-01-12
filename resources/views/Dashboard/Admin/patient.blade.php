<x-layout :user="$user">

    <!-- ================ Order Details List ================= -->
    <div class="details w-100 d-block"  dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="recentOrders w-100 text-right">
            <div class="cardHeader">
                <h2>{{ __('patient.patients') }}</h2>
            </div>

            <table class="{{app()->getLocale() == 'en'?'text-left' :'text-right'}}">
                <thead>
                    <tr>
                        <td>{{ __('patient.email') }}</td>
                        <td>{{ __('patient.name') }}</td>
                        <td>{{ __('patient.fileNumber') }}</td>
                        <td>{{ __('patient.options') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $patient)
                        <tr>
                            <td>{{ $patient->user->email }}</td>
                            <td>{{ $patient->user->name }}</td>
                            <td>{{ $patient->file_number }}</td>
                            <td>
                                <form action="{{ route('patient.delete', $patient->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger border-0 mb-1 cursor-pointer">
                                        {{ __('patient.delete') }}
                                    </button>
                                </form>
                                <a href="{{ route('patient.show', $patient->id) }}"
                                    class="btn-sm btn-info border-0 text-white cursor-pointer">
                                    {{ __('patient.show') }}
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
