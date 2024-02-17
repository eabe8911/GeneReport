<?php
require_once './vendor/autoload.php';

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;


$data = json_decode((string) $response->getBody(), true);
$accessToken = $data['access_token'];

// Replace these placeholders with your app's details
$clientId = 'c5d81314-4670-4307-a7c4-abd248b2b090';
$clientSecret = 'hMB8Q~Pco9n30oUu-A4pojGIhU4WC.ql0IWUpaKQ';
$tenantId = '5303bff1-a523-4d20-92ec-e1f1f0f62e61';
$redirectUrl = 'https://www.maxcheng.tw';

// Replace these values with your own
$client_id = "c5d81314-4670-4307-a7c4-abd248b2b090";
$client_secret = "hMB8Q~Pco9n30oUu-A4pojGIhU4WC.ql0IWUpaKQ";
$tenant_id = "5303bff1-a523-4d20-92ec-e1f1f0f62e61";
$team_id = "YOUR_TEAM_ID";
$channel_id = "YOUR_CHANNEL_ID";

// Obtain an access token
$token_url = "https://login.microsoftonline.com/$tenant_id/oauth2/v2.0/token";
$token_data = [
    "client_id" => $client_id,
    "client_secret" => $client_secret,
    "scope" => "https://graph.microsoft.com/.default",
    "grant_type" => "client_credentials",
];

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);

$token_response = curl_exec($ch);
curl_close($ch);

$token_data = json_decode($token_response, true);
$access_token = $token_data["access_token"];

// Send a message to the Teams channel
$message_url = "https://graph.microsoft.com/v1.0/teams/$team_id/channels/$channel_id/messages";
$message_payload = [
    "body" => [
        "contentType" => "html",
        "content" => "Hello, this is a test message from PHP using the Microsoft Graph API!",
    ],
];

$headers = [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json",
];

$ch = curl_init($message_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message_payload));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);
if (isset($response_data["error"])) {
    echo "Failed to send message: " . $response_data["error"]["message"];
} else {
    echo "Message sent successfully!";
}
