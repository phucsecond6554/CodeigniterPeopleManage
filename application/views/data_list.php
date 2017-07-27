<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data List</title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <h3>Trang danh sach thanh vien</h3>
        <a href="#">Them thanh vien</a>
      </header>

      <div class="member-table">
        <table>
          <tr>
            <th>Name</th>
            <th>Birth day</th>
            <th>Job</th>
            <th>Email</th>
          </tr>

          <?php foreach($member as $values){ ?>
            <tr>
              <td><?php echo $values->name ?></td>
              <td><?php echo $values->birthday ?></td>
              <td><?php echo $values->job ?></td>
              <td><?php echo $values->email ?></td>
            </tr>
          <?php  }?>
        </table>
      </div>
    </div>
  </body>
</html>
