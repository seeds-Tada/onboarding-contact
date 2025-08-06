<form action='' method='POST'>
	<table>
		<tr>
			<td>氏名</td>
			<td>
				<input name='name-kanji' value='<?php echo(htmlspecialchars($_POST['name-kanji'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>フリガナ</td>
			<td>
				<input name='name-hurigana' value='<?php echo(htmlspecialchars($_POST['name-hurigana'])); ?>' readonly>
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
					if($_POST['gender'] === "male") {
						?>
						<input name='gender' value='male' hidden>
						<input value='男性' readonly>
						<?php
					}else if($_POST['gender'] === "female"){
						?>
						<input name='gender' value='female' hidden>
						<input value='女性' readonly>
						<?php
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
				<input name='address-todohuken' value='<?php echo(htmlspecialchars($_POST['address-todohuken'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（市区町村）</td>
			<td>
				<input name='address-shikutyoson' value='<?php echo(htmlspecialchars($_POST['address-shikutyoson'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（それ以降の住所）</td>
			<td>
				<input name='address-soreikou' value='<?php echo(htmlspecialchars($_POST['address-soreikou'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>住所（建物）</td>
			<td>
				<input name='address-tatemono' value='<?php echo(htmlspecialchars($_POST['address-tatemono'])); ?>' readonly>
			</td>
		</tr>
		<tr>
			<td>お問合せ内容</td>
			<td>
				<input name='contact' value='<?php echo(htmlspecialchars($_POST['contact'])); ?>' readonly>
			</td>
		</tr>

		<tr>
			<td>このフォームを知った経由（複数選択可）</td>
			<td>
				<?php
					if($_POST['keiyu-kazoku']!==''){
						?><input style='display: block' name='keiyu-kazoku' value='<?php echo(htmlspecialchars($_POST['keiyu-kazoku'])); ?>' readonly><?php
					}

					if($_POST['keiyu-tomodati']!==''){
						?><input style='display: block' name='keiyu-tomodati' value='<?php echo(htmlspecialchars($_POST['keiyu-tomodati'])); ?>' readonly><?php
					}

					if($_POST['keiyu-sinbun']!==''){
						?><input style='display: block' name='keiyu-sinbun' value='<?php echo(htmlspecialchars($_POST['keiyu-sinbun'])); ?>' readonly><?php
					}

					if($_POST['keiyu-radio']!==''){
						?><input style='display: block' name='keiyu-radio' value='<?php echo(htmlspecialchars($_POST['keiyu-radio'])); ?>' readonly><?php
					}

					if($_POST['keiyu-web']!==''){
						?><input style='display: block' name='keiyu-web' value='<?php echo(htmlspecialchars($_POST['keiyu-web'])); ?>' readonly><?php
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