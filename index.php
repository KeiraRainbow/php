<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$role = '';
	?>
	<form action="" method="POST">
		<p>логин
			<input type="text" name="login">
		</p>
		<p>пароль
			<input type="password" name="pass">
		</p>
		<p>
			<input type="submit" name="butt" value="войти">
		</p>
	</form>
	<?php
		$lgn = $_POST['login'];
		$psw = $_POST['pass'];

		$query = 'SELECT * FROM users';
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		while ($row = mysqli_fetch_assoc($result)) {
			/*printf("айди %s <br> логин %s <br> пароль %s <br>", $row["id"], $row["login"], $row["pass"]);*/
			if ($lgn == $row['login'] && $psw == $row['pass']){
				echo "вы успешно авторизировались";
				$role = 'admin';
				break;
			}
		}
		if ($role == '' && isset($_POST['butt'])) {
			echo "пользователя не существует. зарегистрируйтесь";
		}
	?>
	<form action="" method="POST">
		<p>логин
			<input type="text" name="ins_login">
		</p>
		<p>пароль
			<input type="password" name="ins_pass">
		</p>
		<p>
			<input type="submit" name="ins_butt" value="зарегистрироваться">
		</p>
	</form>
	<?php
		$ins_lgn = $_POST['ins_login'];
		$ins_psw = $_POST['ins_pass'];

		if (!empty($ins_lgn) && !empty($ins_psw)) {
			$query2 = "INSERT INTO users (login, pass) VALUES ('".$ins_lgn."', '".$ins_psw."')";
		$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));

		if ($result2 && isset($_POST['ins_butt'])) {
			echo 'вы успешно зарегистрировались';
		} else {
			echo 'что-то пошло не так :(';
		}
		} else{
			echo 'заполните все поля';
		}
	?>
</body>
</html>