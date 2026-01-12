<x-layout :user="$user">
    <div class="details"  dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" style="display: block !important">
        <div class="recentOrders">
            <div class="cardHeader d-flex align-content-center justify-content-start">
                {{-- back ar icon svg --}}
                <a style="transform: rotate({{app()->getLocale() == 'ar'?'180deg' :'0deg'}})" href="{{ route('patient-manager') }}" class="backIcon  mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        rotate="180" class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </a>
                <h2>{{ $patient->user->name }}</h2>
            </div>
            <div class="row ">
                <div class="col-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.name') }}: </div>
                            <div class="numbers">{{ $patient->user->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.email') }}: </div>
                            <div class="numbers">{{ $patient->user->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.gender') }}: </div>
                            <div class="numbers">{{ $patient->gender ? 'male' : 'female' }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.age') }}: </div>
                            <div class="numbers">{{ $patient->age }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.address') }}: </div>
                            <div class="numbers">{{ $patient->address }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.phone') }}: </div>
                            <div class="numbers">{{ $patient->phone }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName px-2">{{ __('patient.fileNumber') }}: </div>
                            <div class="numbers">{{ $patient->file_number }}</div>
                        </div>
                    </div>
                </div>
                @if ($notes and $user->role->value == 'D')
                    @foreach ($notes as $note)
                        <div class="col-12 col-md-6 py-2">
                            <div class="card">
                                <div class="d-flex p-2">
                                    <div class="cardName px-2">{{ __('patient.note') }}: </div>
                                    <div class="numbers">{{ $note }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>
