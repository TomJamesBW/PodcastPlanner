<?php
// Get the origin
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

// Allow both HTTP and HTTPS from your domain
if (preg_match('/^https?:\/\/podcastplanner\.channel84\.co\.uk$/', $origin)) {
    header('Access-Control-Allow-Origin: ' . $origin);
} else {
    // Default to HTTPS if no valid origin
    header('Access-Control-Allow-Origin: https://podcastplanner.channel84.co.uk');
}

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-Api-Key');
header('Access-Control-Max-Age: 86400'); // Cache preflight for 24 hours

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Get the target URL from query parameter
// Check if it's a full URL (for S3 uploads) or a path (for API calls)
if (isset($_GET['url'])) {
    // Full URL provided (for S3 presigned URLs)
    $targetUrl = $_GET['url'];
} else {
    // Path provided (for RSS.com API)
    $path = isset($_GET['path']) ? $_GET['path'] : '';
    $targetUrl = 'https://api.rss.com' . $path;
}

// Initialize cURL
$ch = curl_init($targetUrl);

// Set request method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Forward headers
$headers = [];
$allHeaders = getallheaders();

if (isset($allHeaders['X-Api-Key'])) {
    $headers[] = 'X-Api-Key: ' . $allHeaders['X-Api-Key'];
}

if (isset($allHeaders['Content-Type'])) {
    $headers[] = 'Content-Type: ' . $allHeaders['Content-Type'];
}

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Forward request body for POST/PUT
if (in_array($_SERVER['REQUEST_METHOD'], ['POST', 'PUT'])) {
    $body = file_get_contents('php://input');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
}

// Execute request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

// Return response
http_response_code($httpCode);
if ($contentType) {
    header('Content-Type: ' . $contentType);
}
echo $response;
?>