<?php
require './enums/prefecture.php';
?>
<form action='' method='POST'>
	<table>
		<tr>
			<td><span style='color: red'>※</span>内容は必須項目です</td>
			<td></td>
		</tr>
		<tr>
			<td>氏名<span style='color: red'>※</span></td>
			<td><input type='text' name='name-kanji' value='<?php echo(htmlspecialchars($_POST['name-kanji'])); ?>'></td>
		</tr>
		<tr>
			<td>フリガナ<span style='color: red'>※</span></td>
			<td><input type='text' name='name-hurigana' value='<?php echo(htmlspecialchars($_POST['name-hurigana'])); ?>' ></td>
		</tr>
		<tr>
			<td>メールアドレス<span style='color: red'>※</span></td>
			<td><input type='email' name='email' value='<?php echo(htmlspecialchars($_POST['email'])); ?>' ></td>
		</tr>
		<tr>
			<td>性別<span style='color: red'>※</span></td>
			<td>
				<?php
					if($_POST['gender'] === 'female') {
						?>
						<label>女性<input type='radio' name='gender' value='female' checked ></label>
						<label>男性<input type='radio' name='gender' value='male' ></label>
						<?php
					}else if($_POST['gender'] === 'male') {
						?>
						<label>女性<input type='radio' name='gender' value='female' ></label>
						<label>男性<input type='radio' name='gender' value='male' checked ></label>
						<?php
					}else {
						?>
						<label>女性<input type='radio' name='gender' value='female' ></label>
						<label>男性<input type='radio' name='gender' value='male' ></label>
						<?php
					}
				?>
			</td>
		</tr>
		<tr>
			<td>住所（郵便番号）<span style='color: red'>※</span></td>
			<td>
				<div>
					<input type='text' name='address-post-1' value='<?php echo(htmlspecialchars($_POST['address-post-1'])); ?>' > - <input type='text' name='address-post-2' value='<?php echo(htmlspecialchars($_POST['address-post-2'])); ?>' >
				</div>
			</td>
		</tr>
		<tr>
			<td>住所（都道府県）<span style='color: red'>※</span></td>
			<td>
				<select name='address-todohuken' >
					<?php
						if(!empty($_POST['address-todohuken']) || in_array($_POST['address-todohuken'], $prefectures)) {
							?><option value='' disabled>選択してください</option><?php
							foreach($prefectures as $prefecture) {
								if($prefecture === $_POST['address-todohuken']) {
									?><option value='<?php echo($prefecture); ?>' selected><?php echo($prefecture); ?></option><?php
								}else {
									?><option value='<?php echo($prefecture); ?>'><?php echo($prefecture); ?></option><?php
								}
							}
						}else {
							?><option value='' selected disabled>選択してください</option><?php
							foreach($prefectures as $prefecture) {
								?><option value='<?php echo($prefecture); ?>'><?php echo($prefecture); ?></option><?php
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>住所（市区町村）<span style='color: red'>※</span></td>
			<td><input type='text' name='address-shikutyoson' value='<?php echo(htmlspecialchars($_POST['address-shikutyoson'])); ?>' ></td>
		</tr>
		<tr>
			<td>住所（それ以降の住所）<span style='color: red'>※</span></td>
			<td><input type='text' name='address-soreikou' value='<?php echo(htmlspecialchars($_POST['address-soreikou'])); ?>' ></td>
		</tr>
		<tr>
			<td>住所（建物）</td>
			<td><input type='text' name='address-tatemono' value='<?php echo(htmlspecialchars($_POST['address-tatemono'])); ?>'></td>
		</tr>
		<tr>
			<td>お問い合わせ内容<span style='color: red'>※</span></td>
			<td><textarea name='contact' ><?php  echo(htmlspecialchars($_POST['contact']));?></textarea></td>
		</tr>
		<tr>
			<td>このフォームを知った経由（複数選択可）</td>
			<td>
				<?php
					if($_POST['keiyu-kazoku']!==''){
						?><label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて' checked></label><?
					}else {
						?><label style='display: block'>家族から聞いて<input type='checkbox' name='keiyu-kazoku' value='家族から聞いて'></label><?
					}

					if($_POST['keiyu-tomodati']!==''){
						?><label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて' checked></label><?php
					}else {
						?><label style='display: block'>友達から聞いて<input type='checkbox' name='keiyu-tomodati' value='友達から聞いて'></label><?php
					}

					if($_POST['keiyu-sinbun']!==''){
						?><label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞' checked></label><?php
					}else {
						?><label style='display: block'>新聞<input type='checkbox' name='keiyu-sinbun' value='新聞'></label><?php
					}

					if($_POST['keiyu-radio']!==''){
						?><label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ' checked></label><?php
					}else {
						?><label style='display: block'>ラジオ<input type='checkbox' name='keiyu-radio' value='ラジオ'></label><?php
					}

					if($_POST['keiyu-web']!==''){
						?><label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web' checked></label><?php
					}else {
						?><label style='display: block'>Web<input type='checkbox' name='keiyu-web' value='web'></label><?php
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<input type='submit' name='input'>
			</td>
		</tr>
	</table>
</form>