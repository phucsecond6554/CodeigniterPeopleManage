<?php
  if(isset($mess) && $mess !== '')
  {
    echo "<script>alert('".$mess."')</script>";
  }
 ?>

<div class="wrapper">
  <header>
    <h3>Trang danh sach thanh vien</h3>
    <a href="<?php echo base_url('Data/add_member') ?>">Them thanh vien</a>
  </header>


    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Job</th>
        <th>Email</th>
        <?php if($usertype ==1){ ?>
          <th>Delete</th>
          <th>Edit</th>
        <?php }?>
      </tr>

      <?php foreach($member as $values){ ?>
        <tr>
          <td><?php echo $values->id ?></td>
          <td><?php echo $values->name ?></td>
          <td><?php echo $values->birthday ?></td>
          <td><?php echo $values->job ?></td>
          <td><?php echo $values->email ?></td>

          <?php if($usertype == 1){ ?>
            <td><a href="<?php echo base_url('Data/Delete/').$values->id ?>">Xoa</a></td>
            <td><a href="<?php echo base_url('Data/Edit/').$values->id ?>">Sua</a></td>
          <?php }?>
        </tr>
      <?php }?>
    </table>
</div>
