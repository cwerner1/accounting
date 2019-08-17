<?php
if (__FILE__ != $_SERVER['SCRIPT_FILENAME']) {

    // Accounting version tag
    $accountingVersion = 'v2.37.0-beta';

    // Repository Information von Github abrufen
    function fetchRepoInfo ($repo, $tagName, $latest = false) {
        $ch = curl_init();
        
        $options = array(
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'albrecht-net/accounting'
        );
    
        // Anfrage URL
        if ($latest) {
            $options[CURLOPT_URL] = 'https://api.github.com/repos/albrecht-net/' . $repo . '/releases/latest';
        } else {
            $options[CURLOPT_URL] = 'https://api.github.com/repos/albrecht-net/' . $repo . '/releases/tags/' . $tagName;
        }
    
        curl_setopt_array($ch, $options);
    
        $data = curl_exec($ch);
    
        // Return false wenn Anfrage nicht OK
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            return false;
        } else {
            return json_decode($data, true);
        };
    
        curl_close($ch);
    };

    // Datum Zeitzone konvertieren
    function setTimezone ($dateTime) {
        return date_timezone_set(date_create($dateTime), timezone_open(date_default_timezone_get()));
    };

    $accountingInfo = fetchRepoInfo('accounting', $accountingVersion);

    // Accounting release date
    $accountingReleaseDate = date_format(setTimezone($accountingInfo['published_at']), 'd.m.Y H:i:s');
} else {
    http_response_code(204);
}
?>