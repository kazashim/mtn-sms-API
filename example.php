<?php

// Client Credentials
$client_id = "YOUR_CLIENT_ID";
$client_secret = "YOUR_CLIENT_SECRET";

// Token URL
$token_url = "https://api.mtn.com/v1/oauth/access_token/accesstoken";

// Request parameters for token retrieval
$params = [
    'grant_type' => 'client_credentials',
];

// Set up cURL for token retrieval
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $token_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_HTTPHEADER => [
        "Authorization: Basic " . base64_encode("$client_id:$client_secret"),
    ],
]);

// Execute cURL request for token retrieval
$response = curl_exec($curl);
$err = curl_error($curl);

// Close cURL for token retrieval
curl_close($curl);

// Handle response for token retrieval
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $responseData = json_decode($response, true);
    $access_token = $responseData['access_token']; // Extract access token from response

    // Set up SMS sending parameters
    $sms_url = "https://api.mtn.com/v3/sms/messages/sms/outbound";

    $sms_params = [
        "senderAddress" => "MTN",
        "receiverAddress" => ["23423456789", "23423456790"],
        "message" => "Hello from PHP!",
        "clientCorrelatorId" => "your_client_correlator_id",
        "serviceCode" => "11221", // or "131"
        "requestDeliveryReceipt" => false
    ];

    // Set up cURL for SMS sending
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $sms_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($sms_params),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $access_token", // Use the access token obtained
            "Content-Type: application/json"
        ],
    ]);

    // Execute cURL request for SMS sending
    $response = curl_exec($curl);
    $err = curl_error($curl);

    // Close cURL for SMS sending
    curl_close($curl);

    // Handle response for SMS sending
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $responseData = json_decode($response, true);
        echo "<h2>Response:</h2>";
        echo "<pre>";
        print_r($responseData);
        echo "</pre>";
    }
}
?>
