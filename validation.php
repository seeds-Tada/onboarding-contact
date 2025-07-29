<?php
function validatioin() {
	$todohuken_array = array(
		'北海道',
		'青森県',
		'岩手県',
		'宮城県',
		'秋田県',
		'山形県',
		'福島県',
		'茨城県',
		'栃木県',
		'群馬県',
		'埼玉県',
		'千葉県',
		'東京都',
		'神奈川県',
		'山梨県',
		'長野県',
		'新潟県',
		'富山県',
		'石川県',
		'福井県',
		'岐阜県',
		'静岡県',
		'愛知県',
		'三重県',
		'滋賀県',
		'京都府',
		'大阪府',
		'兵庫県',
		'奈良県',
		'和歌山県',
		'鳥取県',
		'香川県',
		'愛媛県',
		'高知県',
		'福岡県',
		'佐賀県',
		'長崎県',
		'熊本県',
		'大分県',
		'宮城県',
		'鹿児島県',
		'沖縄県',
	);
	
	$error_msg = [];

	//氏名
	if(empty($_POST['name-kanji'])) {
		array_push($error_msg, "氏名が入力されていません。");
	}else if(!is_string($_POST['name-kanji'])) {
		array_push($error_msg, "氏名に文字列を入力してください。");
	}

	//フリガナ
	if(empty($_POST['name-hurigana'])) {
		array_push($error_msg, "フリガナが入力されていません。");
	}else if(!is_string($_POST['name-hurigana'])) {
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
			array_push($error_msg, "一つ目に郵便番号に整数を入力してください。");
		}else if(mb_strlen($_POST['address-post-1']) !== 3){
			array_push($error_msg, "一つ目に郵便番号に3桁の数字を入力してください。");
		}
	}

	//二目の郵便番号
	if(empty($_POST['address-post-2'])) {
		array_push($error_msg, "二つ目の郵便番号が入力されていません。");
	}else {
		if(!ctype_digit($_POST['address-post-2'])) {
			array_push($error_msg, "二つ目の郵便番号に整数を入力してください。");
		}else if(mb_strlen($_POST['address-post-2']) !== 4){
			array_push($error_msg, "一つ目に郵便番号に4桁の数字を入力してください。");
		}
	}

	//都道府県
	if(empty($_POST['address-todohuken'])) {
		array_push($error_msg, "住所（都道府県）が入力されていません。");
	}else{
		if(!is_string($_POST['address-todohuken'])) {
			array_push($error_msg, "住所(都道府県)を正しく入力してください。");
		}else {
			$bool = true;
			foreach($todohuken_array as $todohuken) {
				if($todohuken === $_POST['address-todohuken']) {
					$bool = false;
				}
			}
			if($bool) {
				array_push($error_msg, "住所(都道府県)を正しく選択してください。");
			}
		}
	}

	//市区町村
	if(empty($_POST['address-shikutyoson'])) {
		array_push($error_msg, "住所（市区町村）が入力されていません。");
	}else if(!is_string($_POST['address-shikutyoson'])) {	
		array_push($error_msg, "住所(市区町村)に文字列を入力してください。");
	}

	//それ以降
	if(empty($_POST['address-soreikou'])) {
		array_push($error_msg, "住所（それ以降の住所）が入力されていません。");
	}else if(!is_string($_POST['address-soreikou'])) {	
		array_push($error_msg, "住所(それ以降の住所)に文字列を入力してください。");
	}

	//建物
	if(!empty($_POST['address-tatemono'])) {
		if(!is_string($_POST['address-tatemono'])) {
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
	if(!empty($_POST['keiyu-kazoku'])) {
		if(!is_string($_POST['keiyu-kazoku']) || $_POST['keiyu-kazoku'] !== "家族から聞いて") {
			$keiyu_bool = true;
		}
	}

	//経由　友達
	if(!empty($_POST['keiyu-tomodati'])) {
		if(!is_string($_POST['keiyu-tomodati']) || $_POST['keiyu-tomodati'] !== "友達から聞いて") {
			$keiyu_bool = true;
		}
	}

	//経由　新聞
	if(!empty($_POST['keiyu-sinbun'])) {
		if(!is_string($_POST['keiyu-sinbun']) || $_POST['keiyu-sinbun'] !== "新聞") {
			$keiyu_bool = true;
		}
	}

	//経由　ラジオ
	if(!empty($_POST['keiyu-radio'])) {
		if(!is_string($_POST['keiyu-radio']) || $_POST['keiyu-radio'] !== "ラジオ") {
			$keiyu_bool = true;
		}
	}

	//経由　web
	if(!empty($_POST['keiyu-web'])) {
		if(!is_string($_POST['keiyu-web']) || $_POST['keiyu-web'] !== "web") {
			$keiyu_bool = true;
		}
	}

	if($keiyu_bool) {
		array_push($error_msg, "このフォームを知った経由を正しく選択してください。");
	}

	return $error_msg;
}