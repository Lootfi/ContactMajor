const cardHolderName = document.getElementById("name");
const cardButton = document.getElementById("card-button");
const cardError = document.getElementById("stripe-error");

//form is empty; button disabled
cardButton.disabled = true;

const clientSecret = cardButton.dataset.secret;

let validCard = false;

cardElement.addEventListener("change", function(event) {
    //card disabled if form is empty;
    cardButton.disabled = event.empty;

    cardError.innerText = event.error ? event.error.message : "";

    if (event.error) {
        validCard = false;
        cardError.innerText = event.error.message;
    } else {
        validCard = true;
        cardError.innerText = "";
    }
});

cardButton.addEventListener("click", async function(event) {
    event.preventDefault();
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        "card",
        cardElement
    );

    if (error) {
        cardError.innerText = error.message;
    } else {
        // The card has been verified successfully...
        axios
            .post("/confirm-stripe-payment", {
                email,
                payment_method: paymentMethod.id
            })
            .then(response => {
                if (response.data.error) {
                    cardError.innerText = response.data.error.message;
                } else {
                    window.location.reload();
                }
            })
            .catch(err => console.log("error", err.response.data));
    }
});

// HELPERS

var payWithCard = function(stripe, card) {
    stripe
        .confirmCardPayment(clientSecret, {
            payment_method: {
                card: card
            }
        })
        .then(function(result) {
            if (result.error) {
                // Show error to your customer
                showError(result.error.message);
            } else {
                // The payment succeeded!
                orderComplete(result.paymentIntent.id);
            }
        });
};

var orderComplete = function(paymentIntentId) {
    document
        .querySelector(".result-message a")
        .setAttribute(
            "href",
            "https://dashboard.stripe.com/test/payments/" + paymentIntentId
        );
    document.querySelector(".result-message").classList.remove("hidden");
    document.querySelector("button").disabled = true;
};

var showError = function(errorMsgText) {
    var errorMsg = document.querySelector("#card-error");
    errorMsg.textContent = errorMsgText;
    setTimeout(function() {
        errorMsg.textContent = "";
    }, 4000);
};

/*
 *
 *       PAYPAL
 */

paypal
    .Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.

            return actions.order.create({
                purchase_units: [
                    {
                        amount: {
                            value: "100",
                            currency_code: "EUR"
                        }
                    }
                ]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                axios
                    .post("/confirm-paypal-payment", {
                        email,
                        payment_method: details.id
                    })
                    .then(res => {
                        console.log("PAYMENT CONFIRM RES", res.data);
                        window.location.reload();
                    })
                    .catch(err =>
                        console.log("PAYMENT CONFIRM ERROR", err.response.data)
                    );
            });
        },
        style: {
            color: "blue"
        }
    })
    .render("#paypal-button-container");
