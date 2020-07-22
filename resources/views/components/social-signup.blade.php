<div>
    <div class="social-signup facebook-signup">
        <form action="{{ route('facebook-signup') }}" method="POST">
            <button type="button"
                class="rounded d-flex justify-content-around align-items-center text-white text-uppercase font-weight-bolder py-2 mt-4">
                <img src="{{asset('facebook.svg')}}" alt="Facebook" style="width: 1.8em">
                <span>Sign up with Facebook</span>
            </button>
        </form>
    </div>
    <div class="social-signup google-signup">
        <form action="{{ route('google-signup') }}" method="POST">
            <button type="button"
                class="rounded d-flex justify-content-around align-items-center text-white text-uppercase font-weight-bolder py-2 mx-auto mt-4">
                <img src="{{asset('google.png')}}" alt="Google" style="width: 1.6em">
                <span>
                    Sign up with Google
                </span>
            </button>
        </form>
    </div>
</div>