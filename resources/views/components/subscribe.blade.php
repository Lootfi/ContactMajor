<div class="modal" tabindex="-1" role="dialog" id="subscribeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="bg-dark text-white container">
                <h1 style="font-size: 1.5em">Payer xx maintenent.</h1>
                <hr>
            </div>
            <div class="modal-body">



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

                                    <div class="input-group">
                                        <input type="text" placeholder="Votre nom dans la carte"
                                            class="form-control form-control-lg" id="card-holder-name" type="text">
                                    </div>
                                    <div style="margin: 20px 0"></div>

                                    <div id="stripe-card-element"></div>
                                    <span class="validation-error" role="alert" id="stripe-error"></span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paypal">
                                <p>Paypal is easiest way to pay online</p>
                                <p>
                                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log
                                        in my Paypal </button>
                                </p>
                                <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod
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
                                <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                        </div>

                    </div>
                </article>

            </div>
            <div class="modal-footer">
                <button type="button" id="card-button" class="btn btn-primary btn-lg">Commencer
                    l'Abonnement</button>
            </div>
        </div>
    </div>
</div>
</div>
