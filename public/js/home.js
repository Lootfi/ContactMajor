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
(function(d, s, id) {
    var js,
        fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");

// window.fbAsyncInit = function() {
//     FB.init({
//         appId: "{your-app-id}",
//         cookie: true,
//         xfbml: true,
//         version: "{api-version}"
//     });

//     FB.AppEvents.logPageView();
// };

FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
