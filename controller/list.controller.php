<?php

function index()
{
  $sql = "SELECT * FROM my";
  if (!empty($_GET['q'])) {
    $q = filter($_GET['q'], true);
    $sql .= " WHERE name LIKE '%$q%'";
  }
  return view("list/index", ["lists" => paginate($sql)]);
}

function create()
{
  return view("list/create");
};

function store()
{
  $name = filter($_POST['name']);
  $money = $_POST['money'];
  $sql = "INSERT INTO my (name, money) VALUES ('$name', $money)";
  run($sql);
  return redirect(route('list'), "List created successfully");
}

function delete()
{
  $id = $_POST['id'];
  $sql = "DELETE FROM my WHERE id = $id";
  run($sql);
  return redirect($_SERVER['HTTP_REFERER'], "List deleted successfully");
}

function edit()
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM my WHERE id = $id";
  return view("list/edit", ["list" => first($sql)]);
}

function update()
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $money = $_POST['money'];
  $sql = "UPDATE my SET name='$name', money = $money WHERE id = $id";
  run($sql);
  return redirect(route('list'), "List updated successfully");
}
