<?php
header('Content-Type: application/json');

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

if ($data && isset($data['lat']) && isset($data['lng'])) {
    // Append location coordinates to text file
    $line = date('Y-m-d H:i:s') . " - Lat: " . $data['lat'] . ", Lng: " . $data['lng'] . "\n";
    file_put_contents('location.txt', $line, FILE_APPEND);
    
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
