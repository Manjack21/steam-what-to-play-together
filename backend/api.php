<?php

header("Access-Control-Allow-Origin: *");
$baseUrl = "http://api.steampowered.com/";
$apiKey = file_get_contents("../api.key");

/**
* Send a GET requst using cURL
* @param string $url to request
* @param array $get values to send
* @param array $options for cURL
* @return string
*/
function curl_get($url, array $get = array(), array $options = array())
{
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );
   
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
} 


if($_GET["action"] === "profile")
    echo curl_get($baseUrl . "ISteamUser/GetPlayerSummaries/v0002/?key=" . $apiKey . "&steamids=" . $_GET["id"]);
else if($_GET["action"] === "ownedGames")
    echo curl_get($baseUrl . "IPlayerService/GetOwnedGames/v0001/?key=" . $apiKey . "&include_appinfo=true&steamid=" . $_GET["id"]);
?>