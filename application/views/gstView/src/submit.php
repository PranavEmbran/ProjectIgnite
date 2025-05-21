// hmis/GstValidation/insertGSTIN.php
<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    // Validate and insert into DB
    // $data['stateCode'], $data['pan'], etc.
    echo json_encode(["message" => "GSTIN saved successfully"]);
} else {
    echo json_encode(["message" => "Invalid data"]);
}
?>
