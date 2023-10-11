<?php
// Set your OpenAI API key here
$apiKey = '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';


// API endpoint
$endpoint = 'https://api.openai.com/v1/engines/davinci-codex/completions';

// User and assistant messages
$messages = [
    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
    ['role' => 'user', 'content' => 'Tell me a joke.'],
];

// Create headers for the API request
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
];

// Create data for the API request
$data = [
    'messages' => $messages,
];

// Make the API request using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Parse and display the response
if ($response) {
    $responseData = json_decode($response, true);
    
    if (isset($responseData['choices'][0]['message']['content'])) {
        $assistantReply = $responseData['choices'][0]['message']['content'];
        echo 'Assistant: ' . $assistantReply;
    } else {
        echo 'No response content found in the API response.';
    }
} else {
    echo 'An error occurred while making the API request.';
}
