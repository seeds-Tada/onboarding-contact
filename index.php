<?php
/* ----------------------------------------
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';
require_once 'validation.php';

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

$error_mes = validatioin();

if(!empty($_POST['send'])) {
	$GLOBALS["thanks_post"] = $_POST;
	//header("location: thanks.php");
	include'thanks.php';
}else if(!empty($_POST['back'])) {
	echo(input($input));
}else if(!$bool) {	//テスト中
	if(count($error_mes) !== 0) {
		$output = "";
		foreach($error_mes as $mes) {
			$output = $output . "<div>".$mes."</div><br>";
		}
		echo($output);
	}
	//echo(input($input));
}else {
	echo(check($input));
}

function input($input) {

	$todohuken_array = [
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
	];

	$output = "
		<!DOCTYPE html>
		<html lang='ja'>
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>onboarding-contact</title>
		</head>
		<body>
			<div>
				<form action='' method='POST'>
					<table>
						<tr>
							<td><span style='color: red'>※</span>内容は必須項目です</td>
							<td></td>
						</tr>
						<tr>
							<td>氏名<span style='color: red'>※</span></td>
							<td><input type='text' name='name-kanji' value='".htmlspecialchars($input['name_kanji'])."' ></td>
						</tr>
						<tr>
							<td>フリガナ<span style='color: red'>※</span></td>
							<td><input type='text' name='name-hurigana' value='".htmlspecialchars($input['name_hurigana'])."' ></td>
						</tr>
						<tr>
							<td>メールアドレス<span style='color: red'>※</span></td>
							<td><input type='email' name='email' value='".htmlspecialchars($input['email'])."' ></td>
						</tr>
						<tr>
							<td>性別<span style='color: red'>※</span></td>
							<td>";
								if($input['gender'] === 'female') {
									$output = $output . "
										<label>女性<input type='radio' name='gender' value='female' checked ></label>
										<label>男性<input type='radio' name='gender' value='male' ></label>
									";
								}else if($input['gender'] === 'male') {
									$output = $output . "
										<label>女性<input type='radio' name='gender' value='female' ></label>
										<label>男性<input type='radio' name='gender' value='male' checked ></label>
									";
								}else {
									$output = $output . "
										<label>女性<input type='radio' name='gender' value='female' ></label>
										<label>男性<input type='radio' name='gender' value='male' ></label>
									";
								}
							$output = $output . "</td>
						</tr>
						<tr>
							<td>住所（郵便番号）<span style='color: red'>※</span></td>
							<td>
								<div>
									<input type='number' name='address-post-1' value='".htmlspecialchars($input['address_post_1'])."' > - <input type='number' name='address-post-2' value='".htmlspecialchars($input['address_post_2'])."' >
								</div>
							</td>
						</tr>
						<tr>
							<td>住所（都道府県）<span style='color: red'>※</span></td>
							<td>";
							$output = $output . "<select name='address-todohuken' >";
								if(!empty($input['address_todohuken']) || in_array($input['address_todohuken'], $todohuken_array)) {
									$output = $output . "<option value='' disabled>選択してください</option>";
									foreach($todohuken_array as $todohuken) {
										if($todohuken === $input['address_todohuken']) {
											$output = $output . "<option value='".$todohuken."' selected>".$todohuken."</option>";
										}else {
											$output = $output . "<option value='".$todohuken."'>".$todohuken."</option>";
										}
									}
								}else {
									$output = $output . "<option value='' selected disabled>選択してください</option>";
									foreach($todohuken_array as $todohuken) {
										$output = $output . "<option value='".$todohuken."'>".$todohuken."</option>";
									}
								}
							$output = $output . "</select>";
							$output = $output . "</td>
						</tr>
						<tr>
							<td>住所（市区町村）<span style='color: red'>※</span></td>
							<td><input type='text' name='address-shikutyoson' value='".htmlspecialchars($input['address_shikutyoson'])."' ></td>
						</tr>
						<tr>
							<td>住所（それ以降の住所）<span style='color: red'>※</span></td>
							<td><input type='text' name='address-soreikou' value='".htmlspecialchars($input['address_soreikou'])."' ></td>
						</tr>
						<tr>
							<td>住所（建物）</td>
							<td><input type='text' name='address-tatemono' value='".htmlspecialchars($input['address_tatemono'])."'></td>
						</tr>
						<tr>
							<td>お問い合わせ内容<span style='color: red'>※</span></td>
							<td><textarea name='contact' >".htmlspecialchars($input['contact'])."</textarea></td>
						</tr>
						<tr>
							<td>このフォームを知った経由（複数選択可）</td>
							<td>";
							if($input['keiyu_kazoku']!==''){
								$output = $output . "<label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて'></label>";
							}

							if($input['keiyu_tomodati']!==''){
								$output = $output . "<label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて'></label>";
							}

							if($input['keiyu_sinbun']!==''){
								$output = $output . "<label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞'></label>";
							}

							if($input['keiyu_radio']!==''){
								$output = $output . "<label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ'></label>";
							}

							if($input['keiyu_web']!==''){
								$output = $output . "<label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web'></label>";
							}
							$output = $output . "</td>
						</tr>
						<tr>
							<td>
								<input type='submit'>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</body>
		</html>
	";
	return($output);
}

function check($input) {
	$output = "
	<!DOCTYPE html>
	<html lang='ja'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>onboarding-contact</title>
	</head>
	<body>
		<div>
			<form action='' method='POST'>
				<table>
					<tr>
						<td>氏名</td>
						<td>
							<input name='name-kanji' value='".htmlspecialchars($input['name_kanji'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>フリガナ</td>
						<td>
							<input name='name-hurigana' value='".htmlspecialchars($input['name_hurigana'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>メールアドレス</td>
						<td>
							<input name='email' value='".htmlspecialchars($input['email'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>性別</td>
						<td>";
							if($input['gender'] === "male") {
								$output = $output . "
								<input name='gender' value='male' hidden>
								<input value='男性' readonly>
								";
							}else {
								$output = $output . "
									<input name='gender' value='female' hidden>
									<input value='女性' readonly>
								";
							}
						$output = $output . "</td>
					</tr>
					<tr>
						<td>住所（郵便番号）</td>
						<td>
							<input name='address-post-1' value='".htmlspecialchars($input['address_post_1'])."' readonly> - <input name='address-post-2' value='".htmlspecialchars($input['address_post_2'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>住所（都道府県）</td>
						<td>
							<input name='address-todohuken' value='".htmlspecialchars($input['address_todohuken'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>住所（市区町村）</td>
						<td>
							<input name='address-shikutyoson' value='".htmlspecialchars($input['address_shikutyoson'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>住所（それ以降の住所）</td>
						<td>
							<input name='address-soreikou' value='".htmlspecialchars($input['address_soreikou'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>住所（建物）</td>
						<td>
							<input name='address-tatemono' value='".htmlspecialchars($input['address_tatemono'])."' readonly>
						</td>
					</tr>
					<tr>
						<td>お問合せ内容</td>
						<td>
							<input name='contact' value='".htmlspecialchars($input['contact'])."' readonly>
						</td>
					</tr>

					<tr>
						<td>このフォームを知った経由（複数選択可）</td>
						<td>";
							if($input['keiyu_kazoku']!==''){
								$output = $output . "<input style='display: block' name='keiyu-kazoku' value='".htmlspecialchars($input['keiyu_kazoku'])."' readonly>";
							}

							if($input['keiyu_tomodati']!==''){
								$output = $output . "<input style='display: block' name='keiyu-tomodati' value='".htmlspecialchars($input['keiyu_tomodati'])."' readonly>";
							}
	
							if($input['keiyu_sinbun']!==''){
								$output = $output . "<input style='display: block' name='keiyu-sinbun' value='".htmlspecialchars($input['keiyu_sinbun'])."' readonly>";
							}

							if($input['keiyu_radio']!==''){
								$output = $output . "<input style='display: block' name='keiyu-radio' value='".htmlspecialchars($input['keiyu_radio'])."' readonly>";
							}

							if($input['keiyu_web']!==''){
								$output = $output . "<input style='display: block' name='keiyu-web' value='".htmlspecialchars($input['keiyu_web'])."' readonly>";
							}

							$output = $output . "
						</td>
					</tr>
					
					<tr>
						<td>
							<input type='submit' name='back' value='戻る'>
						</td>
						<td>
							<input type='submit' name='send' value='送信'>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
	</html>";

	return($output);
}
