<?php
session_set_cookie_params(21600);
session_start();
$id = $_SESSION["id"];
$result_set1 = $bd -> query("SELECT `mail` FROM `users` WHERE `id` = '".$id."'");
$mail = vivod1($result_set1);
$time = time();

if(isset($_POST["send"]))
{

$bd -> query("INSERT INTO `chat` (`id`, `mail`, `USmsg`, `ADmsg`, `time`) VALUES (NULL, '".$mail."', '".$USmsg."', NULL, '".$time."');");

}	

$ALLusMSG = $bd -> query("SELECT `USmsg` FROM `chat` WHERE `mail` = '".$mail."'");
$ALLadMSG = $bd -> query("SELECT `ADmsg` FROM `chat` WHERE `mail` = '".$mail."'");
$ALLids = $bd -> query("SELECT `id` FROM `chat` WHERE `mail` = '".$mail."'");
$ALLtimes = $bd -> query("SELECT `time` FROM `chat` WHERE `mail` = '".$mail."'");
$messagesUSER = USmessag($ALLusMSG);
$messagesADMIN = ADmessag($ALLadMSG);
$messagesID = IDmessag($ALLids);
$messagesTIME = TIMEmessag($ALLtimes);








function USmessag($result_set){
$o = 0;
$USmessages = array();
	while(($row = $result_set->fetch_assoc()) != false){

		$infos[$o] = $row["USmsg"];
		$o +=1;		
		
	} return $infos;

}

function ADmessag($result_set){
$o = 0;
$ADmessages = array();
	while(($row = $result_set->fetch_assoc()) != false){

		$infos[$o] = $row["ADmsg"];
		$o +=1;		
		
	} return $infos;

}

function IDmessag($result_set){
$o = 0;
$ids = array();
	while(($row = $result_set->fetch_assoc()) != false){

		$infos[$o] = $row["id"];
		$o +=1;		
		
	} return $infos;

}

function TIMEmessag($result_set){
$o = 0;
$TIMEmessages = array();
	while(($row = $result_set->fetch_assoc()) != false){

		$infos[$o] = $row["time"];
		$o +=1;		
		
	} return $infos;

}
function vivod1($result_set){

	while(($row = $result_set->fetch_assoc()) != false){
		return $row["mail"];
		
	}
}

?>