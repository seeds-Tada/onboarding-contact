<?php
function input() {
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
							<td><input type='text' name='name-kanji' value='".htmlspecialchars($_POST['name-kanji'])."' ></td>
						</tr>
						<tr>
							<td>フリガナ<span style='color: red'>※</span></td>
							<td><input type='text' name='name-hurigana' value='".htmlspecialchars($_POST['name-hurigana'])."' ></td>
						</tr>
						<tr>
							<td>メールアドレス<span style='color: red'>※</span></td>
							<td><input type='email' name='email' value='".htmlspecialchars($_POST['email'])."' ></td>
						</tr>
						<tr>
							<td>性別<span style='color: red'>※</span></td>
							<td>";
								if($_POST['gender'] === 'female') {
									$output = $output . "
										<label>女性<input type='radio' name='gender' value='female' checked ></label>
										<label>男性<input type='radio' name='gender' value='male' ></label>
									";
								}else if($_POST['gender'] === 'male') {
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
									<input type='text' name='address-post-1' value='".htmlspecialchars($_POST['address-post-1'])."' > - <input type='text' name='address-post-2' value='".htmlspecialchars($_POST['address-post-2'])."' >
								</div>
							</td>
						</tr>
						<tr>
							<td>住所（都道府県）<span style='color: red'>※</span></td>
							<td>";
							$output = $output . "<select name='address-todohuken' >";
								if(!empty($_POST['address-todohuken']) || in_array($_POST['address-todohuken'], $todohuken_array)) {
									$output = $output . "<option value='' disabled>選択してください</option>";
									foreach($todohuken_array as $todohuken) {
										if($todohuken === $_POST['address-todohuken']) {
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
							<td><input type='text' name='address-shikutyoson' value='".htmlspecialchars($_POST['address-shikutyoson'])."' ></td>
						</tr>
						<tr>
							<td>住所（それ以降の住所）<span style='color: red'>※</span></td>
							<td><input type='text' name='address-soreikou' value='".htmlspecialchars($_POST['address-soreikou'])."' ></td>
						</tr>
						<tr>
							<td>住所（建物）</td>
							<td><input type='text' name='address-tatemono' value='".htmlspecialchars($_POST['address-tatemono'])."'></td>
						</tr>
						<tr>
							<td>お問い合わせ内容<span style='color: red'>※</span></td>
							<td><textarea name='contact' >".htmlspecialchars($_POST['contact'])."</textarea></td>
						</tr>
						<tr>
							<td>このフォームを知った経由（複数選択可）</td>
							<td>";
							if($_POST['keiyu-kazoku']!==''){
								$output = $output . "<label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて'></label>";
							}

							if($_POST['keiyu-tomodati']!==''){
								$output = $output . "<label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて'></label>";
							}

							if($_POST['keiyu-sinbun']!==''){
								$output = $output . "<label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞'></label>";
							}

							if($_POST['keiyu-radio']!==''){
								$output = $output . "<label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ'></label>";
							}

							if($_POST['keiyu-web']!==''){
								$output = $output . "<label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web' checked></label>";
							}else {
								$output = $output . "<label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web'></label>";
							}
							$output = $output . "</td>
						</tr>
						<tr>
							<td>
								<input type='submit' name='input'>
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