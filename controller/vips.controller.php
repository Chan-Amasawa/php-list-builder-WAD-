<?php

function index()
{
  $sql = "SELECT * FROM vips";
  if (!empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql .= " WHERE name LIKE '%$q%'";
  }

  return responseJson(paginate($sql));
}

function show()
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM vips WHERE id = $id";

  return responseJson(first($sql));
}

function store()
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $isActive = $_POST['is_active'];
  $sql = "INSERT INTO vips (name, email, is_acitve) VALUES ('$name', '$email', $isActive)";
  run($sql);
  $currentVip = first("SELECT * FROM vips WHERE id = {$GLOBALS['conn']->insert_id}");
  return responseJson($currentVip);
}

function delete()
{
  $id = $_GET['id'];
  $sql = "DELETE FROM vips WHERE id = $id";
  run($sql);
  return responseJson("Deleted");
}


function update()
{
  $id = $_GET['id'];
  parse_str(file_get_contents('php://input'), $_PUT);
  $name = $_PUT['name'];
  $email = $_PUT['email'];
  $isActive = $_PUT['is_active'];
  $sql = "UPDATE vips SET name='$name', email = '$email', is_acitve = '$isActive' WHERE id = $id";
  run($sql);
  return responseJson("Updated");
}
