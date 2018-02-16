<?php

  // Admins

  // Find all admins, ordered last_name, first_name
  function find_all_users() {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $users = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $users; // returns an assoc. array
  }

  function find_user_by_username($username) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $users = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $users; // returns an assoc. array
  }



  function insert_users($users) {
    global $db;

    $errors = validate_admin($users);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($users['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $users['first_name']) . "',";
    $sql .= "'" . db_escape($db, $users['last_name']) . "',";
    $sql .= "'" . db_escape($db, $users['email']) . "',";
    $sql .= "'" . db_escape($db, $users['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_users($users) {
    global $db;

    $password_sent = !is_blank($users['password']);

    $errors = validate_users($users, ['password_required' => $password_sent]);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($users['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET ";
    $sql .= "first_name='" . db_escape($db, $users['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $users['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $users['email']) . "', ";
    if($password_sent) {
      $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . db_escape($db, $users['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $users['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_user($users) {
    global $db;

    $sql = "DELETE FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $users['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
