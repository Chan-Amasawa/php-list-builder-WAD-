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
createTable('users', 'name varchar(20) NOT NULL', 'email varchar(50) NOT NULL', "gender enum('male', 'female') NOT NULL", 'address TEXT NOT NULL');
//my-tests
createTable('friends', 'name varchar(20) NOT NULL', 'email varchar(50) NOT NULL', "gender enum('male', 'female') NOT NULL", 'favouriteColor varchar(20) NOT NULL', 'address TEXT NOT NULL');
createTable('vips', 'name varchar(20) NOT NULL', 'email varchar(50) NOT NULL', 'is_acitve text NOT NULL');
