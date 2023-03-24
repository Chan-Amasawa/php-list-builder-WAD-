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

function redirectBack(string $message = "null"): void
{
  redirect($_SERVER['HTTP_REFERER'], $message);
}

function checkRequestMethod(string $methodName): bool
{
  $result = false;
  $methodName = strtoupper($methodName);
  $serverRequestMethod = $_SERVER['REQUEST_METHOD'];
  if ($methodName === 'POST' && $serverRequestMethod === 'POST') {
    $result = true;
  } elseif ($methodName === 'PUT' && $serverRequestMethod = 'PUT' || ($serverRequestMethod === 'POST' && !empty($_POST['_method']) && strtoupper($_POST['_method']) === 'PUT')) {
    $result = true;
  } elseif ($methodName === 'DELETE' && $serverRequestMethod === 'DELETE' || ($serverRequestMethod = 'POST' && !empty($_POST['_method']) && strtoupper($_POST['_method']) === 'DELETE')) {
    $result = true;
  }
  return $result;
}

//alert function that can use with session
function alert(string $message, string $color = "success"): string
{
  return "<div class='alert alert-$color'>$message</div>";
}

function paginator($lists)
{
  $links = "";

  foreach ($lists['links'] as $link) {
    $links .= "<li class='page-item'><a class='page-link " . $link['is_active'] . "' href='" . $link['url'] . "'>" . $link['page_number'] . "</a></li>";
  };

  return "<div class='d-flex justify-content-between'>
    <p class=' mb-0'>Total: " . $lists['total'] . "</p>
    <nav aria-label='Page navigation example'>
      <ul class='pagination'>
        " . $links . "
      </ul>
    </nav>
  </div>";
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

function showSession(string $key = "message"): string|array
{
  $message = $_SESSION[$key];
  unset($_SESSION[$key]);
  return $message;
}

//session functions end

//validation functions start

function old(string $key)
{
  if (isset($_SESSION['old'][$key])) {
    $data = $_SESSION['old'][$key];
    unset($_SESSION['old'][$key]);
    return $data;
  }
  return null;
}

function validationStart()
{
  unset($_SESSION['error']);
  unset($_SESSION['old']);
  $_SESSION['old'] = $_POST;
}

function setError(string $key, string $message): void
{
  $_SESSION['error'][$key] = $message;
}

function hasError(string $key): bool
{
  if (!empty($_SESSION['error'][$key])) return true;
  return false;
}

function showError(string $key)
{
  $message = $_SESSION['error'][$key];
  unset($_SESSION['error'][$key]);
  return $message;
}

function validationEnd(bool $isApi = false)
{
  if (!empty(hasSession("error"))) {
    if ($isApi) {
      responseJson([
        'status' => false,
        'errors' => showSession("error")
      ]);
    } else {
      redirectBack();
    }
    die();
  } else {
    unset($_SESSION['old']);
  }
}
//validation functions end


//database functions start

function run(string $sql, bool $closeConnection = false): object|bool
{
  try {
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $closeConnection && mysqli_close($GLOBALS['conn']);
    return $query;
  } catch (Exception $e) {
    dd($e);
  }
}

function paginate($sql, $limit = 10)
{
  $total = first(str_replace("*", "COUNT(id) AS total", $sql))['total'];
  $totalPages = ceil($total / $limit);
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($currentPage - 1) * $limit;
  $sql .= " LIMIT $offset,$limit";
  $links = [];
  for ($i = 1; $i <= $totalPages; $i++) {
    $queries = $_GET;
    $queries['page'] = $i;
    $url = url() . $GLOBALS['path'] . "?" . http_build_query($queries);
    $links[] = [
      'url' => $url,
      'is_active' => $i == $currentPage ? "active" : "",
      'page_number' => $i
    ];
  }
  $lists = [
    "total" => $total,
    "limit" => $limit,
    "total_page" => $totalPages,
    "current_page" => $currentPage,
    "data" => all($sql),
    "links" => $links
  ];

  return $lists;
}

function createTable($tableName, ...$columns)
{
  $sql = "DROP TABLE IF EXISTS $tableName";
  run($sql);

  logger($tableName . " is dropped", 31);

  $sql = "CREATE TABLE $tableName (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    " . join(",", $columns) . ",
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
  run($sql);

  logger($tableName . " is created");
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

//returned one data from database
function first(string $sql): array
{
  $query = run($sql);
  $list = mysqli_fetch_assoc($query);
  return $list;
}

//pretty logger
//Color Reference - https://i.stack.imgur.com/HFSl1.png

function logger($message, $colorCode = 32): void
{
  echo "\e[39m[LOG] " . "\e[{$colorCode}m" . $message . "\n";
}

//response JSON
function responseJson(mixed $data, int $status = 200): string
{
  header("Content-type:Application/json");
  http_response_code($status);
  if (is_array($data)) {
    return print(json_encode($data));
  } else {
    return print(json_encode(["message" => $data]));
  }
}

//sanitize the data

function filter($str, bool $strip = false, $allowed = null)
{
  // return strip_tags($str, $allowed);   //use strip_tags to remove html tags

  if ($strip) {
    $str = strip_tags($str);
  }
  $str = trim($str);
  $str = htmlentities($str, ENT_QUOTES);
  $str = stripslashes($str);

  return $str;
}
