<?php

define('SSO_SERVER', 'https://www.oracle-sso.com');
define('SSO_APPLICATION', 5);
define('SSO_SECURE_PREFIX','4duTzcPmxKJ9ircX');
define('SSO_ENCRYPTION_KEY','0Fk7sQTTvdHKZtVE');
define('SSO_ENCRYPTION_IV','InnqrMZHDI2OBpQb');
define('SSO_CHECK_RESPONSE','rUhJ7DUyZ1eKwv1P');
define('SSO_STAGING', FALSE);

define('CAMPAIGN_CODE','FSI');
define('CAMPAIGN_NAME', 'Oracle FSI');

define('URL','http://oracle-eppm.com/fsi/sso/');

class SSO {

    public function __construct($request_url=FALSE){
        if(session_id()=='') session_start();

        // stick request_url in the session to redirect user after sso request completed
        if($request_url){
            $_SESSION['request_url'] = $request_url;
        }

    }

    public function notifySSO($userId, $activity, $details = null, $campaignCode = CAMPAIGN_CODE) {
        $data = array('application_id' => SSO_APPLICATION, 'campaign_code' => $campaignCode, 'guid' => $userId, 'activity' => $activity, 'details' => $details);
        $strData = http_build_query($data);
        $options = array(CURLOPT_POST => count($data), CURLOPT_POSTFIELDS => $strData, CURLOPT_HEADER => FALSE, CURLOPT_RETURNTRANSFER => TRUE);

        // Make sure we set the right flags for the SSL version
        if (strpos(SSO_SERVER, 'https:') !== FALSE) {
            $options[CURLOPT_SSL_VERIFYPEER] = FALSE;
            $options[CURLOPT_SSL_VERIFYHOST] = FALSE;
        }

        $ch = curl_init(SSO_SERVER . '/user-activity');
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }

    public function runSSO() {

        // visit is recorded automatically when going through SSO
        if (isset($_GET['UserDataSP'])) {
            $userData = $_GET['UserDataSP'];
            $userData = openssl_decrypt(base64_decode($userData), "AES-256-CBC", hash('sha256', SSO_ENCRYPTION_KEY), 0, substr(hash('sha256', SSO_ENCRYPTION_IV), 0, 16));
            $userData = unserialize($userData);

            //At this point, we should verify the check_response matches, to ensure the data is from a valid source
            if (isset($userData['check_response']) && $userData['check_response'] == SSO_CHECK_RESPONSE) {
                //The user data is valid, and from a trusted source, let's do something with it
                $_SESSION['uid'] = $userData['oracle_guid'];
                header('Location: '.$_SESSION['request_url']);

            } else {
                //The check_response didn't match, data can't be trusted
                echo 'Non-trusted user data response';
            }
        } else {
            $return_url  = URL; //This is the URL we send users back to once they have completed the Oracle register/login process. Normally matches current URL.
            $signed_url  = md5(SSO_SECURE_PREFIX . $return_url);
            $request_url = SSO_SERVER . '/get-user?application_id=' . SSO_APPLICATION . '&return_url=' . urlencode($return_url) . '&signed_url=' . $signed_url;
            if (SSO_STAGING)
                $request_url = $request_url . '&environment=staging';
            header("Refresh:0;url=".$request_url);
        }

        return;
    }

}