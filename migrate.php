<?php

require_once "./globals.php";
require_once ProjectDir . "/core/connect.php";
require_once ProjectDir . "/core/functions.php";

$tables = all('show tables');

foreach ($tables as $table) {
  run("DROP TABLE IF EXISTS " . $table['Tables_in_san_kyi_tar']);
}
logger("All tables are dropped");

createTable('b', "phone varchar(11) NOT NULL", "address varchar(20) NOT NULL");
createTable('chan', "name varchar(20) NOT NULL", "money int(11) NOT NULL");
