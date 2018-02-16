<?php

require_once('../admin/phpscripts/init.php');

//require_login();

if(is_post_request()) {
  $subject = [];
  $users['first_name'] = $_POST['first_name'] ?? '';
  $users['last_name'] = $_POST['last_name'] ?? '';
  $suers['email'] = $_POST['email'] ?? '';
  $users['username'] = $_POST['username'] ?? '';
  $users['password'] = $_POST['password'] ?? '';
  $users['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_users($users);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/users/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $users = [];
  $users["first_name"] = '';
  $users["last_name"] = '';
  $users["email"] = '';
  $users["username"] = '';
  $users['password'] = '';
  $users['confirm_password'] = '';
}

?>

<?php $page_title = 'Create Admin'; ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create User</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/users/new.php'); ?>" method="post">
      <dl>
        <dt>First name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($users['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($users['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($users['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email </dt>
        <dd><input type="text" name="email" value="<?php echo h($users['email']); ?>" /><br /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>

      <br />

      <div id="operations">
        <input type="submit" value="Create Admin" />
      </div>
    </form>

  </div>

</div>
