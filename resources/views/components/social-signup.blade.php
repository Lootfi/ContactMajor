<div>
    <div class="social-signup facebook-signup">
        <form action="{{ route('facebook-signup') }}" method="GET">
            <button type="submit"
                class="rounded d-flex justify-content-around align-items-center text-white text-uppercase font-weight-bolder py-2 mt-4">
                <img src="{{asset('facebook.svg')}}" alt="Facebook" style="width: 1.8em">
                @if ($login == "true")
                <span>Sign in with Facebook</span>
                @else
                <span>Sign up with Facebook</span>
                @endif
            </button>
        </form>
    </div>
    <div class="social-signup google-signup">
        <form action="{{ route('google-signup') }}" method="GET">
            <button type="submit"
                class="rounded d-flex justify-content-around align-items-center text-white text-uppercase font-weight-bolder py-2 mx-auto mt-4">
                <img src="{{asset('google.png')}}" alt="Google" style="width: 1.6em">
                @if ($login == "true")
                <span>Sign in with Facebook</span>
                @else
                <span>Sign up with Facebook</span>
                @endif
            </button>
        </form>
    </div>
</div>