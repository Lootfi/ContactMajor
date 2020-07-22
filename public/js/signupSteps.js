let stepContent = $(".step-content"),
    continueEmail = document.getElementById("email-button");

$("#step-2").hide();

continueEmail.addEventListener("click", function(e) {
    e.preventDefault();

    signup();
});

function signup() {
    Object.values(document.getElementsByClassName("invalid-feedback")).forEach(
        elem => {
            elem.style.display = "block";
            elem.children[0].innerText = "";
        }
    );
    $("#regForm input").removeClass("is-invalid");

    let formData = $("#regForm").serializeArray();
    let data = {};
    formData.forEach(field => {
        data[field.name] = field.value;
    });

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
                console.log("registration success, payment still not made");

                $("#step-1").hide();
                $("#step-2").show();
            } else {
            }
        })
        .catch(err => console.log("error", err));
}
