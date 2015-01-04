<?php
 
// ==== Control Vars =======
$strFromNumber = "+19205414589";
$strToNumber = "+19206912492";
$strMsg = $_POST['message'];
$strName = $_POST['name'];
$strPhone = $_POST['phone'];
$aryResponse = array();
 

    // include the Twilio PHP library - download from
    // http://www.twilio.com/docs/libraries/
    require'twilio-php/Services/Twilio.php';
 
    // set our AccountSid and AuthToken - from www.twilio.com/user/account
    $AccountSid = "ACe29c8d760d7c46ce87cd20fc762752d0";
    $AuthToken = "5d2c7c091b87974ec87e702bc2166091";
 
    // ini a new Twilio Rest Client
    $objConnection = new Services_Twilio($AccountSid, $AuthToken);


    // Send a new outgoinging SMS by POSTing to the SMS resource */
    $bSuccess = $objConnection->account->sms_messages->create(
        
        $strFromNumber, // number we are sending From
        $strToNumber, // number we are sending To
        $strMsg	// the sms body
    );
    
    $aryResponse["SentName"] = $strName;
    $aryResponse["SentNbr"] = $strName;
    $aryResponse["SentMsg"] = $strMsg;
    $aryResponse["Success"] = true;
    
    
    echo json_encode($aryResponse);
?>