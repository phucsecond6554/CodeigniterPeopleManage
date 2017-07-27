<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add new Member</title>
  </head>
  <body>
    <form class="newmember-form" action="<?php echo base_url('Data/add_member') ?>" method="post">
      <input type="text" name="name" value="<?php echo set_value('username') ?>" placeholder="Name">
      <br>
      <span>
        <script type="text/javascript">
          document.write("<select name='date'>");
          for(var i = 1 ; i <= 31 ; i++)
            document.write("<option value=" + i + ">"+i +"</option>");
          document.write("</select>"); // In ra ngay

          document.write("<select name='month'>");
          for(var i = 1 ; i <= 12 ; i++)
            document.write("<option value=" + i + ">"+ "Thang " + i +"</option>");
          document.write("</select>"); // In ra thang

          document.write("<select name='year'>");
          for(var i = 1900 ; i <= 2017 ; i++)
            document.write("<option value=" + i + ">"+i +"</option>");
          document.write("</select>"); // In ra nam
        </script>
      </span> <br> <!-- Span in ra ngay thang nam -->

      <input type="text" name="job" value="<?php echo set_value('job') ?>" placeholder="Job">
      <br>
      <input type="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Email">
      <br>
      <input type="submit" name="add_member_submit" value="Add Member">
    </form>

    <?php echo validation_errors(); ?>
  </body>
</html>
