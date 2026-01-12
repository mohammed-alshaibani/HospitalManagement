<x-layout :user="$user">
    <div class="details" dir="{{app()->getLocale() == 'en'?'ltr':'rtl'}}" style="display: block !important">
        <div class="recentOrders">
            <div class="cardHeader d-flex align-content-center justify-content-start">
                {{-- back ar icon svg --}}
                <a style="transform: rotate({{app()->getLocale() == 'ar'?'180deg' :'0deg'}})" href="{{ route('doctor-manager') }}" class="backIcon  mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         rotate="180" class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </a>
                <h2>{{ $doctor->user->name }}</h2>
            </div>
            <form method="POST" action="{{ route('doctor.edit', $doctor->id) }}" class="row text-truncate {{app()->getLocale() == 'en'?'text-left':'text-right'}}">
                @csrf
                @method("PUT")
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName col-4 px-2">{{ __('forms.name') }}: </div>
                            <input class="col-8 border-0 border-bottom-1 border-dark" required value="{{ $doctor->user->name }}" placeholder="{{ __('forms.name') }}" name="name" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName col-4 px-2">{{ __('forms.email') }}: </div>
                            <input class="col-8 border-0 border-bottom-1 border-dark" required value="{{ $doctor->user->email }}" placeholder="{{ __('forms.email') }}" name="email" type="email">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName col-4 px-2">{{ __('forms.phone') }}: </div>
                            <input class="col-8 border-0 border-bottom-1 border-dark" required value="{{ $doctor->phone }}" placeholder="{{ __('forms.phone') }}" name="phone" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName col-4 px-2">{{ __('forms.address') }}: </div>
                            <input class="col-8 border-0 border-bottom-1 border-dark" required value="{{ $doctor->address }}" placeholder="{{ __('forms.address') }}" name="address" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2">
                    <div class="card">
                        <div class="d-flex p-2">
                            <div class="cardName col-4 px-2">{{ __('forms.practiceNumber') }}: </div>
                            <input class="col-8 border-0 border-bottom-1 border-dark" required value="{{ $doctor->practice_number }}" placeholder="{{ __('forms.practiceNumber') }}" name="practice_number" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-12 py-2">
                    <div>
                        <div class="d-flex p-2">
                            <button type="submit" class="btn-sm btn-primary border-0 mb-1 cursor-pointer">
                                {{ __('forms.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
