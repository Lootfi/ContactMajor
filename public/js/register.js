function clearValidationErrors() {
    let validationErrors = document.getElementsByClassName("validation-error");
    Object.values(validationErrors).map(e => {
        e.innerText = "";
    });
}

function showValidationErrors(errors) {
    for (const [field, error] of Object.entries(errors)) {
        let fieldError = document.getElementById(`${field}-error`);
        fieldError.style.color = "red";
        fieldError.innerText = error[0];
    }
}

// $("#regForm").submit(function(event) {
//     event.preventDefault();
//     let array = $(this).serializeArray();
//     let data = {};
//     array.map(field => {
//         data[field.name] = field.value;
//     });
//     axios
//         .post("/api/register", data)
//         .then(res => {
//             clearValidationErrors();
//             if (res.data.hasOwnProperty("errors"))
//                 showValidationErrors(res.data.errors);
//             else {
//                 //show next tab, entering card info
//                 console.log("registered");
//                 // let cardButton = document.getElementById("card-button");
//                 // cardButton.setAttribute(
//                 //     "data-secret",
//                 //     res.data.intent.client_secret
//                 // );
//                 // nextPrev(1);

//                 document.getElementsByClassName("close")[0].click();
//                 document.getElementById("loginButton").click();
//                 document.getElementsByClassName("message")[0].innerText =
//                     "Inscription réussie, connectez-vous à votre compte.";
//             }
//         })
//         .catch(err => console.log(err));
// });
