<x-layout :user="$user" :patientId="$patientId">
    <div class="details" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" style="display: block !important">
        <div class="recentOrders">
            <div class="cardHeader">
                <div class="d-flex align-items-baseline font-semibold">
                    <a style="transform: rotate({{app()->getLocale() == 'ar'?'180deg' :'0deg'}})"
                       href="{{ route('patient.tests', ['page' => 1, 'patient_id' => $patientId]) }}" class="backIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-arrow-left">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                    </a>
                    <h2 class="mx-4"> {{ $data['name'] }}</h2>
                    <p>{{ $data['type'] }}</p>
                </div>
                <div></div>
                {{-- back ar icon svg --}}


            </div>
            <div class="row text-right">
                @foreach ($data as $key => $item)
                    @if ($key == 'name' || $key == 'type')
                        @continue
                    @elseif (is_array($item))
                        @foreach ($item as $image)
                            <div class="col-12 col-md-6 py-2">
                                <div class="card">
                                    <div class="d-flex p-2">
                                        <img class="w-100 h-75 " style="object-fit: cover" src="{{ $image['path'] }}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @continue
                    @endif
                    <div class="col-12 col-md-6 py-2">
                        <div class="card">
                            <div class="d-flex p-2">
                                <div class="cardName px-2">{{ $key }}:</div>
                                <div class="numbers">{{ $item }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
