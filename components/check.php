<?php
function check() {
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
								<input name='name-kanji' value='".htmlspecialchars($_POST['name-kanji'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>フリガナ</td>
							<td>
								<input name='name-hurigana' value='".htmlspecialchars($_POST['name-hurigana'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>メールアドレス</td>
							<td>
								<input name='email' value='".htmlspecialchars($_POST['email'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>性別</td>
							<td>";
								if($_POST['gender'] === "male") {
									$output = $output . "
									<input name='gender' value='male' hidden>
									<input value='男性' readonly>
									";
								}else if($_POST['gender'] === "female"){
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
								<input name='address-post-1' value='".htmlspecialchars($_POST['address-post-1'])."' readonly> - <input name='address-post-2' value='".htmlspecialchars($_POST['address-post-2'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>住所（都道府県）</td>
							<td>
								<input name='address-todohuken' value='".htmlspecialchars($_POST['address-todohuken'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>住所（市区町村）</td>
							<td>
								<input name='address-shikutyoson' value='".htmlspecialchars($_POST['address-shikutyoson'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>住所（それ以降の住所）</td>
							<td>
								<input name='address-soreikou' value='".htmlspecialchars($_POST['address-soreikou'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>住所（建物）</td>
							<td>
								<input name='address-tatemono' value='".htmlspecialchars($_POST['address-tatemono'])."' readonly>
							</td>
						</tr>
						<tr>
							<td>お問合せ内容</td>
							<td>
								<input name='contact' value='".htmlspecialchars($_POST['contact'])."' readonly>
							</td>
						</tr>

						<tr>
							<td>このフォームを知った経由（複数選択可）</td>
							<td>";
								if($_POST['keiyu-kazoku']!==''){
									$output = $output . "<input style='display: block' name='keiyu-kazoku' value='".htmlspecialchars($_POST['keiyu-kazoku'])."' readonly>";
								}

								if($_POST['keiyu-tomodati']!==''){
									$output = $output . "<input style='display: block' name='keiyu-tomodati' value='".htmlspecialchars($_POST['keiyu-tomodati'])."' readonly>";
								}
	
								if($_POST['keiyu-sinbun']!==''){
									$output = $output . "<input style='display: block' name='keiyu-sinbun' value='".htmlspecialchars($_POST['keiyu-sinbun'])."' readonly>";
								}

								if($_POST['keiyu-radio']!==''){
									$output = $output . "<input style='display: block' name='keiyu-radio' value='".htmlspecialchars($_POST['keiyu-radio'])."' readonly>";
								}

								if($_POST['keiyu-web']!==''){
									$output = $output . "<input style='display: block' name='keiyu-web' value='".htmlspecialchars($_POST['keiyu-web'])."' readonly>";
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
