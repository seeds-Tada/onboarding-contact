<?php
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
								}else if($input['gender'] === "female"){
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
		</html>
	";

	return($output);
}
