<form class="newmember-form" action="<?php echo base_url('Data/add_member') ?>" method="post">

  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="name" value="<?php echo set_value('username') ?>"
    placeholder="Name" class="form-control">
  </div>

  <div class="row">
    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='date'>");
        for(var i = 1 ; i <= 31 ; i++)
          document.write("<option value=" + i + ">"+i +"</option>");
        document.write("</select>"); // In ra ngay
      </script>
    </div>

    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='month'>");
        for(var i = 1 ; i <= 12 ; i++)
          document.write("<option value=" + i + ">"+ "Thang " + i +"</option>");
        document.write("</select>"); // In ra thang
      </script>
    </div>

    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='year'>");
        for(var i = 1900 ; i <= 2017 ; i++)
          document.write("<option value=" + i + ">"+i +"</option>");
        document.write("</select>"); // In ra nam
      </script>
    </div>
  </div>

  <div class="form-group">
    <label for="job">Job</label>
    <input type="text" name="job" value="<?php echo set_value('job') ?>"
    placeholder="Job" class="form-control">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo set_value('email') ?>"
    placeholder="Email" class="form-control">
  </div>

  <button type="submit" name="button" class="btn btn-default">Add member</button>

</form>

<?php echo validation_errors(); ?>
