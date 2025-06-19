<?php
// Replace with the actual faucet request URL (API endpoint or form action URL)
$faucetUrl = 'https://testnet.helioschain.network/api/request-tokens';

// Replace with your testnet wallet address
$walletAddress = 'your_testnet_wallet_address_here';

// Prepare POST data - adjust keys according to the faucet's expected parameters
$postData = [
    'address' => $walletAddress,
];

// Initialize cURL session
$ch = curl_init($faucetUrl);

// Set cURL options for POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

// Optional: Set headers if required by the faucet API (e.g., Content-Type, Authorization)
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded',
    // 'Authorization: Bearer YOUR_API_KEY', // if needed
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch) . PHP_EOL;
} else {
    // Process the response
    echo "Faucet response: " . $response . PHP_EOL;
}

curl_close($ch);
