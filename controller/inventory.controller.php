<?php

function index()
{
  $sql = "SELECT * FROM inventories";
  if (!empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql .= " WHERE name LIKE '%$q%'";
  }
  return view("inventory/index", ["lists" => paginate($sql)]);
}

function create()
{
  return view("inventory/create");
};

function store()
{
  validationStart();

  if (empty(trim($_POST['name']))) {
    setError("name", "Name is required");
  } else if (strlen($_POST['name']) < 3) {
    setError("name", 'This is too short');
  } else if (strlen($_POST['name']) > 20) {
    setError("name", 'This is too long');
  } else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['name'])) {
    setError("name", 'name only allows to use A to z, space and number');
  }

  if (empty(trim($_POST['price']))) {
    setError("price", "Price is required");
  } else if (!is_numeric($_POST['price'])) {
    setError("price", "price must be number");
  } else if ($_POST['price'] < 100) {
    setError("price", "price is too low to buy a product");
  } else if ($_POST['price'] > 9999) {
    setError("price", "price is too high to buy a product");
  }

  if (empty(trim($_POST['stock']))) {
    setError("stock", "Stock is required");
  } else if ($_POST['stock'] < 1) {
    setError("stock", "You must at least buy one product");
  } else if ($_POST['stock'] > 100) {
    setError("stock", "Out of Stock, only 100 left");
  }
  validationEnd();

  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  run("INSERT INTO inventories (name, price, stock) VALUES ('$name', $price, $stock)");
  return redirect(route('inventory'), "Item created successfully");
}

function delete()
{
  $id = $_POST['id'];
  $sql = "DELETE FROM inventories WHERE id = $id";
  run($sql);
  return redirectBack("Item deleted successfully");
}

function edit()
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM inventories WHERE id = $id";
  return view("inventory/edit", ["list" => first($sql)]);
}

function update()
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  run("UPDATE inventories SET name='$name', price = $price, stock = $stock WHERE id = $id");
  return redirect(route('inventory'), "Item updated successfully");
}
