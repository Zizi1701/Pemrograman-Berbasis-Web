<?php
// Data pajak bandara
$originTaxes = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$destinationTaxes = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

// Validasi input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airlineName = $_POST['airlineName'] ?? '';
    $originAirport = $_POST['originAirport'] ?? '';
    $destinationAirport = $_POST['destinationAirport'] ?? '';
    $ticketPrice = isset($_POST['ticketPrice']) ? (int)$_POST['ticketPrice'] : 0;

    // Hitung pajak
    $originTax = $originTaxes[$originAirport] ?? 0;
    $destinationTax = $destinationTaxes[$destinationAirport] ?? 0;
    $totalTax = $originTax + $destinationTax;
    $totalPrice = $ticketPrice + $totalTax;

    // Redirect dengan parameter hasil
    header("Location: index.php?result=success&airline=" . urlencode($airlineName) . 
           "&origin=" . urlencode($originAirport) . 
           "&destination=" . urlencode($destinationAirport) . 
           "&price=" . $ticketPrice . 
           "&tax=" . $totalTax . 
           "&total=" . $totalPrice);
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>