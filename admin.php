<?php
require_once 'private/bootstrap.php';
require_once 'private/database.php';
// 実装
//http://localhost/admin.php

$keiyuArray = [];
$contactArray = [];
$connection = connectDB();
try {
	$keiyuArray = [];
	$sql = "SELECT * FROM sources;";
	$stmt = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_assoc($stmt)) {
		$keiyuArray[] = $row;
	}
	$stmt->close();

	$contactArray = [];
	$sql = "SELECT * FROM contacts;";
	$stmt = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_assoc($stmt)) {
		$row['sources'] = [];
		foreach($keiyuArray as $keiyu) {
			if($row['id'] === $keiyu['contacts_id']) {
				array_push($row['sources'], $keiyu['source']);
			}
		}
		$contactArray[] = $row;
	}
	$stmt->close();
}catch(PDOException $e) {
	echo("error");
}catch(Exception $e) {
	echo("error");
	echo($e);
}
?>

<!-- 描画するHTML -->
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>onboarding-contact</title>
</head>
<body>
	<div>
		<h1>お問合せ内容一覧画面</h1>
	</div>
	<div>
		
		<table border="1">
			<tr>
				<th>氏名</th>
				<th>フリガナ</th>
				<th>メールアドレス</th>
				<th>性別</th>
				<th>郵便番号</th>
				<th>都道府県</th>
				<th>市区町村</th>
				<th>それ以降</th>
				<th>建物</th>
				<th>お問い合わせ内容</th>
				<th>経由</th>
			</tr>
			<?php
				foreach($contactArray as $result) {
					echo("<tr>");
					foreach($result as $key => $val) {
						if($key !== 'id') {
							if($key !== 'sources') {
								if($key !== 'post') {
									echo("<td>" . htmlspecialchars($val) . "</td>");
								}else {
									echo("<td>" . htmlspecialchars(substr_replace($val, "-", 3, 0)) . "</td>");
								}
							}else {
								foreach($val as $val_source){
									echo("<td style='display: block'>" . htmlspecialchars($val_source) . "</td>");
								}
							}
						}
					}
					echo("</tr>");
				}
			?>
			<tr>

			</tr>
		</table>
	</div>
</body>
</html>