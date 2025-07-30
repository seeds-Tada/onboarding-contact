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
empty($_POST['name-kanji']) ? $_POST['name-kanji'] = "" : "";					//必須
empty($_POST['name-hurigana']) ? $_POST['name-hurigana'] = "" : "";				//必須
empty($_POST['email']) ? $_POST['email'] = "" : "";								//必須
empty($_POST['gender']) ? $_POST['gender'] = "" : "";							//必須

empty($_POST['address-post-1']) ? $_POST['address-post-1'] = "" : "";			//必須
empty($_POST['address-post-2']) ? $_POST['address-post-2'] = "" : "";			//必須
empty($_POST['address-todohuken']) ? $_POST['address-todohuken'] = "" : "";		//必須
empty($_POST['address-shikutyoson']) ? $_POST['address-shikutyoson'] = "" : "";	//必須
empty($_POST['address-soreikou']) ? $_POST['address-soreikou'] = "" : "";		//必須
empty($_POST['address-tatemono']) ? $_POST['address-tatemono'] = "" : "";					//必須ではない

empty($_POST['contact']) ? $_POST['contact'] = "" : "";							//必須

empty($_POST['keiyu-kazoku']) ? $_POST['keiyu-kazoku'] = "" : "";							//必須ではない
empty($_POST['keiyu-tomodati']) ? $_POST['keiyu-tomodati'] = "" : "";						//必須ではない
empty($_POST['keiyu-sinbun']) ? $_POST['keiyu-sinbun'] = "" : "";							//必須ではない
empty($_POST['keiyu-radio']) ? $_POST['keiyu-radio'] = "" : "";								//必須ではない
empty($_POST['keiyu-web']) ? $_POST['keiyu-web'] = "" : "";									//必須ではない

$error_mes = validatioin();

if(!empty($_POST['send'])) {				//確認画面で送信を押したら
	if(count($error_mes) !== 0) {			//バリデーションの結果に問題があれば入力画面へ
		echo(input());
		error($error_mes);
	}else {									//バリデーションの結果に問題がなければ、thanks.phpへ
		$GLOBALS["thanks_post"] = $_POST;
		include'thanks.php';
		//header("location: thanks.php");
	}
}else if(!empty($_POST['back'])) {			//確認画面で戻るを押したら
	echo(input());
	error($error_mes);
}else {										//入力画面で全ての項目が入力されている
	if(count($error_mes) !== 0) {			//バリデーションの結果に問題があれば入力画面へ
		echo(input());
		if(!empty($_POST['input'])) {			//初めてページに訪れた時にはバリデーション結果を表示しない
			error($error_mes);
		}
	}else {									//全ての項目が入力されて、バリデーションの結果に問題がなければ確認画面へ
		echo(check());
	}
}