const cardHolderName = document.getElementById("name");
const cardButton = document.getElementById("card-button");
const cardError = document.getElementById("stripe-error");
var form = document.getElementById("regForm");

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

function makePayPalOrder(email) {
    paypal
        .Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.

                let order = actions.order.create({
                    purchase_units: [
                        {
                            custom_id: email,
                            amount: {
                                value: "100",
                                currency_code: "EUR"
                            }
                        }
                    ]
                });
                return order;
            },
            onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    axios
                        .post("/api/payment-confirmed", {
                            email: details.purchase_units[0].custom_id
                        })
                        .then(res => console.log("PAYMENT CONFIRM RES", res))
                        .catch(err =>
                            console.log("PAYMENT CONFIRM ERROR", err)
                        );
                    alert(
                        "Transaction completed by " +
                            details.payer.name.given_name
                    );

                    document.getElementById("closeRegModal").click();
                    document.getElementById(
                        "loginemail"
                    ).value = document.getElementById("email").value;
                    document.getElementById(
                        "loginpassword"
                    ).value = document.getElementById("password").value;
                    // document.getElementById("loginButton").click();
                    document.getElementById("loginForm").submit();
                });
            },
            style: {
                color: "blue"
            }
        })
        .render("#paypal-button-container");
}

function payWithPayPal() {
    makePayPalOrder(data.email);
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "payment_method");
    hiddenInput.setAttribute("value", "paypal");
}

form.addEventListener("submit", async function(e) {
    e.preventDefault();
    Object.values(document.getElementsByClassName("invalid-feedback")).forEach(
        elem => {
            elem.style.display = "block";
            elem.children[0].innerText = "";
        }
    );
    $("#regForm input").removeClass("is-invalid");

    const { paymentMethod, error } = await stripe.createPaymentMethod(
        "card",
        cardElement,
        {
            billing_details: {
                name: cardHolderName.value
            }
        }
    );

    if (error) {
        cardError.innerText = error.message;
    } else {
        // The card has been verified successfully...
        var hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "payment_method");
        hiddenInput.setAttribute("value", paymentMethod.id);
        form.appendChild(hiddenInput);
        let formData = $("#regForm").serializeArray();
        let data = {};
        formData.forEach(field => {
            data[field.name] = field.value;
        });
        console.log("data", data);

        axios
            .post("/api/register", data)
            .then(response => {
                console.log("response", response);
                if (response.data.errors) {
                    let errors = response.data.errors;
                    Object.values(
                        document.getElementsByClassName("invalid-feedback")
                    ).forEach(elem => {
                        elem.style.display = "block";
                        elem.children[0].style.display = "block";
                    });
                    Object.keys(errors).forEach(function(key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error")
                            .children("strong")
                            .text(errors[key][0]);
                    });
                } else if (response.data.success) {
                    console.log("payment success");
                    document.getElementById("closeRegModal").click();
                    document.getElementById(
                        "loginemail"
                    ).value = document.getElementById("email").value;
                    document.getElementById(
                        "loginpassword"
                    ).value = document.getElementById("password").value;
                    // document.getElementById("loginButton").click();
                    document.getElementById("loginForm").submit();
                } else {
                }
                // window.location.reload();
            })
            .catch(err => console.log("error", err));
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
