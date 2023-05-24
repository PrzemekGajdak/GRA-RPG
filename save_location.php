<?php
// Pobierz dane z formularza dodawania lokacji
$locationName = $_POST['location_name'];
$locationDescription = $_POST['location_description'];

// Ustaw dane do połączenia z bazą danych
$host = 'localhost'; // Adres serwera bazy danych
$dbUser = 'root'; // Nazwa użytkownika bazy danych
$dbPass = ''; // Hasło użytkownika bazy danych
$dbName = 'lokacje'; // Nazwa bazy danych

// Połącz z bazą danych
$conn = new mysqli("localhos", "root", "", "lokacje");

// Sprawdź połączenie z bazą danych
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Przygotuj zapytanie SQL do zapisu danych dodawanej lokacji
$sql = "INSERT INTO locations (name, description) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $locationName, $locationDescription);

// Wykonaj zapytanie
if ($stmt->execute()) {
    echo "Lokacja została dodana.";
} else {
    echo "Wystąpił błąd podczas dodawania lokacji: " . $conn->error;
}

// Zamknij połączenie z bazą danych
$stmt->close();
$conn->close();
?>

