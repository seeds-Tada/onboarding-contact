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
				<input name='contact' value='<?php echo(htmlspecialchars($_POST['contact'])); ?>' readonly>
			</td>
		</tr>

		<tr>
			<td>このフォームを知った経由（複数選択可）</td>
			<td>
				<?php
					if($_POST['source-family']!==''){
						?><input style='display: block' name='source-family' value='<?php echo(htmlspecialchars($_POST['source-family'])); ?>' readonly><?php
					}

					if($_POST['source-friend']!==''){
						?><input style='display: block' name='source-friend' value='<?php echo(htmlspecialchars($_POST['source-friend'])); ?>' readonly><?php
					}

					if($_POST['source-newspaper']!==''){
						?><input style='display: block' name='source-newspaper' value='<?php echo(htmlspecialchars($_POST['source-newspaper'])); ?>' readonly><?php
					}

					if($_POST['source-radio']!==''){
						?><input style='display: block' name='source-radio' value='<?php echo(htmlspecialchars($_POST['source-radio'])); ?>' readonly><?php
					}

					if($_POST['source-web']!==''){
						?><input style='display: block' name='source-web' value='<?php echo(htmlspecialchars($_POST['source-web'])); ?>' readonly><?php
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