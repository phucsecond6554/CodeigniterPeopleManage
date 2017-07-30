<form class="newmember-form" action="<?php echo base_url('Data/Edit/').$member->id ?>" method="post">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $member->name?>"
    placeholder="Name" class="form-control">
  </div>

  <script type="text/javascript">
    var birthdate = new Date("<?php echo $member->birthday; ?>");
  </script>

  <div class="row">
    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='date'>");
        for(var i = 1 ; i <= 31 ; i++)
        {
          if(i == birthdate.getDate())
          {
            document.write("<option selected value=" + i + ">"+i +"</option>");
          }else {
            document.write("<option value=" + i + ">"+i +"</option>");
          }
        }
      document.write("</select>"); // In ra ngay
      </script>
    </div>

    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='month'>");
        for(var i = 1 ; i <= 12 ; i++)
        {
          if(i == birthdate.getMonth() + 1)
          {
            document.write("<option selected value=" + i + ">"+ "Thang " + i +"</option>");
          }else {
            document.write("<option value=" + i + ">"+ "Thang " + i +"</option>");
          }
        }
        document.write("</select>"); // In ra thang
      </script>
    </div>

    <div class="col-md-4">
      <script type="text/javascript">
        document.write("<select class='form-control' name='year'>");
        for(var i = 1900 ; i <= 2017 ; i++)
        {
          if(i == birthdate.getFullYear())
          {
            document.write("<option selected value=" + i + ">"+i +"</option>");
          }else {
            document.write("<option value=" + i + ">"+i +"</option>");
          }
        }
        document.write("</select>"); // In ra nam
      </script>
    </div>
  </div>

  <div class="form-group">
    <label for="job">Job</label>
    <input type="text" name="job" value="<?php echo $member->job; ?>"
    placeholder="Job" class="form-control">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $member->email ?>"
    placeholder="Email" class="form-control">
  </div>

  <button type="submit" name="button" class="btn btn-default">Update</button>

</form>

<?php echo validation_errors(); ?>
