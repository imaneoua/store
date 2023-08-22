<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class HomeController extends Controller
{

public function index()
{

return view('home.index' ,[
    'title' => "Home page - online store",
    "subtitle" => "welcome dev202",
    "displaySubtitle" => false,

]);

}
public function about()
{
return view('home.about', [
    'title' => "about us - online store",
    'subtitle' => "about",
    'description' => "this is an about page ...",
    "author" => "developed by: Imane",


]);
}

}