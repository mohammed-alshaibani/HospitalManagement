<x-layout :user="$user" :patient_id="$patientId">
    <div class="details" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" style="display: block !important">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>{{ __('patient.inspection')}}</h2>
                {{-- filters by hospital or --}}
            </div>

            <table class="{{app()->getLocale() == 'en'?'text-left' :'text-right'}}">
                <thead>
                    <tr >
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
                                <td style="min-width: 100px">{{ $item }}</td>
                            @endforeach
                            <td style="min-width: 100px">
                                <a href="{{ route('patient.inspections', ['id' => $row['id'], 'patient_id' => $patientId]) }}"
                                    class="status delivered cursor-pointer">{{ __('patient.show') }}</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            @if ($body['last_page'] > 1)
                <x-pigenation :current_page="$body['current_page']" :last_page="$body['last_page']"
                    url="{{ route('patient.inspections', ['patient_id' => $patientId]) }}">
                </x-pigenation>
            @endif
        </div>
    </div>
</x-layout>
