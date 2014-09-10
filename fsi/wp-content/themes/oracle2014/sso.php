<?php

/* Template Name: SSO */

require_once 'sso.class.php';

if(session_id()=='') session_start();

// redirect here for sso signing
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // Handle redirect from site for sso sign up
    if(isset($_GET['request_url'])){
        // sign in user via SSO
        $request_url = rawurldecode($_GET['request_url']);
        $sso = new SSO($request_url);
        $sso->runSSO();
    } else {
        // handle SSO response
        $sso = new SSO();
        $sso->runSSO();
    }

}



