<?php
use PHPMailer¥PHPMailer¥PHPMaier;
use PHPMailer¥PHPMailer¥Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

require_once 'private/bootstrap.php';
require_once 'private/database.php';
require_once 'validation.php';
// 実装
$addressPost = $_POST['address-post-1'].$_POST['address-post-2'];

$keiyu = array(
	"keiyu-kazoku" => $_POST['keiyu-kazoku'],
	"keiyu-tomodati" => $_POST['keiyu-tomodati'],
	"keiyu-sinbun" => $_POST['keiyu-sinbun'],
	"keiyu-radio" => $_POST['keiyu-radio'],
	"keiyu-web" => $_POST['keiyu-web']
);

$error_mes = validatioin();

if(count($error_mes) === 0) {			//バリデーションの結果に問題がなければDBにお問合せを保存
	$connection = connectDB();
	try {
		$sql = "INSERT INTO contacts(kanji, hurigana, email, gender, post, todohuken, shikutyoson, soreikou, tatemono, contact) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$stmt = $connection->prepare($sql);
		$stmt->bind_param(
			"ssssssssss",
			$_POST['name-kanji'],
			$_POST['name-hurigana'],
			$_POST['email'],
			$_POST['gender'],
			$addressPost,
			$_POST['address-todohuken'],
			$_POST['address-shikutyoson'],
			$_POST['address-soreikou'],
			$_POST['address-tatemono'],
			$_POST['contact']
		);
		$stmt->execute();
		$insert_id = $stmt->insert_id;
		$stmt->close();

		foreach($keiyu as $key => $val) {
			if($val !== "") {
				$sql = "INSERT INTO keiyu(contacts_id, keiyu) VALUE(?, ?);";
				$stmt = $connection->prepare($sql);
				$stmt->bind_param(
					"is",
					$insert_id,
					$val
				);
				$stmt->execute();
				$stmt->close();
			}
		}
	}catch(PDOException $e) {
		echo("error");
	}catch(Exception $e) {
		echo("error");
		echo($e);
	}
	/*
	PHPMailerの実装

	gmailのAppPasswordを設定するためには、
	$mail_result = false;		//送信できたかどうかの確認。trueになっていれば送信成功
	
	$mail = new PHPMailer(true);

	$smtp_Username = 'yourAddress@gmail.com';	//gmailのSMTPを利用するためのユーザー名
	$smtp_Password = 'yourAppPassword';			//gmailのSMTPを利用するためのアプリパスワード

	$From_mailAddress = '';		//メールの送信元のメールアドレス
	$From_name = '';			//メールの送信元の名前
	$To_mailAddress = '';		//メールの送信先のメールアドレス
	$To_name = '';				//メールの送信先の名前

	$mail_subject = 'onboardingのお問合せメール';										//メールのタイトル
	$mail_body = nl2br(htmlspecialchars($_POST['contact'], ENT_QUOTES, 'UTF-8'));;	 //メールの本文

	try {
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $smtp_Username;
		$mail->Password = $smtp_Password;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom($From_mailAddress, $From_name);
		$mail->addAddress($To_mailAddress, $To_name);

		$mail->isHTML();
		$mail->Subject = $mail_subject;
		$mail->Body = $mail_body;

		$mail->send();
		$mail_result = true;
	}catch(Exception $e) {
		echo("メールの送信に失敗しました: {$mail->ErrorInfo}");
	}
	*/
}else {									//バリデーションの結果に問題があれば入力画面へ
	echo(input());
	if(!empty($_POST['input'])) {		//初めてページに訪れた時にはバリデーション結果を表示しない
		error($error_mes);
	}
}

?>

<!-- 描画するHTML -->
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>onboarding-contact</title>
</head>
<body>
	<p>お問い合わせありがとうございました。</p>
</body>
</html>