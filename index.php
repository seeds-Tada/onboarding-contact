<?php
/* ----------------------------------------
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';
require_once 'validation.php';
require_once 'components/input.php';
require_once 'components/check.php';
require_once 'components/error.php';

// 実装
$bool = true;

$name_kanji = !empty($_POST['name-kanji']) ? $_POST['name-kanji'] : $bool = false;			//必須
$name_furigana = !empty($_POST['name-hurigana']) ? $_POST['name-hurigana'] : $bool = false;	//必須
$email = !empty($_POST['email']) ? $_POST['email'] : $bool = false;							//必須
$gender = !empty($_POST['gender']) ? $_POST['gender'] : $bool = false;						//必須

$address_post_1 = !empty($_POST['address-post-1']) ? $_POST['address-post-1'] : $bool = false;			//必須
$address_post_2 = !empty($_POST['address-post-2']) ? $_POST['address-post-2'] : $bool = false;			//必須
$address_todohuken = !empty($_POST['address-todohuken']) ? $_POST['address-todohuken'] : $bool = false;			//必須
$address_shikutyoson = !empty($_POST['address-shikutyoson']) ? $_POST['address-shikutyoson'] : $bool = false;	//必須
$address_soreikou = !empty($_POST['address-soreikou']) ? $_POST['address-soreikou'] : $bool = false;			//必須
$address_tatemono = !empty($_POST['address-tatemono']) ? $_POST['address-tatemono'] : "";						//必須ではない

$contact = !empty($_POST['contact']) ? $_POST['contact'] : $bool = false;				//必須

$keiyu_kazoku = !empty($_POST['keiyu-kazoku']) ? $_POST['keiyu-kazoku'] : "";			//必須ではない
$keiyu_tomodati = !empty($_POST['keiyu-tomodati']) ? $_POST['keiyu-tomodati'] : "";		//必須ではない
$keiyu_sinbun = !empty($_POST['keiyu-sinbun']) ? $_POST['keiyu-sinbun'] : "";			//必須ではない
$keiyu_radio = !empty($_POST['keiyu-radio']) ? $_POST['keiyu-radio'] : "";				//必須ではない
$keiyu_web = !empty($_POST['keiyu-web']) ? $_POST['keiyu-web'] : "";					//必須ではない

$input = array(
	"name_kanji" => $name_kanji,
	"name_hurigana" => $name_furigana,
	"email" => $email,
	"gender" => $gender,
	"address_post_1" => $address_post_1,
	"address_post_2" => $address_post_2,
	"address_todohuken" => $address_todohuken,
	"address_shikutyoson" => $address_shikutyoson,
	"address_soreikou" => $address_soreikou,
	"address_tatemono" => $address_tatemono,
	"contact" => $contact,
	"keiyu_kazoku" => $keiyu_kazoku,
	"keiyu_tomodati" => $keiyu_tomodati,
	"keiyu_sinbun" => $keiyu_sinbun,
	"keiyu_radio" => $keiyu_radio,
	"keiyu_web" => $keiyu_web,
);

// !empty($_POST['name-kanji']) ? $_POST['name-kanji'] = "" : $bool = false;			//必須
// !empty($_POST['name-hurigana']) ? $_POST['name-hurigana'] = "" : $bool = false;	//必須
// !empty($_POST['email']) ? $_POST['email'] = "" : $bool = false;							//必須
// !empty($_POST['gender']) ? $_POST['gender'] = "" : $bool = false;						//必須

// !empty($_POST['address-post-1']) ? $_POST['address-post-1'] = "" : $bool = false;			//必須
// !empty($_POST['address-post-2']) ? $_POST['address-post-2'] = "" : $bool = false;			//必須
// !empty($_POST['address-todohuken']) ? $_POST['address-todohuken'] = "" : $bool = false;			//必須
// !empty($_POST['address-shikutyoson']) ? $_POST['address-shikutyoson'] = "" : $bool = false;	//必須
// !empty($_POST['address-soreikou']) ? $_POST['address-soreikou'] = "" : $bool = false;			//必須
// !empty($_POST['address-tatemono']) ? $_POST['address-tatemono'] = "" : exit() ;						//必須ではない

// !empty($_POST['contact']) ? $_POST['contact'] = "" : $bool = false;				//必須

// !empty($_POST['keiyu-kazoku']) ? $_POST['keiyu-kazoku'] = "" : exit();			//必須ではない
// !empty($_POST['keiyu-tomodati']) ? $_POST['keiyu-tomodati'] = "" : exit();		//必須ではない
// !empty($_POST['keiyu-sinbun']) ? $_POST['keiyu-sinbun'] = "" : exit();			//必須ではない
// !empty($_POST['keiyu-radio']) ? $_POST['keiyu-radio'] = "" : exit();				//必須ではない
// !empty($_POST['keiyu-web']) ? $_POST['keiyu-web'] = "" : exit();					//必須ではない

$error_mes = validatioin();

if(!empty($_POST['send'])) {
	if(count($error_mes) !== 0) {
		echo(input($input));
		error($error_mes);
	}else {
		$GLOBALS["thanks_post"] = $_POST;
		include'thanks.php';
		//header("location: thanks.php");
	}
}else if(!empty($_POST['back'])) {
	echo(input($input));
	error($error_mes);
}else if(!$bool) {	//テスト中
	// foreach($input as $val) {
	// 	var_dump($val);
	// 	//echo($key." :".$val."<br>");
	// }
	echo(input($input));
	error($error_mes);
}else {
	if(count($error_mes) !== 0) {
		echo(input($input));
		error($error_mes);
	}else {
		echo(check($input));
	}
}