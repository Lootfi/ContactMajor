<div class="modal" tabindex="-1" role="dialog" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Getting Started</h5>
                <button id="closeRegModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(session('error_message'))
            <div role="alert" class="mb-4">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Payment Failed
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ session('error_message') }}</p>
                </div>
            </div>
            @endif
            <x-social-signup :login="false" />
            <div class="text-muted text-center my-3">
                <span>or</span>
            </div>
            <div class="container">
                <form id="regForm" method="POST">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('Nom dans la carte') }}</label>

                            <div class="input-group input-group-lg">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="name" value="lotfi" autofocus>
                                <span class="invalid-feedback" role="alert" id="nameError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ __('E-Mail') }}</label>

                            <div class="input-group input-group-lg">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="email" value="lotfi@m.c">

                                <span class="invalid-feedback" role="alert" id="emailError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="input-group input-group-lg">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" value="123456789">

                                <span class="invalid-feedback" role="alert" id="passwordError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"
                                class="text-md-right">{{ __('Confirmation Mot de passe') }}</label>

                            <div class="input-group input-group-lg">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" value="123456789">
                            </div>
                        </div>

                        <article class="card">
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
                                            <label for="card-element"
                                                class="block text-gray-700 text-sm font-bold mb-2">
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
                                            <button class="btn btn-block btn-lg btn-danger" id="card-button"
                                                type="submit">Continuer</button>
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
                                            <button type="button" onclick="payWithPayPal()"
                                                class="btn btn-block btn-lg btn-danger"
                                                id="paypal-button">Continuer</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </article>

                    </div>
                    {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="card-button" class="btn btn-primary btn-lg">Continue</button>
                </div> --}}
                </form>
            </div>
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
<script src="{{ asset('js/stripePayment.js') }}"></script>

@endpush