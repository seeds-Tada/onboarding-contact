<?php
require_once 'private/bootstrap.php';
require_once 'private/database.php';
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

$contacts = array(
	"name_kanji" => $name_kanji,
	"name_hurigana" => $name_furigana,
	"email" => $email,
	"gender" => $gender,
	"address_post" => $address_post_1.$address_post_2,
	"address_todohuken" => $address_todohuken,
	"address_shikutyoson" => $address_shikutyoson,
	"address_soreikou" => $address_soreikou,
	"address_tatemono" => $address_tatemono,
	"contact" => $contact
);

$keiyu = array(
	"keiyu_kazoku" => $keiyu_kazoku,
	"keiyu_tomodati" => $keiyu_tomodati,
	"keiyu_sinbun" => $keiyu_sinbun,
	"keiyu_radio" => $keiyu_radio,
	"keiyu_web" => $keiyu_web
);

$connection = connectDB();

try {
	$sql = "INSERT INTO contacts(kanji, hurigana, email, gender, post, todohuken, shikutyoson, soreikou, tatemono, contact) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param(
		"ssssssssss",
		$contacts['name_kanji'],
		$contacts['name_hurigana'],
		$contacts['email'],
		$contacts['gender'],
		$contacts['address_post'],
		$contacts['address_todohuken'],
		$contacts['address_shikutyoson'],
		$contacts['address_soreikou'],
		$contacts['address_tatemono'],
		$contacts['contact']
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

	<br>

	<div>
		<?php
			if(empty($_POST)) {
				echo("なし");
			}else {
				foreach($input as $key => $val) {
					echo($key . " : " . $val ."<br>");
				}
				echo("contactsテーブルで最後にインサートされた行のid: ".$insert_id."<br>");
			}
		?>
	</div>
</body>
</html>