<!DOCTYPE html>
<html>
  <head>
    <title>Sign in</title>
    <meta charset="utf-8">
  </head>

  <body>
    <form action="<?php echo base_url('Sign/sign_in') ?>" method="post" id="signin-form userform">
      <h1>Sign in</h1>
      <input type="text" id="username" name="username" class="inputtext" placeholder="Username"
      value="<?php echo set_value('username') ?>"><br>
      <input type="password" id="password" name="password" class="inputtext" placeholder="Password"
      value="<?php echo set_value('password') ?>"><br>
      <input type="submit" id="signin_submit" name="signin_submit" class="btn submitbtn">
      <a href="<?php echo base_url('Sign/sign_up') ?>">Sign up</a>
    </form>

    <?php echo validation_errors(); ?>
  </body>
</html>
