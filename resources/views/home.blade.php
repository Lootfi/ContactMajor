@extends('layouts.layout')

@section('title','Contact Major')

@push('script')
    <script src="{{asset('/js/home.js')}}"></script>
@endpush

@section('content')

<div class="welcome">
    
    
    <div class="payment">
        <div id="payment-text">
            <h1>contacts fiables dans l'idustrie</h1>
        </div>
        <div id="payment-button">
            <button id="payer" onclick="openPaymentModal()">PAYER</button>
        </div>
    </div>

</div>

<div class="modal" id="paymentModal">
    <div class="modal-content">
        <span class="close cursor" onclick="closePaymentModal()">&times;</span>
        <img src="{{asset('credit-card.png')}}" alt="">
        <input type="email" name="email" id="clientEmail" placeholder="Card Number">
        <div id="card-info">
            <input type="number" name="month" id="endMonth" placeholder="MM" >
            <input type="number" name="year" id="endYear" placeholder="YY">
            <input type="number" name="cvc" id="cvc" placeholder="CVC">
        </div>
    </div>
</div>
@endsection

    {{-- <div id="paymentModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <div class="checkout_form">
            <div class="card_number" id="card-container">
                <input type="text" class="input" id="card" placeholder="0000 0000 0000 0000"> 
                <div id="card-logo"></div>
            </div>
            <div class="card_grp">   
              <div class="expiry_date">
                <input type="text" class="expiry_input" data-mask="00"  placeholder="00">
                <input type="text" class="expiry_input" data-mask="00" placeholder="00">
              </div>
              <div class="cvc">
                <input type="text" class="cvc_input" data-mask="000" placeholder="000">
                <div class="cvc_img">
                    ?
                   <div class="img">
                     <img src="https://i.imgur.com/2ameC0C.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="btn" >
              payer
            </div>
            </div>
        </div>
    </div> --}}
    
@section('footer')
<img src="{{asset('label-logos/universal-music.png')}}" alt="universal-music">
<img src="{{asset('label-logos/warner-music.png')}}" alt="warner-music">
<img src="{{asset('label-logos/sony.png')}}" alt="sony">
<img src="{{asset('label-logos/skyrock.svg')}}" alt="skyrockfm">
<img src="{{asset('label-logos/booska-p.png')}}" alt="booska-p">
<img src="{{asset('label-logos/defjam.png')}}" alt="DefJam">
    
@endsection

