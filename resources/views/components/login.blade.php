<div>
    <div class="modal fade" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <x-social-signup :login="true" />
                <div class="text-muted text-center my-3">
                    <span>or</span>
                </div>
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ __('Address E-Mail') }}
                            </label>

                            <div>
                                <input id="loginemail" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ __('Mot de passe') }}</label>

                            <div>
                                <input id="loginpassword" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
            </div>
        </div> --}}

        {{-- <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
        </button>

        @if(Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Oublier votre Mot de passe?') }}
        </a>
        @endif
    </div>
</div> --}}

</div>

<div class="bg-success text-white rounded message mx-5"></div>
<div class="modal-footer">
    @if(Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Oublier votre Mot de passe?') }}
    </a>
    @endif
    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fermer</button>
    <button type="submit" class="btn btn-primary btn-lg">Login</button>
</div>
</form>
</div>
</div>
</div>

</div>