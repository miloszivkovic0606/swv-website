<?php

// $sent_hubspot = true;
$send_email = TRUE;

$data = $_POST['data'];


// ----------- HUBSPOT API -----------
require 'vendor/autoload.php';

use SevenShores\Hubspot\Http\Client;
use SevenShores\Hubspot\Resources\Companies;


    $client = new Client(['key' => 'bf1a7bba-738f-4b6c-a041-14ff53940ef2']);

    $companies = new Companies($client);
    $properties = [
        [
            'name' => 'name',
            'value' => $data['first_name'] . " " . $data['last_name'],
        ],
        [
            'name' => 'hubspot_owner_id', //Für Unternehmen zuständiger Mitarbeiter
            'value' => '31963123'
        ],
        [
            'name' => 'phone',
            'value' => $data['phone'],
        ],
        [
            'name' => 'ortsfeuerwehr',
            'value' => $data['association'],
        ],
        [
            'name' => 'zust_ndiger_wirtschaftsverband',
            'value' => 'SWV Oberösterreich',
        ]
        ,
        [
            "name" => 'website',
            'value' => $data['email']
        ],
    ];

    try {
        $create = $companies->create($properties);
        $res["response"] = 1;
        $res['error'] = 'none';
    } catch (Exception $e) {
        $res["response"] = 0;
        $res['error'] = 'Error: ' . $e->getMessage();
    }
// ----------- END HUBSPOT API ----------- 
// ----------- SEND MAIL  ----------- 
require 'vendor/PHPMailer/PHPMailerAutoload.php';

if ($send_email) {
    $mail = new PHPMailer;
    $mail->From = 'nkajevic@cimet.rs';


    $mail->FromName = 'Unsere-Wirtschaft';
    $mail->addAddress("johnnybravo471@gmail.com");    // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $data['subject'];

    $message = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title></title></head><body><table><font face='Arial,Verdana'><tr><td>"
            . "
            Vorname: " . $data['first_name'] . "<br/>
            Nachname: " . $data['last_name'] . "<br/>
            Betreff: " .$data['subject'] . " <br/>
            Email: " . $data['email'] . "<br/>
            Phone: " . $data['phone'] . "<br/>
            Firma: " . $data['firma'] . "<br/>
            Nachiricht: " . $data['message'] . "<br/>
            </td><td></td></tr></font></table></body></html>";

    $mail->Body = $message;
    $mail->AltBody = '';
    $mail->CharSet = "UTF-8";
    $mail->Send();

}

echo JSON_encode($res);
