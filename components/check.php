<?php
require './enums/gender.php';
require './enums/prefecture.php';
require './enums/source.php';
?>
<form action='' method='POST'>
	<table>
		<tr>
			<td>氏名</td>
			<td>
				<input name='name' value='<?php echo(htmlspecialchars($_POST['name'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>フリガナ</td>
			<td>
				<input name='name-kana' value='<?php echo(htmlspecialchars($_POST['name-kana'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td>
				<input name='email' value='<?php echo(htmlspecialchars($_POST['email'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>性別</td>
			<td>
				<?php
					foreach($enums_genders as $key => $val) {
						if($_POST['gender'] === $key){
							?>
							<input name='gender' value='<?php echo($key); ?>' hidden>
							<input value='<?php echo($val); ?>' readonly>
							<?php
						}
					}
				?>
			</td>
		</tr>
		<tr>
			<td>住所（郵便番号）</td>
			<td>
				<input name='address-post-1' value='<?php echo(htmlspecialchars($_POST['address-post-1'])); ?>' readonly> - <input name='address-post-2' value='<?php echo(htmlspecialchars($_POST['address-post-2'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（都道府県）</td>
			<td>
				<input name='address_prefecture' value='<?php echo(htmlspecialchars($_POST['address_prefecture'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（市区町村）</td>
			<td>
				<input name='address-city' value='<?php echo(htmlspecialchars($_POST['address-city'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（それ以降の住所）</td>
			<td>
				<input name='address-detail' value='<?php echo(htmlspecialchars($_POST['address-detail'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（建物）</td>
			<td>
				<input name='address-building' value='<?php echo(htmlspecialchars($_POST['address-building'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>お問合せ内容</td>
			<td>
				<textarea name='contact' readonly><?php echo(htmlspecialchars($_POST['contact']) . PHP_EOL); ?></textarea>
			</td>
		</tr>

		<tr>
			<td>このフォームを知った経由（複数選択可）</td>
			<td>
				<?php
					foreach($enums_sources as $key => $val) {
						if(!empty($_POST['source'][$key])){
							?><input style='display: block' name='source[<?php echo($key); ?>]' value='<?php echo($val); ?>' readonly><?php
						}
					}
				?>
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