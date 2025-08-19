<?php
require './enums/gender.php';
require './enums/prefecture.php';
require './enums/source.php';
?>
<form action='' method='POST'>
	<table>
		<tr>
			<td><span style='color: red'>※</span>内容は必須項目です</td>
			<td></td>
		</tr>
		<tr>
			<td>氏名<span style='color: red'>※</span></td>
			<td><input type='text' name='name' value='<?php echo(htmlspecialchars($_POST['name'])); ?>'></td>
		</tr>
		<tr>
			<td>フリガナ<span style='color: red'>※</span></td>
			<td><input type='text' name='name-kana' value='<?php echo(htmlspecialchars($_POST['name-kana'])); ?>' ></td>
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
				<select name='address_prefecture' >
					<?php
						if(!empty($_POST['address_prefecture']) || in_array($_POST['address_prefecture'], $prefectures)) {
							?><option value='' disabled>選択してください</option><?php
							foreach($prefectures as $prefecture) {
								if($prefecture === $_POST['address_prefecture']) {
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
			<td><input type='text' name='address-city' value='<?php echo(htmlspecialchars($_POST['address-city'])); ?>' ></td>
		</tr>
		<tr>
			<td>住所（それ以降の住所）<span style='color: red'>※</span></td>
			<td><input type='text' name='address-detail' value='<?php echo(htmlspecialchars($_POST['address-detail'])); ?>' ></td>
		</tr>
		<tr>
			<td>住所（建物）</td>
			<td><input type='text' name='address-building' value='<?php echo(htmlspecialchars($_POST['address-building'])); ?>'></td>
		</tr>
		<tr>
			<td>お問い合わせ内容<span style='color: red'>※</span></td>
			<td><textarea name='contact' ><?php  echo((htmlspecialchars($_POST['contact'])). PHP_EOL);?></textarea></td>
		</tr>
		<tr>
			<td>このフォームを知った経由（複数選択可）</td>
			<td>
				<?php
					foreach($sources as $key => $val) {
						if(!empty($_POST['source'][$key])){
							?><label style='display: block'><?php echo($val); ?><input type='checkbox' name='source[<?php echo($key); ?>]' value='<?php echo($val); ?>' checked></label><?
						}else {
							?><label style='display: block'><?php echo($val); ?><input type='checkbox' name='source[<?php echo($key); ?>]' value='<?php echo($val); ?>'></label><?
						}
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