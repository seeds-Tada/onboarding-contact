<?php
/* ----------------------------------------
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

// 実装
$bool = true;

$name_kanji = !empty($_POST['name-kanji']) ? $_POST['name-kanji'] : $bool = false;
$name_furigana = !empty($_POST['name-hurigana']) ? $_POST['name-hurigana'] : $bool = false;
$email = !empty($_POST['email']) ? $_POST['email'] : $bool = false;
$gender = !empty($_POST['gender']) ? $_POST['gender'] : $bool = false;

$address_number_1 = !empty($_POST['address-number-1']) ? $_POST['address-number-1'] : $bool = false;
$address_number_2 = !empty($_POST['address-number-2']) ? $_POST['address-number-2'] : $bool = false;
$address_todohuken = !empty($_POST['address-todohuken']) ? $_POST['address-todohuken'] : $bool = false;
$address_shikutyoson = !empty($_POST['address-shikutyoson']) ? $_POST['address-shikutyoson'] : $bool = false;
$address_soreikou = !empty($_POST['address-soreikou']) ? $_POST['address-soreikou'] : $bool = false;
$address_tatemono = !empty($_POST['address-tatemono']) ? $_POST['address-tatemono'] : "";		//必須ではない

$contact = !empty($_POST['contact']) ? $_POST['contact'] : $bool = false;

$keiyu_kazoku = !empty($_POST['keiyu-kazoku']) ? $_POST['keiyu-kazoku'] : "";		//必須ではない
$keiyu_tomodati = !empty($_POST['keiyu-tomodati']) ? $_POST['keiyu-tomodati'] : "";		//必須ではない
$keiyu_sinbun = !empty($_POST['keiyu-sinbun']) ? $_POST['keiyu-sinbun'] : "";		//必須ではない
$keiyu_radio = !empty($_POST['keiyu-radio']) ? $_POST['keiyu-radio'] : "";		//必須ではない
$keiyu_web = !empty($_POST['keiyu-web']) ? $_POST['keiyu-web'] : "";		//必須ではない

$input = array(
	"name_kanji" => $name_kanji,
	"name_hurigana" => $name_furigana,
	"email" => $email,
	"gender" => $gender,
	"address_number_1" => $address_number_1,
	"address_number_2" => $address_number_2,
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

if(!empty($_POST['send'])) {
	//echo"send";
	header("location: thanks.php");
}else if(!empty($_POST['back'])) {
	//echo"back";
	echo(input($input));
}else if($bool) {
	echo(check($input));
}else {
	echo(input($input));
}


function input($input) {
	$output = "
	<!-- 描画するHTML -->
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
					<td>*内容は必須項目です</td>
					<td></td>
				</tr>
				<tr>
					<td>氏名*</td>
					<td><input type='text' name='name-kanji' value='".$input['name_kanji']."' required></td>
				</tr>
				<tr>
					<td>フリガナ*</td>
					<td><input type='text' name='name-hurigana' value='".$input['name_hurigana']."' required></td>
				</tr>
				<tr>
					<td>メールアドレス*</td>
					<td><input type='email' name='email' value='".$input['email']."' required></td>
				</tr>
				<tr>
					<td>性別*</td>
					<td>";
						if($input['gender'] === 'female') {
							$output = $output . "
								<label>女性<input type='radio' name='gender' value='female' checked></label>
								<label>男性<input type='radio' name='gender' value='male'></label>
							";
						}else if($input['gender'] === 'male') {
							$output = $output . "
								<label>女性<input type='radio' name='gender' value='female'></label>
								<label>男性<input type='radio' name='gender' value='male' checked></label>
							";
						}else {
							$output = $output . "
								<label>女性<input type='radio' name='gender' value='female'></label>
								<label>男性<input type='radio' name='gender' value='male'></label>
							";
						}
					$output = $output . "</td>
				</tr>
				<tr>
					<td>住所（郵便番号）*</td>
					<td>
						<div>
							<input type='number' name='address-number-1' value='".$input['address_number_1']."' required> - <input type='number' name='address-number-2' value='".$input['address_number_2']."' required>
						</div>
					</td>
				</tr>
				<tr>
					<td>住所（都道府県）*</td>
					<td>
						<select name='address-todohuken' value='".$input['address_todohuken']."' required>
							<option value='' selected disabled>選択してください</option>
							<option value='北海道'>北海道</option>
							<option value='青森県'>青森県</option>
							<option value='岩手県'>岩手県</option>
							<option value='宮城県'>宮城県</option>
							<option value='秋田県'>秋田県</option>
							<option value='山形県'>山形県</option>
							<option value='福島県'>福島県</option>
							<option value='茨城県'>茨城県</option>
							<option value='栃木県'>栃木県</option>
							<option value='群馬県'>群馬県</option>
							<option value='埼玉県'>埼玉県</option>
							<option value='千葉県'>千葉県</option>
							<option value='東京都'>東京都</option>
							<option value='神奈川県'>神奈川県</option>
							<option value='山梨県'>山梨県</option>
							<option value='長野県'>長野県</option>
							<option value='新潟県'>新潟県</option>
							<option value='富山県'>富山県</option>
							<option value='石川県'>石川県</option>
							<option value='福井県'>福井県</option>
							<option value='岐阜県'>岐阜県</option>
							<option value='静岡県'>静岡県</option>
							<option value='愛知県'>愛知県</option>
							<option value='三重県'>三重県</option>
							<option value='滋賀県'>滋賀県</option>
							<option value='京都府'>京都府</option>
							<option value='大阪府'>大阪府</option>
							<option value='兵庫県'>兵庫県</option>
							<option value='奈良県'>奈良県</option>
							<option value='和歌山県'>和歌山県</option>
							<option value='鳥取県'>鳥取県</option>
							<option value='香川県'>香川県</option>
							<option value='愛媛県'>愛媛県</option>
							<option value='高知県'>高知県</option>
							<option value='福岡県'>福岡県</option>
							<option value='佐賀県'>佐賀県</option>
							<option value='長崎県'>長崎県</option>
							<option value='熊本県'>熊本県</option>
							<option value='大分県'>大分県</option>
							<option value='宮城県'>宮崎県</option>
							<option value='鹿児島県'>鹿児島県</option>
							<option value='沖縄県'>沖縄県</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>住所（市区町村）*</td>
					<td><input type='text' name='address-shikutyoson' value='".$input['address_shikutyoson']."' required></td>
				</tr>
				<tr>
					<td>住所（それ以降の住所）*</td>
					<td><input type='text' name='address-soreikou' value='".$input['address_soreikou']."' required></td>
				</tr>
				<tr>
					<td>住所（建物）</td>
					<td><input type='text' name='address-tatemono' value='".$input['address_tatemono']."'></td>
				</tr>
				<tr>
					<td>お問い合わせ内容*</td>
					<td><textarea name='contact' required>".$input['contact']."</textarea></td>
				</tr>
				<tr>
					<td>このフォームを知った経由（複数選択可）</td>
					<td>";
					if($input['keiyu_kazoku']!==''){
						$output = $output . "<label>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて' checked></label>";
					}else {
						$output = $output . "<label>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて'></label>";
					}

					if($input['keiyu_tomodati']!==''){
						$output = $output . "<label>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて' checked></label>";
					}else {
						$output = $output . "<label>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて'></label>";
					}

					if($input['keiyu_sinbun']!==''){
						$output = $output . "<label>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞' checked></label>";
					}else {
						$output = $output . "<label>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞'></label>";
					}

					if($input['keiyu_radio']!==''){
						$output = $output . "<label>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ' checked></label>";
					}else {
						$output = $output . "<label>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ'></label>";
					}

					if($input['keiyu_web']!==''){
						$output = $output . "<label>Web<input type='checkbox' name='keiyu-web' value='web' checked></label>";
					}else {
						$output = $output . "<label>Web<input type='checkbox' name='keiyu-web' value='web'></label>";
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
							<input name='name-kanji' value='"."{$input['name_kanji']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>フリガナ</td>
						<td>
							<input name='name-hurigana' value='"."{$input['name_hurigana']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>メールアドレス</td>
						<td>
							<input name='email' value='"."{$input['email']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>性別</td>
						<td>
							<input name='gender' value='"."{$input['gender']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>住所（郵便番号）</td>
						<td>
							<input name='address-number-1' value='"."{$input['address_number_1']}"."' readonly></input> - <input name='address-number-2' value='"."{$input['address_number_2']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>住所（都道府県）</td>
						<td>
							<input name='address-todohuken' value='"."{$input['address_todohuken']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>住所（市区町村）</td>
						<td>
							<input name='address-shikutyoson' value='"."{$input['address_shikutyoson']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>住所（それ以降の住所）</td>
						<td>
							<input name='address-soreikou' value='"."{$input['address_soreikou']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>住所（建物）</td>
						<td>
							<input name='address-tatemono' value='"."{$input['address_tatemono']}"."' readonly></input>
						</td>
					</tr>
					<tr>
						<td>お問合せ内容</td>
						<td>
							<input name='contact' value='"."{$input['contact']}"."' readonly></input>
						</td>
					</tr>

					<tr>
						<td>このフォームを知った経由（複数選択可）</td>
						<td>";
							if($input['keiyu_kazoku']!==''){
								$output = $output . "<input name='keiyu-kazoku' value='"."{$input['keiyu_kazoku']}"."' readonly></input>";
							}else {
								$output = $output . "<input name='keiyu-kazoku' readonly></input>";
							}

							if($input['keiyu_tomodati']!==''){
								$output = $output . "<input name='keiyu-tomodati' value='"."{$input['keiyu_tomodati']}"."' readonly></input>";
							}else {
								$output = $output . "<input name='keiyu-tomodati' readonly></input>";
							}
	
							if($input['keiyu_sinbun']!==''){
								$output = $output . "<input name='keiyu-sinbun' value='"."{$input['keiyu_sinbun']}"."' readonly></input>";
							}else {
								$output = $output . "<input name='keiyu-sinbun' readonly></input>";
							}

							if($input['keiyu_radio']!==''){
								$output = $output . "<input name='keiyu-radio' value='"."{$input['keiyu_radio']}"."' readonly></input>";
							}else {
								$output = $output . "<input name='keiyu-radio' readonly></input>";
							}

							if($input['keiyu_web']!==''){
								$output = $output . "<input name='keiyu-web' value='"."{$input['keiyu_web']}"."' readonly></input>";
							}else {
								$output = $output . "<td nhidden><input ame='keiyu-web' readonly></input>";
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
