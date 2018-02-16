<?php

require_once('../admin/phpscripts/init.php');

require_login();

$users_set = find_all_users();

?>

<?php $page_title = 'Users'; ?>

<div id="content">
  <div class="admins listing">
    <h1>Admins</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('users/new.php'); ?>">Create New User</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while($users = mysqli_fetch_assoc($users_set)) { ?>
        <tr>
          <td><?php echo h($users['id']); ?></td>
          <td><?php echo h($users['first_name']); ?></td>
          <td><?php echo h($users['last_name']); ?></td>
          <td><?php echo h($users['email']); ?></td>
          <td><?php echo h($users['username']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($users['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($users['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($users['id']))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

    <?php
      mysqli_free_result($users_set);
    ?>
  </div>

</div>
