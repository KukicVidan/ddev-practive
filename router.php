<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
'/' => 'controllers/index.php',
'/about' => 'controllers/about.php',
'/contact' => 'controllers/contact.php',
];

#Funkcija koja hendluje routing
function routeToController($uri, $routes) {
if (array_key_exists($uri, $routes)) {
require $routes[$uri];
} else {
abort();
}}

#abort funkcija sa status quotom(404 default)
function abort($code = '404'){
http_response_code($code);
require "views/{$code}.php";
die();
}
routeToController($uri, $routes);