<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Member</title>
  </head>
  <body>
    <form class="newmember-form" action="<?php echo base_url('Data/Edit/').$member->id ?>" method="post">
      <input type="text" name="name" value="<?php echo $member->name?>" placeholder="Name">
      <br>
      <span>
        <script type="text/javascript">
        // Lay ngay sinh cua member
        var birthdate = new Date("<?php echo $member->birthday; ?>");

          document.write("<select name='date'>");
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

          document.write("<select name='month'>");
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

          document.write("<select name='year'>");
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
      </span> <br> <!-- Span in ra ngay thang nam -->

      <input type="text" name="job" value="<?php echo $member->job; ?>" placeholder="Job">
      <br>
      <input type="email" name="email" value="<?php echo $member->email ?>" placeholder="Email">
      <br>
      <input type="submit" name="add_member_submit" value="Update">
    </form>

    <?php echo validation_errors(); ?>
  </body>
</html>
