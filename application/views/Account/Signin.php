<form action="<?php echo base_url('Sign/sign_in') ?>" method="post" id="signin-form userform">
  <h1>Sign in</h1>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" class="inputtext form-control"
    placeholder="Username"
    value="<?php echo set_value('username') ?>">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="inputtext form-control"
    placeholder="Password"
    value="<?php echo set_value('password') ?>">
  </div>

  <button type="submit" name="button" class="btn btn-default">Sign in</button>

  <a href="<?php echo base_url('Sign/sign_up') ?>">Sign up</a>
</form>

<?php echo validation_errors(); ?>
