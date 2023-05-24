<?php
// Pobierz dane z formularza
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

// Ustaw dane do połączenia z bazą danych
$host = 'localhost'; // Adres serwera bazy danych
$dbUser = 'root'; // Nazwa użytkownika bazy danych
$dbPass = ''; // Hasło użytkownika bazy danych
$dbName = 'GraRPG'; // Nazwa bazy danych

// Połącz z bazą danych
$conn = new mysqli("localhost", "root","", "GraRPG");
  
// Sprawdź połączenie z bazą danych
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Przygotuj zapytanie SQL do zapisu danych z wykorzystaniem prepared statements
$sql = "INSERT INTO users (login, password, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $login, $password, $email);

// Wykonaj zapytanie
if ($stmt->execute()) {
    echo "Dane zostały zapisane w bazie danych.";
} else {
    echo "Wystąpił błąd podczas zapisywania danych: " . $conn->error;
}

// Zamknij połączenie z bazą danych
$stmt->close();
$conn->close();

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
} else {
    echo "Połączono z bazą danych.";
}
?>



