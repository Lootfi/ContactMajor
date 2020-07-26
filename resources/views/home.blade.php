@extends('layouts.layout')

@section('title','Contact Major')

@section('content')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=EUR">
</script>
<x-signup />
<x-login />
<div data-react-class="HomepageGuest">
    <div class="HomepageGuest__heroContainer--jwuIW">
        <div class="d-flex row" style="padding-top: 67px;">
            <div class="col-12 col-md-6 col-xl-6 col-sm-12 landing-main">
                <h1 class="landing-header mc-mx-5">
                    Today's the day
                </h1>
                <p class="mc-text-large mc-opacity--muted mc-mt-6 mc-mb-9 mc-mx-5">
                    Learn from 85+ of the world's best minds.
                </p>

                <div class="d-block d-md-none d-xl-block container mc-mb-10">
                    <div class="col-12 col-xl-auto d-flex flex-column mc-text--center">
                        <a class="c-button c-button--full-width c-button--primary c-button--medium" href=""
                            id="hero-cta" data-toggle="modal" data-target="#registerModal">Get
                            Started</a>
                    </div>
                    <div class="mc-text--bold mc-opacity--hinted col-xl-7 col-12">
                        <p class="d-none d-xl-inline ml-auto">
                            Access to all classes for $15/month (billed
                            annually)
                        </p>
                        <p class="d-block d-xl-none">
                            Access to all classes for $15/month (billed
                            annually)
                        </p>
                    </div>
                </div>



                <div class="d-none d-md-block d-xl-none mc-mb-10">
                    <div class="row">
                        <div class="col-auto col-xl-auto d-flex flex-column mc-text--center">
                            <a class="c-button c-button--full-width c-button--primary c-button--medium" href="" id="
                                hero-cta" data-toggle="modal" data-target="#registerModal">Get
                                Started</a>
                        </div>
                        <div class="mc-text--bold mc-opacity--hinted col-xl-7 col-md-7 col-lg-5">
                            <p class="d-none d-xl-inline">
                                Access to all classes for $15/month (billed
                                annually)
                            </p>
                            <p class="d-block d-xl-none">
                                Access to all classes for $15/month (billed
                                annually)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-xl-6 pl-0">
                <img class="h-100 w-100 d-inline-block" src="{{ asset('welcome-image.jpg') }}" alt="" />
            </div>
        </div>

        <!-- LABEL LOGOS GO HERE -->
        <div class="labels">
            <img src="{{ asset('label-logos/universal-music.png') }}" alt="universal-music">
            <img src="{{ asset('label-logos/warner-music.png') }}" alt="warner-music">
            <img src="{{ asset('label-logos/sony.png') }}" alt="sony">
            <img src="{{ asset('label-logos/skyrock.png') }}" alt="skyrockfm">
            <img src="{{ asset('label-logos/booska-p.png') }}" alt="booska-p">
            <img src="{{ asset('label-logos/defjam.png') }}" alt="DefJam">
        </div>


        <div class="QuoteBlock__quote--3W_rs QuoteBlock__section--3SK5s">
            <div id="quote-images" class="d-flex flex-wrap mc-p-2">
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <img class="Image__image--3x6ZI" src="{{ asset('image.jpg') }}" />
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <div class="lazyload-placeholder"></div>
                </div>
                <div class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3">
                    <div class="lazyload-placeholder"></div>
                </div>
            </div>
            <div class="QuoteBlock__quoteLayer--3XMjb d-flex align-items-center justify-content-center mc-text--center">
                <div class="QuoteBlock__quoteText--7fa3s mc-corners--rounded">
                    <h4 class="mc-text-h2 mc-text--normal">
                        Learn anytime, anywhere, at your own pace.
                    </h4>
                    <p class="mc-text-hr mc-my-5">
                        <span class="mc-opacity--muted"><svg width="2em" height="2em" viewBox="0 0 24 24" fill="none"
                                class="mc-icon">
                                <path
                                    d="M6.75 5.75a.5.5 0 01.5-.5h9.5a.5.5 0 01.5.5v12.577a.5.5 0 01-.846.36l-4.058-3.896a.5.5 0 00-.692 0l-4.058 3.896a.5.5 0 01-.846-.36V5.75z"
                                    fill="currentColor" stroke="currentColor" stroke-width="1.5"></path>
                            </svg></span>
                    </p>
                    <p class="mc-mt-4 mc-text-large">
                        <span class="mc-opacity--muted">Watch</span><span class="mc-text--bold"> thousands of
                            lessons</span><span class="mc-opacity--muted">
                            from the best as they share their stories, skills,
                            shortcuts, failures, and successes.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
    document.getElementById('step-2').style.display = "none";
</script>
@endpush

@if(session('email'))
@push('scripts')
<script>
    var e = <?php echo json_encode(['email' => session('email')]); ?>;
    var email = e.email;
    document.getElementById('hero-cta').click();
    document.getElementById('step-1').style.display = "none";
    document.getElementById('step-2').style.display = "block";

    

</script>
@endpush
@endif

@push('scripts')
<script src="{{asset('js/payment.js')}}"></script>
@endpush

@if($errors->has('email') || $errors->has('password'))
@push('scripts')
<script>
    document.getElementById("hero-cta").click();
</script>
@endpush
@endif