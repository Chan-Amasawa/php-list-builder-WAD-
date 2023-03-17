<?php

function index()
{
  $sql = "SELECT * FROM friends";
  if (!empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql .= " WHERE name LIKE '%$q%'";
  }

  return view("friends/index", ["lists" => paginate($sql)]);
}

function create()
{
  return view("friends/create");
};

function store()
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $favourite_color = $_POST['favourite_color'];
  $address = $_POST['address'];
  $sql = "INSERT INTO friends (name, email, gender, favouriteColor, address) VALUES ('$name', '$email', '$gender', '$favourite_color', '$address')";
  run($sql);
  return redirect(route('friends'), "Friend created successfully");
}

function delete()
{
  $id = $_POST['id'];
  $sql = "DELETE FROM friends WHERE id = $id";
  run($sql);
  return redirect($_SERVER['HTTP_REFERER'], "Friend deleted successfully");
}

function edit()
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM friends WHERE id = $id";
  return view("friends/edit", ["list" => first($sql)]);
}

function update()
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $favourite_color = $_POST['favourite_color'];
  $address = $_POST['address'];
  $sql = "UPDATE friends SET name='$name', email='$email', gender='$gender', favouriteColor='$favourite_color', address = '$address' WHERE id = $id";
  run($sql);
  return redirect(route('friends'), "Friend updated successfully");
}
