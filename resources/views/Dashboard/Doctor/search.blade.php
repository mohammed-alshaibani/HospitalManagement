<x-layout :user="$user">




    <!-- Start page Title Section -->
    <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>{{ __('doctor.search.findFile') }}</h1>
            </div>
        </div>
    </div>
    <!-- End page Title Section -->

    <!-- Start Login Section -->
    <div id="login-page" class="layer-stretch">
        <div class="layer-wrapper form-container">
            <form action="/search-for-file" method="POST">
                @csrf
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-search"></i>
                    <input class="mdl-textfield__input" name="search" type="text" id="search">
                    <label class="mdl-selectfield__label" for="login-search">{{ __('doctor.search.search') }}<em>
                            *</em></label>
                    <span class="mdl-selectfield__error">{{ __('doctor.search.error') }}</span>
                    @error('search')
                        <p class="color-red fs-sm text-left py-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-check form-check-inline mr-0">
                    <input class="form-check-input mx-2" type="checkbox" id="emergency" name="emergency">
                    <label class="form-check-label" for="emergency">{{ __('forms.emergency.label') }}</label>
                </div>
                <button type="submit"
                    class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary fw-bold fs-">
                    {{ __('doctor.search.request') }}
                </button>
            </form>
        </div>
    </div>
    <!-- End Login Section -->
</x-layout>
</body>
