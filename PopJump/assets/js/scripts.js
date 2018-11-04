
/*

window.fbAsyncInit = function() {
    FB.init({
        appId      : '656502811364628', // Set YOUR APP ID
        //channelUrl : 'http://hayageek.com/examples/oauth/facebook/oauth-javascript/channel.html', // Channel File
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true,  // parse XFBML
        version    : 'v2.12',
        oauth      : true
    });

    FB.Event.subscribe('auth.authResponseChange', function(response)
    {
        if (response.status === 'connected')
        {
            //SUCCESS
            FB.api('/me', { locale: 'en_EN', fields: 'name,email,verified,id,link' },
                function(response) {
                    console.log('FB',response);

                    document.getElementById('soc_name').value= response.name;
                    document.getElementById('soc_email').value= response.email;
                    document.getElementById('soc_id').value= response.id;
                    document.getElementById('soc_link').value= response.link;
                    document.getElementById('soc_verified').value= response.verified;
                    document.getElementById('soc_avatar').value= 'https://graph.facebook.com/'+response.id+'/picture?type=normal';
                    document.getElementById('network_name').value= 'Facebook';
                    document.getElementById('network_form').style.display = "block";
                    document.getElementById('other_network').style.display = "block";

                }
            );

        }
        else if (response.status === 'not_authorized')
        {
            console.log("Failed to Connect");

            //FAILED
        } else
        {
            console.log("Logged Out");

            //UNKNOWN ERROR
        }
    });

};



(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

*/



// user avatar: https://graph.facebook.com/***ID***/picture?type=normal
