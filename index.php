<?php


include_once  "vendor/autoload.php";

use \AjaxBlog\RapidGrid\DataGrid;
use \AjaxBlog\RapidGrid\Column;
use \AjaxBlog\RapidGrid\Header;

$row = [[
    "field1" => 10,
    "field2" => 11,
    "link" => rand(1, 100),
    "date" => "2015-10-15 10:14:56",
    "price" => rand(1000, 10000),
    "link" => "link/".rand(1000, 10000),
]];


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => '...',
    'username'  => '...',
    'password'  => '...',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$model = Capsule::table(table_name);

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new \Philo\Blade\Blade($views, $cache);

$model = new \AjaxBlog\RapidGrid\Criteria\Laravel($model);
$grid = new DataGrid($model);
$grid->setLimit(2);

$column1 = Column\Sort::factory("id", "Id")->setHeaders([new Header\Check("id", [1=>1, 2=>2])]);
$column2 = Column\Sort::factory("name", "Name")->setHeaders([new Header\Search("name")]);

$grid->setColumns([
    $column1,
    $column2,
]);


$table = $blade->view()->make("grid", ["grid" => $grid])->render();
echo $blade->view()->make("page", ["table" => $table]);