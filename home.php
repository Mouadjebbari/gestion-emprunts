<?php
    require "header.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userType = $_POST['user_type'];
        if ($userType === 'member') {
            header("Location: signinaderent.php");
        } else if ($userType === 'librarian') {
            header("Location: signin.php");
        }
}
?>
<html>
	<head>
		<title>Library</title>
		<link rel="stylesheet" type="text/css" href="home.css" />
		<script>
			function submitForm(userType) {
				document.getElementById("user_type").value = userType;
				document.getElementById("myForm").submit();
			}
		</script>
	</head>
	<body>
		<div id="allTheThings">
			<form method="post" action="" id="myForm">
				<div id="member">
					<a href="#" onclick="submitForm('member')">
						<img src="img/ic_member.svg" width="250px" height="auto"/><br />
						&nbsp;Adherent
					</a>
				</div>
				<div id="verticalLine">
					<div id="librarian">
						<a href="#" onclick="submitForm('librarian')">
							<img src="img/ic_librarian.svg" width="250px" height="auto" /><br />
							&nbsp;&nbsp;&nbsp;Bibliothécaire
						</a>
					</div>
				</div>
				<input type="hidden" name="user_type" id="user_type" value="" />
			</form>
		</div>
	</body>
</html>


