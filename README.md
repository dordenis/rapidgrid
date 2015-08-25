### Installation 
The package can be installed via Composer by requiring the "ajaxblog/rapidgrid": "*" package in your project's composer.json.

```json
{
   "require": {
        "philo/laravel-blade": "2.*",
        "ajaxblog/rapidgrid": "*"
    }
}
```
### Usage

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';
define("TEMPLATE", __DIR__."/vendor/ajaxblog/rapidgrid/template/default");
define("TMP", __DIR__."/tmp");


use \AjaxBlog\RapidGrid;

$row = [
    "field1" => rand(1, 100),
    "field2" => rand(1, 100),
    "link" => rand(1, 100),
    "date" => "2015-10-15 10:14:56",
    "price" => rand(1000, 10000),
    "link" => "link/".rand(1000, 10000),
];

$data = [];
for($i=0; $i<5; $i++) {
    $data[] = $row;
}

$grid = new RapidGrid\DataGrid(new RapidGrid\Criteria\Mock($data));
$grid->setColumns([
    RapidGrid\Column\Base::factory("field1", "field1")->setFilter(RapidGrid\Filter\Search::factory()),
    RapidGrid\Column\Sort::factory("field2", "field2"),
    RapidGrid\Column\Sort\Price::factory("price", "price"),
    RapidGrid\Column\Sort\Date::factory("date", "date"),
]);


$view = (new Philo\Blade\Blade(TEMPLATE, TMP))->view();
echo $view->make($grid->getTemplate(), ["grid" => $grid])->render();

```

### Usage with Laravel

```php

use \AjaxBlog\RapidGrid;

$model = DB::table('table_name');

$grid = new RapidGrid\DataGrid(new RapidGrid\Criteria\Laravel($model));
$grid->setColumns([
    RapidGrid\Column\Base::factory("CountryName", "field1")->setFilter(RapidGrid\Filter\Search::factory()),
    RapidGrid\Column\Sort::factory("CityFromName", "field2"),
    RapidGrid\Column\Sort\Price::factory("Price", "price"),
    RapidGrid\Column\Sort\Date::factory("CheckInDate", "date"),
]);


$view = (new Philo\Blade\Blade(TEMPLATE, TMP))->view();
echo $view->make($grid->getTemplate(), ["grid" => $grid])->render();

```
