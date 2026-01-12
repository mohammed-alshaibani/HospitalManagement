<x-layout :user="$user">
    <div class="cardBox" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <div class="card {{app()->getLocale() == 'en'?'text-left' :'text-right'}}">
            <div>
                <div class="numbers d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7 2v2h1v14a4 4 0 0 0 4 4a4 4 0 0 0 4-4V4h1V2H7m4 14c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m2-4c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m1-5h-4V4h4v3Z" />
                    </svg>
                    <span>{{ $tests }}</span>
                </div>
                <div class="cardName font-13">{{ __('patient.test') }} </div>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 3H5c-1.11 0-2 .89-2 2v14c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2m-1.9 10H13v1h4s-.06 3-1.5 3c-1.35 0-1-1.53-2.5-2v2c0 .55-.45 1-1 1s-1-.45-1-1v-2c-1.5.47-1.15 2-2.5 2C7.06 17 7 14 7 14h4v-1H6.9c-.05-.31-.06-.65-.1-1H11v-1H6.81c.02-.33.1-.67.19-1h4V9H7.34c.16-.35.31-.69.49-1H11V7c0-.55.45-1 1-1s1 .45 1 1v1h3.17c.18.31.33.65.49 1H13v1h4c.1.33.17.67.19 1H13v1h4.2c-.04.35-.05.69-.1 1Z" />
                    </svg>
                    <span>{{ $rays }}</span>
                </div>
                <div class="cardName font-13">{{ __('patient.rays') }}</div>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm5.6-5.225q.2 0 .375-.063t.325-.212l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275t-.7.275L10.6 13.4l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7t.275.7L9.9 15.5q.15.15.325.212t.375.063Z" />
                    </svg>
                    <span>{{ $inspections }}</span>
                </div>
                <div class="cardName font-13">{{ __('patient.inspection') }}</div>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6 3h12v2H6V3m11 3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-1 9h-2.5v2.5h-3V15H8v-3h2.5V9.5h3V12H16v3Z" />
                    </svg>
                    <span>{{ $medicines }}</span>
                </div>
                <div class="cardName font-13">{{ __('patient.medicine') }}</div>
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details-patient-page"  dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers {{app()->getLocale() == 'en'?'text-left' :'text-right'}}">
            <div class="cardHeader">
                <h2>{{ __('patient.patientInfo') }}</h2>
            </div>

            <div class="row">
                @foreach ($userInfo as $key => $value)
                    <p class="col-6">{{ $key }}: {{ $value }}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
