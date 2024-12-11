<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/css.css?v=<?php echo time() ?>">
</head>
<body>
<h2>Sign up</h2>
<form class="form" method="POST" enctype="multipart/form-data">
    <span class="input-span">
        <label for="name" class="label">Name</label>
        <input type="text" name="name">
    </span>
  <span class="input-span">
    <label for="email" class="label">Email</label>
    <input type="email" name="email" id="email"
  /></span>
  <span class="input-span">
    <label for="password" class="label">Password</label>
    <input type="password" name="password" id="password"/>
    <span><input type="checkbox" id="check"> Show password ?</span>
    </span>
  <span class="error"><?= $tbao ?></span>


  <input name="btn_submit" class="submit" type="submit" value="Sign up" />
  <!-- <button name="btn_submit" class="submit" type="submit">Sign up</button> -->
  <span class="span">Do have an account? <a href="?act=signin">Sign in</a></span>
</form>

    <script>
        let pass = document.getElementById('password');
        let check = document.getElementById('check');

        check.onchange = function (e) {
            pass.type = check.checked ? "text" : "password";
        }
    </script>
</body>
</html>