<?php
function validation() {
	require './enums/prefecture.php';
	
	$error_msg = [];

	//氏名
	if(empty($_POST['name'])) {
		array_push($error_msg, "氏名が入力されていません。");
		$_POST['name'] = "";
	}else if(!is_string($_POST['name'])) {
		array_push($error_msg, "氏名に文字列を入力してください。");
	}

	//フリガナ
	if(empty($_POST['name-kana'])) {
		array_push($error_msg, "フリガナが入力されていません。");
	}else if(!is_string($_POST['name-kana'])) {
		array_push($error_msg, "フリガナに文字列を入力してください。");
	}

	//メールアドレス
	if(empty($_POST['email'])) {
		array_push($error_msg, "メールアドレスが入力されていません。");
	}else{
		if(!is_string($_POST['email'])) {
			array_push($error_msg, "メールアドレスに文字列を入力してください。");
		}else {
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				array_push($error_msg, "メールアドレスを入力してください。");
			}
		}
	}

	//性別
	if(empty($_POST['gender'])) {
		array_push($error_msg, "性別が入力されていません。");
	}else {
		if(!is_string($_POST['gender'])) {
			array_push($error_msg, "性別をに文字列を入力してください。");
		}else {
			if(!($_POST['gender'] === "female" || $_POST['gender'] === "male")) {
				array_push($error_msg, "性別を正しく入力してください。");
			}
		}
	}

	//一つ目の郵便番号
	if(empty($_POST['address-post-1'])) {
		array_push($error_msg, "一つ目の郵便番号が入力されていません。");
	}else {
		if(!ctype_digit($_POST['address-post-1'])) {
			array_push($error_msg, "一つ目の郵便番号に整数を入力してください。");
		}else if(mb_strlen($_POST['address-post-1']) !== 3){
			array_push($error_msg, "一つ目の郵便番号に3桁の数字を入力してください。");
		}
	}

	//二目の郵便番号
	if(empty($_POST['address-post-2'])) {
		array_push($error_msg, "二つ目の郵便番号が入力されていません。");
	}else {
		if(!ctype_digit($_POST['address-post-2'])) {
			array_push($error_msg, "二つ目の郵便番号に整数を入力してください。");
		}else if(mb_strlen($_POST['address-post-2']) !== 4){
			array_push($error_msg, "二つ目の郵便番号に4桁の数字を入力してください。");
		}
	}

	//都道府県
	if(empty($_POST['address_prefecture'])) {
		array_push($error_msg, "住所（都道府県）が入力されていません。");
	}else{
		if(!is_string($_POST['address_prefecture'])) {
			array_push($error_msg, "住所(都道府県)を正しく入力してください。");
		}else {
			$bool = true;
			foreach($prefectures as $prefecture) {
				if($prefecture === $_POST['address_prefecture']) {
					$bool = false;
				}
			}
			if($bool) {
				array_push($error_msg, "住所(都道府県)を正しく選択してください。");
			}
		}
	}

	//市区町村
	if(empty($_POST['address-city'])) {
		array_push($error_msg, "住所（市区町村）が入力されていません。");
	}else if(!is_string($_POST['address-city'])) {	
		array_push($error_msg, "住所(市区町村)に文字列を入力してください。");
	}

	//それ以降
	if(empty($_POST['address-detail'])) {
		array_push($error_msg, "住所（それ以降の住所）が入力されていません。");
	}else if(!is_string($_POST['address-detail'])) {	
		array_push($error_msg, "住所(それ以降の住所)に文字列を入力してください。");
	}

	//建物
	if(!empty($_POST['address-building'])) {
		if(!is_string($_POST['address-building'])) {
			array_push($error_msg, "文字列を入力してください。");
		}
	}

	//お問合せ
	if(empty($_POST['contact'])) {		
		array_push($error_msg, "お問合せ内容が入力されていません。");
	}else if(!is_string($_POST['contact'])) {	
		array_push($error_msg, "お問合せ内容に文字列を入力してください。");
	}

	
	$keiyu_bool = false;
	//経由　家族
	if(!empty($_POST['source-family'])) {
		if(!is_string($_POST['source-family']) || $_POST['source-family'] !== "家族から聞いて") {
			$keiyu_bool = true;
		}
	}

	//経由　友達
	if(!empty($_POST['source-friend'])) {
		if(!is_string($_POST['source-friend']) || $_POST['source-friend'] !== "友達から聞いて") {
			$keiyu_bool = true;
		}
	}

	//経由　新聞
	if(!empty($_POST['source-newspaper'])) {
		if(!is_string($_POST['source-newspaper']) || $_POST['source-newspaper'] !== "新聞") {
			$keiyu_bool = true;
		}
	}

	//経由　ラジオ
	if(!empty($_POST['source-radio'])) {
		if(!is_string($_POST['source-radio']) || $_POST['source-radio'] !== "ラジオ") {
			$keiyu_bool = true;
		}
	}

	//経由　web
	if(!empty($_POST['source-web'])) {
		if(!is_string($_POST['source-web']) || $_POST['source-web'] !== "web") {
			$keiyu_bool = true;
		}
	}

	if($keiyu_bool) {
		array_push($error_msg, "このフォームを知った経由を正しく選択してください。");
	}

	return $error_msg;
}