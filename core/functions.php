<?php

//die and dump
function dd($data, $type = false): void
{
  echo "<pre style='background-color: #1d1d1d;color: #cdcdcd; padding: 20px; margin: 10px; border-radius: 10px; line-height: 1.2rem;'>";
  if ($type === true) {
    var_dump($data);
  } else {
    print_r($data);
  }
  echo "</pre>";
  die();
}

//url

function url(string $path = null): string
{
  $url = isset($_SERVER['HTTPS']) ? 'https' : 'http' . "://" .  $_SERVER["HTTP_HOST"];
  if (isset($path)) {
    $url .= "/" . $path;
  }
  return $url;
}

//view
function view(string $viewName, array $data = null): void
{
  //array to variable
  if (!is_null($data)) {
    foreach ($data as $key => $value) {
      //dynaic variable name
      ${$key} = $value;
    }
  }
  require_once ViewDir . "/$viewName.view.php";
}

//controller function
function controller(string $controllerName): void
{
  $controllerNameArray = explode("@", $controllerName);
  require_once ControllerDir . "/$controllerNameArray[0].controller.php";
  call_user_func($controllerNameArray[1]);
}

function route(string $path, array $queries = null): string
{
  $url = url($path);
  if (!is_null($queries)) {
    return $url .= "?" . http_build_query($queries);
  } else {
    return $url;
  }
}

function redirect(string $url, string $message = "null"): void
{
  if (!is_null($message)) setSession($message);
  header("LOCATION:" . $url);
}

function checkRequestMethod(string $methodName): bool
{
  $result = false;
  $methodName = strtoupper($methodName);
  $serverRequestMethod = $_SERVER['REQUEST_METHOD'];
  if ($methodName === 'POST' && $serverRequestMethod === 'POST') {
    $result = true;
  } elseif ($methodName === 'PUT' && $serverRequestMethod === 'POST' && !empty($_POST['_method']) && strtoupper($_POST['_method']) === 'PUT') {
    $result = true;
  } elseif ($methodName === 'DELETE' && $serverRequestMethod === 'POST' && !empty($_POST['_method']) && strtoupper($_POST['_method']) === 'DELETE') {
    $result = true;
  }
  return $result;
}

//alert function that can use with session
function alert(string $message, string $color = "success"): string
{
  return "<div class='alert alert-$color'>$message</div>";
}

//session functions start
function setSession(string $message, string $key = "message"): void
{
  $_SESSION[$key] = $message;
}

function hasSession(string $key = "message"): bool
{
  if (!empty($_SESSION[$key])) return true;
  return false;
}

function showSession(string $key = "message"): string
{
  $message = $_SESSION[$key];
  unset($_SESSION[$key]);
  return $message;
}

//session functions end

//database functions start

function run(string $sql, bool $closeConnection = true): object|bool
{
  try {
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $closeConnection && mysqli_close($GLOBALS['conn']);
    return $query;
  } catch (Exception $e) {
    dd($e);
  }
}

//database functions end

function all(string $sql): array
{
  $list = [];
  $query = run($sql);
  while ($row = mysqli_fetch_assoc($query)) {
    $list[] = $row;
  }
  return $list;
}

function first(string $sql): array
{
  $query = run($sql);
  $list = mysqli_fetch_assoc($query);
  return $list;
}
