<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        {{-- Styles --}}
        
        
        @section('stylsheets')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        <link rel="stylesheet" href="{{asset('css/modal.css')}}">
        <link
          rel="stylesheet"
          media="screen"
          href="{{ asset('css/homepage-guest-a64009b0469f4b10acc3.css')}}"
        />
        <link
          rel="stylesheet"
          media="screen"
          href="{{ asset('css/navigation-logged-out-d62e82ca93adb946e71d.css')}}"
        />
        <link
          rel="stylesheet"
          media="screen"
          href="{{ asset('css/rebrand_color-9798a1049b0d1bdaed8ea422a78f405f28d0b020ba0d492cd154abda574182e4.css')}}"
        />
        @show
        
        <script src="{{asset('js/home.js')}}"></script>
        
        <meta
          content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"
          name="viewport"
        />

        {{-- STRIPE --}}

        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe('stripe-public-key');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');
        </script>

        {{-- // STRIPE // --}}

    </head>



    <body class="navbar-v2 mc-page" id="">

      <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Getting Started</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="regForm" action="">

                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" id="email" class="form-control" placeholder="Email">
                  </div>
                
                  <article class="card">
                    <div class="card-body p-5">
                    
                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#stripe">
                        <i class="fa fa-credit-card"></i>Stripe</a></li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="paypal">
                        <i class="fab fa-paypal"></i>Paypal</a>
                      </li>
                    </ul>
                    
                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="stripe">
                      {{-- <div class="form-group">
                        <label for="cardNumber">Card number</label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="cardNumber" placeholder="">
                          <div class="input-group-append">
                            <span class="input-group-text text-muted">
                              <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
                              <i class="fab fa-cc-mastercard"></i> 
                            </span>
                          </div>
                        </div>
                      </div> --}}
                      <div class="form-group">
                        <label for="card-holder-name"></label>
                        <input id="card-holder-name" type="text">
                      </div>
                    
                      {{-- Stripe Elements Placeholder --}}
                      <div id="card-element"></div>

                      <div class="row">
                          <div class="col-sm-8">
                              <div class="form-group">
                                  <label><span class="hidden-xs">Expiration</span> </label>
                                <div class="input-group">
                                  <input type="number" class="form-control" placeholder="MM" name="">
                                    <input type="number" class="form-control" placeholder="YY" name="">
                                </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="form-group">
                                  <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                  <input type="number" class="form-control" required="">
                              </div> <!-- form-group.// -->
                          </div>
                      </div> <!-- row.// -->
                      <button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
                    </div> <!-- tab-pane.// -->
                    <div class="tab-pane fade" id="paypal">
                    <p>Paypal is easiest way to pay online</p>
                    <p>
                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                    </p>
                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-bank">
                    <p>Bank accaunt details</p>
                    <dl class="param">
                      <dt>BANK: </dt>
                      <dd> THE WORLD BANK</dd>
                    </dl>
                    <dl class="param">
                      <dt>Accaunt number: </dt>
                      <dd> 12345678912345</dd>
                    </dl>
                    <dl class="param">
                      <dt>IBAN: </dt>
                      <dd> 123456789</dd>
                    </dl>
                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div> <!-- tab-pane.// -->
                    </div> <!-- tab-content .// -->
                    
                    </div> <!-- card-body.// -->
                    </article> <!-- card.// -->
                    
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      {{-- <div class="modal" id="paymentModal">
        <div class="modal-content">

          <div class="modal-header">
            <h1>Your Contacts are waiting</h1>
            <p>Create an account to get started.</p>
            <p>You're only one more step away.</p>
          </div>




            {{-- <img src="{{asset('credit-card.png')}}" alt="">
            <input type="email" name="email" id="clientEmail" placeholder="Card Number">
            <div id="card-info">
                <input type="number" name="month" id="endMonth" placeholder="MM" >
                <input type="number" name="year" id="endYear" placeholder="YY">
                <input type="number" name="cvc" id="cvc" placeholder="CVC">
            </div> --}}
        </div>
    </div> --}}

        <div
          style="
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
          "
        >
          <p>
            To submit requests for assistance, or provide feedback regarding
            accessibility, please contact
            <a href="mailto:support@masterclass.com">support@masterclass.com</a>.
          </p>
        </div>
        <div class="hide-when-cart-active">

          <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a href="/" class="navbar-brand logo"
                      ><img
                        src="{{asset('logo.png')}}"
                        id="cm-logo"
                        alt="cm-logo"
                  />
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <span class="font-weight-bold mc-text-small mc-text--uppercase mc-mr-1 mc-ml-5" style="cursor: pointer;">BROWSE</span>
                </li>
              </ul>
              <div class="my-2 my-lg-0">
                <span class=" font-weight-bold mc-text-small mc-text--uppercase mc-mr-1 mc-ml-5" style="cursor: pointer;">LOGIN</span>
              </div>
            </div>
          </nav>


          {{-- <div class="mc-page__header">
            <div data-react-class="NavigationLoggedOut" data-react-props="{}">
              <div class="header-with-ctas mc-text--center condensed">
                <div
                  class="container d-flex justify-content-between align-items-center"
                >
                  <div class="d-flex align-items-center">
                    <div class="d-flex d-md-none align-items-center mc-my-3">
                      <div>
                        <div
                          class="mobile-nav-button-v2 mobile-nav-button-v2--left"
                        >
                          <img
                            src="./webpack/_/hamburguer-icon-4a698ff512f694b96c4848a70a89695b.svg"
                          />
                        </div>
                        <div class="navigation__user">
                          <ul class="nav-menu">
                            <li class="nav-menu__item">
                              <a
                                class="nav-menu__link"
                                href="#purchase?product_id=62"
                                >Get Started</a
                              >
                            </li>
                            <li class="nav-menu__item nav-menu__item--mobile">
                              <a
                                class="nav-menu__link"
                                href="#cart?product_id=62&amp;gift=true&amp;origin_redirect=true"
                                >Gift MasterClass</a
                              >
                            </li>
                            <li class="nav-menu__item">
                              <a
                                class="nav-menu__link"
                                href="https://masterclasshelp.zendesk.com/hc/en-us"
                                >Support</a
                              >
                            </li>
                            <li class="nav-menu__item authentication-modal-trigger">
                              <a class="nav-menu__link" href="#">Log In</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <a href="/" class="logo mc-ml-1"
                      ><img
                        src="{{asset('logo.png')}}"
                        id="cm-logo"
                        alt="cm-logo"
                    /></a>
                    <div class="d-none d-md-flex align-items-center"></div>
                  </div>
                  <div>
                    <div class="d-none d-md-inline-flex mc-my-4">
                      <div id="mc-user-login" class="mc-ml-4">
                        <a
                          class="mc-header__login-link authentication-modal-trigger"
                          data-ba="login-button"
                          >LOG IN</a
                        >
                      </div>
                    </div>
                  </div>
                  <span class="search"
                    ><span
                      class="mc-text--bold mc-text-x-small mc-text--uppercase mc-mr-1 mc-ml-5"
                      >browse</span
                    ><svg
                      width="2em"
                      height="2em"
                      viewBox="0 0 24 24"
                      fill="none"
                      class="mc-icon--2"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M5.47 8.845a.75.75 0 011.06 0l5.47 5.47 5.47-5.47a.75.75 0 111.06 1.06l-6 6a.75.75 0 01-1.06 0l-6-6a.75.75 0 010-1.06z"
                        fill="currentColor"
                      ></path></svg></span>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="mc-page__content">
            <div data-react-class="HomepageGuest">
              <div class="HomepageGuest__heroContainer--jwuIW">
                <div class="mc-background--color-dark">
                  <div id="hero" class="Hero__hero--x66zy">
                    <div class="row d-flex mc-pt-11 Hero__heroContainer--XEUf4">
                        <div class="container">

                          <div class="row justify-content-around">
                            <div class="col-12 col-md-6 col-xl-6 col-sm-7 landing-main">
                              <h1 class="landing-header">
                                Today's the day
                              </h1>
                              <p
                                class="mc-text-large mc-opacity--muted mc-mt-6 mc-mb-9"
                              >
                                Learn from 85+ of the world's best minds.
                              </p>

                              <div class="d-block d-md-none d-xl-block container mc-mb-10">
                            <div
                              class="col-12 col-xl-auto d-flex flex-column mc-text--center"
                            >
                              <a
                                class="c-button c-button--full-width c-button--primary c-button--medium"
                                href="#cart?product_id=62"
                                id="hero-cta"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                onclick="openPaymentModal()"
                                >Get Started</a
                              >
                            </div>
                            <div
                              class="mc-text--bold mc-opacity--hinted col-xl-7 col-12 mc-mt-4 mc-text--center"
                            >
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



                              <div class="d-none d-md-block d-xl-none mc-mb-10">
                                <div class="row">
                                  <div
                                    class="col-auto col-xl-auto d-flex flex-column mc-text--center"
                                  >
                                    <a
                                      class="c-button c-button--full-width c-button--primary c-button--medium"
                                      href="#cart?product_id=62"
                                      id="hero-cta"
                                      data-toggle="modal"
                                      onclick="openPaymentModal()"
                                      data-target="#exampleModal"
                                      >Get Started</a
                                    >
                                  </div>
                                  <div
                                    class="mc-text--bold mc-opacity--hinted col-xl-7 col-md-7 col-lg-5"
                                  >
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

                            <div class="col-sm-12 col-md-12 col-xl-6">
                              <img src="{{asset('image.jpg')}}" alt="" />
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                        {{-- <div
                          class="d-block d-md-none d-xl-block container mc-mb-10"
                        >
                          <div class="row mc-mt-4 mc-text--center">
                            <div
                              class="col-12 col-xl-auto d-flex flex-column mc-text--center"
                            >
                              <a
                                class="c-button c-button--full-width c-button--primary c-button--medium"
                                href="#cart?product_id=62"
                                id="hero-cta"
                                >Get Started</a
                              >
                            </div>
                            <div
                              class="mc-text--bold mc-opacity--hinted col-xl-7 col-12 mc-mt-4 mc-text--center"
                            >
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
                        </div> --}}
                </div>
    
                <!-- LABEL LOGOS GO HERE -->

                <div class="labels">
                  <img src="{{asset('label-logos/universal-music.png')}}" alt="universal-music">
                  <img src="{{asset('label-logos/warner-music.png')}}" alt="warner-music">
                  <img src="{{asset('label-logos/sony.png')}}" alt="sony">
                  <img src="{{asset('label-logos/skyrock.svg')}}" alt="skyrockfm">
                  <img src="{{asset('label-logos/booska-p.png')}}" alt="booska-p">
                  <img src="{{asset('label-logos/defjam.png')}}" alt="DefJam">
                </div>
    
                <div class="QuoteBlock__quote--3W_rs QuoteBlock__section--3SK5s">
                  <div id="quote-images" class="d-flex flex-wrap mc-p-2">
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <img
                        class="Image__image--3x6ZI"
                        src="{{asset('image.jpg')}}"
                      />
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <div class="lazyload-placeholder"></div>
                    </div>
                    <div
                      class="Image__wrapper--RKcxa QuoteBlock__quoteInstructor--ayDym mc-corners--rounded mc-tile--2x3"
                    >
                      <div class="lazyload-placeholder"></div>
                    </div>
                  </div>
                  <div
                    class="QuoteBlock__quoteLayer--3XMjb d-flex align-items-center justify-content-center mc-text--center"
                  >
                    <div class="QuoteBlock__quoteText--7fa3s mc-corners--rounded">
                      <h4 class="mc-text-h2 mc-text--normal">
                        Learn anytime, anywhere, at your own pace.
                      </h4>
                      <p class="mc-text-hr mc-my-5">
                        <span class="mc-opacity--muted"
                          ><svg
                            width="2em"
                            height="2em"
                            viewBox="0 0 24 24"
                            fill="none"
                            class="mc-icon"
                          >
                            <path
                              d="M6.75 5.75a.5.5 0 01.5-.5h9.5a.5.5 0 01.5.5v12.577a.5.5 0 01-.846.36l-4.058-3.896a.5.5 0 00-.692 0l-4.058 3.896a.5.5 0 01-.846-.36V5.75z"
                              fill="currentColor"
                              stroke="currentColor"
                              stroke-width="1.5"
                            ></path></svg></span>
                      </p>
                      <p class="mc-mt-4 mc-text-large">
                        <span class="mc-opacity--muted">Watch</span
                        ><span class="mc-text--bold"> thousands of lessons</span
                        ><span class="mc-opacity--muted">
                          from the best as they share their stories, skills,
                          shortcuts, failures, and successes.</span
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script>
          $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          })
        </script>
      </body>
</html>
