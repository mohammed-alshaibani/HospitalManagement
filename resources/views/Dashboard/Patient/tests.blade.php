<x-layout :user="$user" :patientId="$patientId">
    <div class="details" style="display: block !important" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>{{ __('patient.test') }}</h2>
                {{-- filters by hospital or --}}
            </div>

            <table>
                <thead>
                    <tr class="text-center">
                        @foreach ($headers as $header)
                            <td>{{ $header }}</td>
                        @endforeach
                        <td>{{ __('patient.options') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($body['data'] as $row)
                        @php
                            unset($row['patient_id']);
                        @endphp
                        <tr>
                            @foreach ($row as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('patient.tests', ['id' => $row['id'], 'patient_id' => $patientId]) }}"
                                    class="status delivered cursor-pointer">
                                    {{ __('patient.show') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($body['last_page'] > 1)
                <x-pigenation :current_page="$body['current_page']" :last_page="$body['last_page']"
                    url="{{ route('patient.tests', ['patient_id' => $patientId]) }}"></x-pigenation>
            @endif
        </div>
    </div>
</x-layout>
