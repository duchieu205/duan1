<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="css/css.css?v=<?php echo time() ?>">
</head>
<body>
    <h2>Sign in</h2>
    <form class="form" method="POST" enctype="multipart/form-data">
      <span class="input-span">
        <label for="email" class="label">Email</label>
        <input type="email" name="email" id="email"
      /></span>
      <span class="input-span">
        <label for="password" class="label">Password</label>
        <input type="password" name="password" id="password"/>
        <span><input type="checkbox" id="check"> Show password ?</span>
        </span>
      <span class="span"><a href="#">Forgot password?</a></span>
      <input name="btn_submit" class="submit" type="submit" value="Sign in" />
      <span class="span">Don't have an account? <a href="?act=signup">Sign up</a></span>
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