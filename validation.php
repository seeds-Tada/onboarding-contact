<?php
function validatioin() {
	$error_msg = [];

	if(empty($_POST['name-kanji'])) {					//必須
		array_push($error_msg, "氏名が入力されていません。");
	}

	if(empty($_POST['name-hurigana'])) {				//必須
		array_push($error_msg, "フリガナが入力されていません。");
	}

	if(empty($_POST['email'])) {						//必須
		array_push($error_msg, "メールアドレスが入力されていません。");
	}

	if(empty($_POST['gender'])) {						//必須
		array_push($error_msg, "性別が入力されていません。");
	}

	if(empty($_POST['address-post-1'])) {				//必須
		array_push($error_msg, "一つ目の郵便番号が入力されていません。");
	}

	if(empty($_POST['address-post-2'])) {				//必須
		array_push($error_msg, "二つ目の郵便番号が入力されていません。");
	}

	if(empty($_POST['address-todohuken'])) {			//必須
		array_push($error_msg, "住所（都道府県）が入力されていません。");
	}

	if(empty($_POST['address-shikutyoson'])) {			//必須
		array_push($error_msg, "住所（市区町村）が入力されていません。");
	}

	if(empty($_POST['address-soreikou'])) {				//必須
		array_push($error_msg, "住所（それ以降の住所）が入力されていません。");
	}

	if(!empty($_POST['address-tatemono'])) {			//必須ではない !empty()
		array_push($error_msg, "");
	}

	if(empty($_POST['contact'])) {						//必須
		array_push($error_msg, "お問合せ内容が入力されていません。");
	}

	if(!empty($_POST['keiyu-kazoku'])) {				//必須ではない !empty()
		array_push($error_msg, "");
	}

	if(!empty($_POST['keiyu-tomodati'])) {				//必須ではない !empty()
		array_push($error_msg, "");
	}

	if(!empty($_POST['keiyu-sinbun'])) {				//必須ではない !empty()
		array_push($error_msg, "");
	}

	if(!empty($_POST['keiyu-radio'])) {					//必須ではない !empty()
		array_push($error_msg, "");
	}

	if(!empty($_POST['keiyu-web'])) {					//必須ではない !empty()
		array_push($error_msg, "");
	}

	return $error_msg;
}