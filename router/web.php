<?php

$uri = $_SERVER["REQUEST_URI"];
$uriArr = parse_url($uri);
$path = $uriArr["path"];

const Routes = [
  "/" => 'page@home',
  "/about-us" => 'page@about',
  "/show-session" => 'page@ss',

  //routes for list.controller
  "/list" => 'list@index',
  "/list-create" => 'list@create',
  "/list-store" => ['post', 'list@store'],
  "/list-edit" => 'list@edit',
  "/list-update" => ['put', 'list@update'],
  "/list-delete" => ['delete', 'list@delete'],

  //routes for inventory.controller
  "/inventory" => 'inventory@index',
  "/inventory-create" => 'inventory@create',
  "/inventory-store" => ['post', 'inventory@store'],
  "/inventory-edit" => 'inventory@edit',
  "/inventory-update" => ['put', 'inventory@update'],
  "/inventory-delete" => ['delete', 'inventory@delete'],

  //routes for user.controller
  "/api/users" => 'user@index',
  "/api/user" => 'user@show',
  "/api/user-store" => ['post', 'user@store'],
  "/api/user-update" => ['put', 'user@update'],
  "/api/user-delete" => ['delete', 'user@delete'],

  //routes for friends.controller
  "/friends" => 'friends@index',
  "/friend-create" => 'friends@create',
  "/friend-store" => ['post', 'friends@store'],
  "/friend-edit" => 'friends@edit',
  "/friend-update" => ['put', 'friends@update'],
  "/friend-delete" => ['delete', 'friends@delete'],

  //routes for vips.controller
  "/api/vips" => 'vips@index',
  "/api/vip" => 'vips@show',
  "/api/vip-store" => ['post', 'vips@store'],
  "/api/vip-update" => ['put', 'vips@update'],
  "/api/vip-delete" => ['delete', 'vips@delete']
];

if (array_key_exists($path, Routes) && is_array(Routes[$path]) && checkRequestMethod(Routes[$path][0])) {
  controller(Routes[$path][1]);
} elseif (array_key_exists($path, Routes) && !is_array(Routes[$path])) {
  controller(Routes[$path]);
} else {
  view('not-found');
}
