<?php
$email_from = "";   //Absender falls keiner angegeben wurde
$sendermail_antwort = true;      //E-Mail Adresse des Besuchers als Absender. false= Nein ; true = Ja
$name_von_emailfeld = "Email";   //Feld in der die Absenderadresse steht

$empfaenger = "wishyouwerehere.business@gmx.de"; //Empfänger-Adresse
$betreff = ""; //Betreff der Email

$url_ok = "file:///Users/Cassi/eclipse-workspace/Kweh/eigenes/emailsuccess.html"; //Zielseite, wenn E-Mail erfolgreich versendet wurde
if ($url_fehler) echo "Die E-mail konnte nicht gesendet werden"





//Datum, wann die Mail erstellt wurde
$name_tag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
$num_tag = date("w");
$tag = $name_tag[$num_tag];
$jahr = date("Y");
$n = date("d");
$monat = date("m");
$time = date("H:i");

//Erste Zeile unserer Email
$msg = ":: Gesendet am $tag, den $n.$monat.$jahr - $time Uhr ::\n\n";

//Hier werden alle Eingabefelder abgefragt
foreach($_POST as $name => $value) {
    if (in_array($name, $ignore_fields)) {
        continue; //Ignore Felder wird nicht in die Mail eingefügt
    }
    $msg .= "::: $name :::\n$value\n\n";
}



//E-Mail Adresse des Besuchers als Absender
if ($sendermail_antwort and isset($_POST[$name_von_emailfeld]) and filter_var($_POST[$name_von_emailfeld], FILTER_VALIDATE_EMAIL)) {
    $email_from = $_POST[$name_von_emailfeld];
}

$header="From: $email_from";

}

//Email als UTF-8 senden
$header .= "\nContent-type: text/plain; charset=utf-8";

$mail_senden = mail($empfaenger,$betreff,$msg,$header);


//Weiterleitung, hier konnte jetzt per echo auch Ausgaben stehen
if($mail_senden){
    header("Location: ".$url_ok); //Mail wurde gesendet
    exit();
} else{
    header("Location: ".$url_fehler); //Fehler beim Senden
    exit();
}

?> 