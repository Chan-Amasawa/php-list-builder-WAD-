<?php

$uri = $_SERVER["REQUEST_URI"];
$uriArr = parse_url($uri);
$path = $uriArr["path"];

const Routes = [
  "/" => 'page@home',
  "/about-us" => 'page@about',

  //route for list.controller
  "/list" => 'list@index',
  "/list-create" => 'list@create',
  "/list-store" => ['post', 'list@store'],
  "/list-edit" => 'list@edit',
  "/list-update" => ['put', 'list@update'],
  "/list-delete" => ['delete', 'list@delete'],

  //route for inventory.controller
  "/inventory" => 'inventory@index',
  "/inventory-create" => 'inventory@create',
  "/inventory-store" => ['post', 'inventory@store'],
  "/inventory-edit" => 'inventory@edit',
  "/inventory-update" => ['put', 'inventory@update'],
  "/inventory-delete" => ['delete', 'inventory@delete']
];

if (array_key_exists($path, Routes) && is_array(Routes[$path]) && checkRequestMethod(Routes[$path][0])) {
  controller(Routes[$path][1]);
} elseif (array_key_exists($path, Routes) && !is_array(Routes[$path])) {
  controller(Routes[$path]);
} else {
  view('not-found');
}
