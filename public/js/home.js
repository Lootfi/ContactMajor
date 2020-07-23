// $(document).ready(function() {
//     $.ajaxSetup({ cache: true });
//     $.getScript("https://connect.facebook.net/en_US/sdk.js", function() {
//         FB.init({
//             appId: "{1772585316217652}",
//             version: "v2.7" // or v2.1, v2.2, v2.3, ...
//         });
//         $("#loginbutton,#feedbutton").removeAttr("disabled");
//         FB.getLoginStatus(res => console.log("RES", res));
//     });
// });

// let search = new URLSearchParams(window.location.search);

// if (search.has("code") && search.has("state")) {
//     socialLogin();
// }

// function socialLogin() {
//     axios
//         .get("/api/social/login", {
//             code: search.get("code"),
//             state: search.get("state")
//         })
//         .then(res => console.log(res.data))
//         .catch(err => console.log(err.response.data));
// }
