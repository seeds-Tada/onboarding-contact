<?php
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