<?php

require_once "./globals.php";
require_once ProjectDir . "/core/connect.php";
require_once ProjectDir . "/core/functions.php";

$tables = all('show tables');

foreach ($tables as $table) {
  run("DROP TABLE IF EXISTS " . $table['Tables_in_san_kyi_tar']);
}
logger("All tables are dropped");

//create tables and drop the rest
createTable('my', 'name varchar(20) NOT NULL', 'money int(11) NOT NULL');
createTable('inventories', 'name varchar(20) NOT NULL', 'price int(11) NOT NULL', 'stock int(11) NOT NULL');
