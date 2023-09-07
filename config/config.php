<?php 
    require_once './public/API/google-api-client-2.0/vendor/autoload.php';
    $path = 'config/client_secret_CIT.json';
    $json = file_get_contents($path);
    $json_data = json_decode($json, true);

    define('GOOGLE_CLIENT_ID', $json_data['web']['client_id']);
    define('GOOGLE_CLIENT_SECRET', $json_data['web']['client_secret']);
    define('GOOGLE_REDIRECT_URL', $json_data['web']['redirect_uris'][0]);

    $client = new Google_Client();
    $client->setClientId(GOOGLE_CLIENT_ID);
    $client->setClientSecret(GOOGLE_CLIENT_SECRET);
    $client->setRedirectUri(GOOGLE_REDIRECT_URL);
    $client->addScope("email");
    $client->addScope("profile");
?>