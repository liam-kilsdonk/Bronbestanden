<?php
include_once("functions.php");

$db = ConnectDB();

$naam = isset($_GET['Naam']) ? $_GET['Naam'] : "";
$email = isset($_GET['Email']) ? $_GET['Email'] : "";
$telefoon = isset($_GET['Telefoon']) ? $_GET['Telefoon'] : "";
$wachtwoord = isset($_GET['Wachtwoord']) ? $_GET['Wachtwoord'] : "";

$sql = "INSERT INTO relaties (Naam, Email, Telefoon, Wachtwoord, FKrollenID)
        VALUES (:naam, :email, :telefoon, :wachtwoord, :fkrollenid)";

$stmt = $db->prepare($sql);

$md5wachtwoord = md5($wachtwoord);

$stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefoon', $telefoon, PDO::PARAM_STR);

$stmt->bindParam(':wachtwoord', $md5wachtwoord, PDO::PARAM_STR);

$stmt->bindParam(':fkrollenid', 10, PDO::PARAM_INT);

if ($stmt->execute()) {
    if (StuurMail($email, "Account gegevens Ultima Casa", "Uw inlog gegevens zijn:\n\n
                   Naam: $naam\n
                   E-mailadres: $email\n
                   Telefoon: $telefoon\n
                   Wachtwoord: $wachtwoord\n\n
                   Bewaar deze gegevens goed!\n\n
                   Met vriendelijke groet,\n\n
                   Het Ultima Casa team.",
        "From: noreply@uc.nl")) {
        $result = 'De gegevens zijn naar uw e-mailadres verstuurd.';
    } else {
        $result = 'Fout bij het versturen van de e-mail met uw gegevens.';
    }
} else {
    $result = 'Fout bij het bewaren van uw gegevens.<br><br>' . print_r($stmt->errorInfo(), true);
}

echo $result . '<br><br>
      <button class="action-button"><a href="index.html">Ok</a></button>';
?>
