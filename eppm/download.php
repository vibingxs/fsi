<?php
    require_once 'config.php';
    require_once 'sso.php';

    function forceDownload($original, $ghost) {
        if (is_readable($original)) {
            if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

            $ghost = (empty($ghost)) ? basename($original) : $ghost;

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($original);

            header('Pragma: public');     // required
            header('Expires: 0');         // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($original)) . ' GMT');
            header('Cache-Control: private',false);
            header('Content-Type: ' . $mime);  // Add the mime type from CodeIgniter.
            header('Content-Disposition: attachment; filename="' . basename($ghost) . '"');  // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($original)); // provide file size
            header('Connection: close');
            readfile($original); // push it out
            exit();
        } else {
            die('Requested file not found!');
        }
    }

    function displayPDF($file, $filename){
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');
        @readfile($file);
    }

    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if (!$userId) {
        $returnUrl = $hostUrl . SUBFOLDER.'?action=download';
        SSO::doLogin($returnUrl);
        exit;
    }

    $filename = 'The_Changing_Face_of_EPPM.pdf';

    SSO::notify('WWPP13043568MPP105C001', $userId, 'download', $filename);

    $_SESSION['loaded'] = 1; // fixes back button in the browser
//    forceDownload('pdf/ORA_US-EPPM-Board_Writeup_April13_13-10582_v10.pdf', $filename);
    displayPDF('pdf/ORA_US-EPPM-Board_Writeup_April13_13-10582_v10.pdf', $filename);

?>