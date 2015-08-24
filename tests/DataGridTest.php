<?php

namespace AjaxBlog\RapidGrid\Test;


use AjaxBlog\RapidGrid\Criteria\Mock;
use AjaxBlog\RapidGrid\DataGrid;

class DataGridTest extends \PHPUnit_Framework_TestCase
{

    public function testRows()
    {
        $row = [
            "field1" => rand(1, 100),
            "field2" => rand(1, 100),
            "link" => rand(1, 100),
            "date" => "2015-10-15 10:14:56",
            "price" => rand(1000, 10000),
            "link" => "link/".rand(1000, 10000),
        ];


        $grid = new DataGrid(new Mock([$row]));
        $result = $grid->rows()[0];

        foreach($row as $field => $val) {
            $this->assertEquals($result[$field], $val);
        }

    }

}