<?php
/* ----------------------------------------
 * 必要なファイルを読み込む
 * ---------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

// 実装

?>

<!-- 描画するHTML -->
<!DOCTYPE html>
<html lang="js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>onboarding-contact</title>
</head>
<body>
	<div>
		<form action="thanks.php" method="POST">
			<table>
				<tr>
					<td>*内容は必須項目です</td>
					<td></td>
				</tr>
				<tr>
					<td>氏名*</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>フリガナ*</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>メールアドレス*</td>
					<td><input type="email"></td>
				</tr>
				<tr>
					<td>性別*</td>
					<td>
						<label>女性<input type="radio" name="gender"></label>
						<label>男性<input type="radio" name="gender"></label>
					</td>
				</tr>
				<tr>
					<td>住所（郵便番号）*</td>
					<td>
						<div>
							<input type="number"> - <input type="number">
						</div>
					</td>
				</tr>
				<tr>
					<td>住所（都道府県）*</td>
					<td>
						<select>
							<option selected disabled>選択してください</option>
							<option>北海道</option>
							<option>青森県</option>
							<option>岩手県</option>
							<option>宮城県</option>
							<option>秋田県</option>
							<option>山形県</option>
							<option>福島県</option>
							<option>茨城県</option>
							<option>栃木県</option>
							<option>群馬県</option>
							<option>埼玉県</option>
							<option>千葉県</option>
							<option>東京都</option>
							<option>神奈川県</option>
							<option>山梨県</option>
							<option>長野県</option>
							<option>新潟県</option>
							<option>富山県</option>
							<option>石川県</option>
							<option>福井県</option>
							<option>岐阜県</option>
							<option>静岡県</option>
							<option>愛知県</option>
							<option>三重県</option>
							<option>滋賀県</option>
							<option>京都府</option>
							<option>大阪府</option>
							<option>兵庫県</option>
							<option>奈良県</option>
							<option>和歌山県</option>
							<option>鳥取県</option>
							<option>香川県</option>
							<option>愛媛県</option>
							<option>高知県</option>
							<option>福岡県</option>
							<option>佐賀県</option>
							<option>長崎県</option>
							<option>熊本県</option>
							<option>大分県</option>
							<option>宮崎県</option>
							<option>鹿児島県</option>
							<option>沖縄県</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>住所（市区町村）*</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>住所（それ以降の住所）*</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>住所（建物）</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>お問い合わせ内容*</td>
					<td><textarea></textarea></td>
				</tr>
				<tr>
					<td>このフォームを知った経由（複数選択可）</td>
					<td>
						<label>家族から聞いて<input type="checkbox"></label>
						<label>友達から聞いて<input type="checkbox"></label>
						<label>新聞<input type="checkbox"></label>
						<label>ラジオ<input type="checkbox"></label>
						<label>Web<input type="checkbox"></label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit">
					</td>
				</tr>
			</table>
		</form>
	</div>    
</body>
</html>