<?php

    class SSO {

        const SSO_SERVER         = 'https://www.oracle-sso.com';
        const SSO_APPLICATION    = 3;
        const SSO_SECURE_PREFIX  = 'P1KUyhuPbSi4uX90';
        const SSO_ENCRYPTION_KEY = 'VAAOcCadFle9t4aW';
        const SSO_ENCRYPTION_IV  = '5AX3PGlyAkh5pTzE';
        const SSO_CHECK_RESPONSE = '3UQov3RAtF16Xqbs';
        const SSO_STAGING        = FALSE;

        public static function doLogin($returnUrl) {
            $signedUrl  = md5(self::SSO_SECURE_PREFIX . $returnUrl);

            $data = array(
                'application_id' => self::SSO_APPLICATION,
                'return_url'     => urlencode($returnUrl),
                'signed_url'     => $signedUrl
            );

            if (self::SSO_STAGING)
                $data['environment'] = 'staging';

            $requestUrl = self::SSO_SERVER . '/get-user?' . http_build_query($data);

            header('Location: ' . $requestUrl);
        }

        public static function checkResponse() {
            $result = false;

            if (isset($_GET['UserDataSP'])) {
                $userData = $_GET['UserDataSP'];
                $userData = openssl_decrypt(base64_decode($userData), "AES-256-CBC", hash('sha256', self::SSO_ENCRYPTION_KEY), 0, substr(hash('sha256', self::SSO_ENCRYPTION_IV), 0, 16));
                $userData = unserialize($userData);

                // At this point, we should verify the check_response matches, to ensure the data is from a valid source
                if (isset($userData['check_response']) && $userData['check_response'] == self::SSO_CHECK_RESPONSE) {
                    // The user data is valid, and from a trusted source, let's do something with it
                    $result = $userData;
                } else {
                    // The check_response didn't match, data can't be trusted
                    die('Non-trusted user data response');
                }
            }

            return $result;
        }

        public static function notify($campaignCode, $userId, $activity, $details = null) {
            $data = array(
                'application_id' => self::SSO_APPLICATION,
                'campaign_code'  => $campaignCode,
                'guid'           => $userId,
                'activity'       => $activity,
                'details'        => $details
            );

            $strData = http_build_query($data);

            $options = array(
                CURLOPT_POST           => count($data),
                CURLOPT_POSTFIELDS     => $strData,
                CURLOPT_HEADER         => FALSE,
                CURLOPT_RETURNTRANSFER => TRUE
            );

            // Make sure we set the right flags for the SSL version
            if (strpos(self::SSO_SERVER, 'https:') !== FALSE) {
                $options[CURLOPT_SSL_VERIFYPEER] = FALSE;
                $options[CURLOPT_SSL_VERIFYHOST] = FALSE;
            }

            $ch = curl_init(self::SSO_SERVER . '/user-activity');
            curl_setopt_array($ch, $options);

            curl_exec($ch);

            curl_close($ch);
        }
    }