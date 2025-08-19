<?php
/* ----------------------------------------
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';
require_once 'validation.php';

//var_dump(array_key_exists('gender', $genders));

// 実装
$_POST['name'] = $_POST['name'] ?? "";						//必須
$_POST['name-kana'] = $_POST['name-kana'] ?? "";				//必須
$_POST['email'] = $_POST['email'] ?? "";								//必須
$_POST['gender'] = $_POST['gender'] ?? "";								//必須

$_POST['address-post-1'] = $_POST['address-post-1'] ?? "";				//必須
$_POST['address-post-2'] = $_POST['address-post-2'] ?? "";				//必須
$_POST['address_prefecture'] = $_POST['address_prefecture'] ?? "";		//必須
$_POST['address-city'] = $_POST['address-city'] ?? "";	//必須
$_POST['address-detail'] = $_POST['address-detail'] ?? "";			//必須
$_POST['address-building'] = $_POST['address-building'] ?? "";			//必須ではない

$_POST['contact'] = $_POST['contact'] ?? "";							//必須

// $_POST['source-family'] = $_POST['source-family'] ?? "";					//必須ではない
// $_POST['source-friend'] = $_POST['source-friend'] ?? "";				//必須ではない
// $_POST['source-newspaper'] = $_POST['source-newspaper'] ?? "";					//必須ではない
// $_POST['source-radio'] = $_POST['source-radio'] ?? "";					//必須ではない
// $_POST['source-web'] = $_POST['source-web'] ?? "";						//必須ではない
$_POST['source'] = $_POST['source'] ?? "";

$error_mes = validation();
?>
<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>onboarding-contact</title>
	</head>
	<body>
		<div>
			<?php
				if(!empty($_POST['send'])) {				//確認画面で送信を押したら
					if(count($error_mes) !== 0) {			//バリデーションの結果に問題があれば入力画面へ
						include'components/input.php';
						include'components/error.php';
					}else {									//バリデーションの結果に問題がなければ、thanks.phpへ
						include'thanks.php';
					}
				}else if(!empty($_POST['back'])) {			//確認画面で戻るを押したら
					include'components/input.php';
					include'components/error.php';
				}else {										//入力画面で全ての項目が入力されている
					if(count($error_mes) !== 0) {			//バリデーションの結果に問題があれば入力画面へ
						include'components/input.php';
						if(!empty($_POST['input'])) {		//初めてページに訪れた時にはバリデーション結果を表示しない
							include'components/error.php';
						}
					}else {									//全ての項目が入力されて、バリデーションの結果に問題がなければ確認画面へ
						include'components/check.php';
					}
				}
			?>
		</div>
	</body>
</html>