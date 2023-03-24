<?php

function home()
{
  //$myName = 'Chan'; $myAge = 20;
  return view('home', ['myName' => 'Chan', 'myAge' => 20]);
}

function about()
{
  return view('about');
}

function ss()
{
  dd($_SESSION);
}
