<?php
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'private/bootstrap.php';
require_once 'private/database.php';
require_once 'validation.php';
// 実装
$addressPost = $_POST['address-post-1'].$_POST['address-post-2'];

$keiyu = array(
	"keiyu-kazoku" => $_POST['source-family'],
	"keiyu-tomodati" => $_POST['source-friend'],
	"keiyu-sinbun" => $_POST['source-newspaper'],
	"keiyu-radio" => $_POST['source-radio'],
	"keiyu-web" => $_POST['source-web']
);

$error_mes = validation();

if(count($error_mes) === 0) {			//バリデーションの結果に問題がなければDBにお問合せを保存
	$connection = connectPDO();
	$insert_id = 1;
	try {
		$sql = "INSERT INTO contacts(name, name_kana, email, gender, post, prefecture, city, detail, building, contact) VALUE(:name, :name_kana, :email, :gender, :post, :prefecture, :city, :detail, :building, :contact);";
		$stmt = $connection->prepare($sql);
		$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
		$stmt->bindParam(':name_kana', $_POST['name-kana'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$stmt->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
		$stmt->bindParam(':post', $addressPost, PDO::PARAM_STR);
		$stmt->bindParam(':prefecture', $_POST['address_prefecture'], PDO::PARAM_STR);
		$stmt->bindParam(':city', $_POST['address-city'], PDO::PARAM_STR);
		$stmt->bindParam(':detail', $_POST['address-detail'], PDO::PARAM_STR);
		$stmt->bindParam(':building', $_POST['address-building'], PDO::PARAM_STR);
		$stmt->bindParam(':contact', $_POST['contact'], PDO::PARAM_STR);
		$stmt->execute();
		$insert_id = (int)($connection->lastInsertId());
		$stmt = null;
	}catch(PDOException $e) {
		echo("db error. contacts table.<br>");
		echo($e->getMessage());
	}catch(Exception $e) {
		echo("error<br>");
		echo($e->getMessage());
	}

	try{
		foreach($keiyu as $key => $val) {
			if($val !== "") {
				$sql = "INSERT INTO sources(contacts_id, source) VALUE(:contacts_id, :source);";
				$stmt = $connection->prepare($sql);
				$stmt->bindParam(':contacts_id', $insert_id, PDO::PARAM_INT);
				$stmt->bindParam(':source', $val, PDO::PARAM_STR);
				$stmt->execute();
				$stmt = null;
			}
		}
	}catch(PDOException $e){
		echo("db error. sources table.<br>");
		echo($e->getMessage());
	}catch(Exception $e){
		echo("error<br>");
		echo($e->getMessage());
	}
	// PHPMailerの実装
	// gmailのAppPasswordを設定するためには
	// Googleアカウントの二段階認証を有効にする。
	// https://myaccount.google.com/apppasswordsにアクセスする
	// アプリ名を入力し作成ボタンを押す
	// 表示される16桁の文字がAppPassword
	// $smtp_Usernameにアカウントのメールアドレス
	// $stmp_Passwordに表示された16桁の文字列（空白文字は削除する）
	$mail_result = false;		//送信できたかどうかの確認。trueになっていれば送信成功
	
	$mail = new PHPMailer(true);

	$smtp_Username = 'yourMailAddress';			//gmailのSMTPを利用するためのユーザー名
	$smtp_Password = 'yourAppPasswprd';			//gmailのSMTPを利用するためのアプリパスワード

	$From_mailAddress = 'fromEmail@example.cpm';//メールの送信元のメールアドレス
	$From_name = '';							//メールの送信元の名前
	$To_mailAddress = $_POST['email'];			//メールの送信先のメールアドレス
	$To_name = '';								//メールの送信先の名前

	$mail_subject = 'onboarding-contactのお問合せメール';								//メールのタイトル
	$mail_body = nl2br(htmlspecialchars($_POST['contact'], ENT_QUOTES, 'UTF-8'));;	 //メールの本文

	try {
		// $mail->CharSet = 'UTF-8';
		// $mail->Encoding = 'base64';

		// $mail->isSMTP();
		// $mail->Host = 'smtp.gmail.com';
		// $mail->SMTPAuth = true;
		// $mail->Username = $smtp_Username;
		// $mail->Password = $smtp_Password;
		// $mail->SMTPSecure = 'tls';
		// $mail->Port = 587;

		// $mail->setFrom($From_mailAddress, $From_name);
		// $mail->addAddress($To_mailAddress, $To_name);

		// $mail->isHTML();
		// $mail->Subject = $mail_subject;
		// $mail->Body = $mail_body;

		// $mail->send();
		// $mail_result = true;
	}catch(Exception $e) {
		echo("メールの送信に失敗しました: {$mail->ErrorInfo}");
	}

}else {									//バリデーションの結果に問題があれば入力画面へ
	include'components/input.php';
	if(!empty($_POST['input'])) {		//初めてページに訪れた時にはバリデーション結果を表示しない
		error($error_mes);
	}
}

?>

<!-- 描画するHTML -->
<p>お問い合わせありがとうございました。</p>
