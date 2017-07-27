<!DOCTYPE html>
<html>
  <head>
    <title>Sign in</title>
    <meta charset="utf-8">
  </head>

  <body>
    <form action="<?php echo base_url('Sign/sign_up') ?>" method="post" id="signup-form userform">
      <h1>Sign up</h1>
      <input type="text" id="username" name="username" class="inputtext" placeholder="Username"
      value="<?php echo set_value('username') ?>"><br>
      <input type="password" id="password" name="password" class="inputtext" placeholder="Password"
      value="<?php echo set_value('password')?>"><br>
      <input type="password" id="passconf" name="passconf" class="inputtext" placeholder="Pass Conf"
      value="<?php echo set_value('passconf')?>"><br>
      <input type="email" id="email" name="email" class="inputtext" placeholder="Email"
      value="<?php echo set_value('email')?>"><br>
      <input type="tel" id="phonenumber" name="phonenumber" class="inputtext" placeholder="Phone"
      value="<?php echo set_value('phonenumber')?>"><br>
      <input type="submit" id="signin_submit" name="signin_submit" class="btn submitbtn">

      <select name="usertype">
        <option value="0">Thanh vien</option>
        <option value="1">Admin</option>
      </select>
    </form>

    <?php echo validation_errors(); ?>
  </body>
</html>
