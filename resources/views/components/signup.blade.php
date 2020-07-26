<div class="modal fade" tabindex="-1" role="dialog" id="registerModal">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Getting Started</h5>
                <button id="closeRegModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container">
                <div class="panel panel-primary setup-content" id="step-1">
                    <x-social-signup :login="false" />
                    <div class="text-muted text-center my-3">
                        <span>or</span>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-2">
                <div class="card-body p-5">

                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#stripe">
                                <i class="fab fa-cc-stripe"></i> Stripe</a></li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#paypal">
                                <i class="fab fa-paypal"></i> Paypal</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="stripe">

                            <div style="padding-top: 20px">
                                <div style="margin: 15px 0"></div>
                                <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">
                                    Credit Card Info
                                </label>
                                <div id="stripe-card-element"></div>
                                <span class="validation-error" role="alert" id="stripe-error"></span>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary btn-lg"
                                            data-dismiss="modal">Fermer</button>
                                        <button type="submit" id="card-button"
                                            class="btn btn-primary btn-lg">Continuer</button> --}}
                                <button class="btn btn-block btn-lg btn-danger" id="card-button" type="submit"
                                    data-secret="{{ session('intent') }}">Continuer</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="paypal">
                            <div style="padding-top: 20px">
                                <div id="paypal-button-container"></div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary btn-lg"
                                            data-dismiss="modal">Fermer</button>
                                        <button type="button" onclick="payWithPayPal()" id="paypal-button"
                                            class="btn btn-primary btn-lg">Continuer avec PayPal</button> --}}
                                <button type="button" onclick="payWithPayPal()" class="btn btn-block btn-lg btn-danger"
                                    id="paypal-button">Continuer</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="card-button" class="btn btn-primary btn-lg">Continue</button>
                </div> --}}
        {{-- END TAB 01 --}}

    </div>
</div>
</div>

@push('scripts')


<script src="https://js.stripe.com/v3/"></script>
<script>
    // This function displays Stripe payment
        const stripe = Stripe('{{ env("STRIPE_KEY") }}');
        const elements = stripe.elements();
        const cardElement = elements.create("card");

        cardElement.mount("#stripe-card-element");

</script>
<script src="{{asset('js/signupSteps.js')}}"></script>

@endpush