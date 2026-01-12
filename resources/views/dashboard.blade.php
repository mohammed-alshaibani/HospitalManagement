<x-layout :user="$user">
    <div class="cardBox {{app()->getLocale() == 'en'?'text-left' :'text-right'}}" >
        <div class="card">
            <div>
                <div class="numbers">{{ $patients }}</div>
                <div class="cardName">{{ __('main.patientsCount') }}</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $doctors }}</div>
                <div class="cardName">{{ __('main.doctorsCount') }}</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $doctorsUnderActive }}</div>
                <div class="cardName">{{ __('main.inactiveDoctorsCount') }}</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $activeDoctor }}</div>
                <div class="cardName">{{ __('main.activeDoctorsCount') }}</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details w-100 d-block">
        <div dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" class="recentOrders w-100 {{app()->getLocale() == 'en'?'text-left' :'text-right'}}">
            <div class="cardHeader" >
                <h2>{{ __('main.inactiveDoctorsCount') }}</h2>
                {{-- <a href="#" class="btn">عرض الكل</a> --}}
            </div>

            <table>
                <thead>
                    <tr>
                        <td>{{ __('main.doctor.email') }}</td>
                        <td>{{ __('main.doctor.name') }}</td>
                        <td>{{ __('main.doctor.practiceNumber') }}</td>
                        <td>{{ __('main.doctor.options') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($doctorsData as $doctor)
                        <tr>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->doctor->practice_number }}</td>
                            <td>
                                <form action="/doctor-active" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $doctor->doctor->id }}">
                                    <button type="submit" class="btn-sm btn-secondary border-0 ">
                                        {{ __('main.activate') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-layout>
