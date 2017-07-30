<form action="<?php echo base_url('Sign/sign_up') ?>" method="post" id="signup-form userform">

  <h1>Sign up</h1>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" class="inputtext form-control" placeholder="Username"
    value="<?php echo set_value('username') ?>">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="inputtext form-control" placeholder="Password"
    value="<?php echo set_value('password')?>">
  </div>

  <div class="form-group">
    <label for="passconf">Password Confirm</label>
    <input type="password" id="passconf" name="passconf" class="inputtext form-control" placeholder="Pass Conf"
    value="<?php echo set_value('passconf')?>">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="inputtext form-control" placeholder="Email"
    value="<?php echo set_value('email')?>">
  </div>

  <div class="form-group">
    <label for="phonenumber">Phone number</label>
    <input type="tel" id="phonenumber" name="phonenumber" class="inputtext form-control" placeholder="Phone"
    value="<?php echo set_value('phonenumber')?>">
  </div>

  <select name="usertype" class="form-control">
    <option value="0">Thanh vien</option>
    <option value="1">Admin</option>
  </select>

  <button type="submit" name="button" class="btn btn-default">Sign up</button>

</form>

<?php echo validation_errors(); ?>
