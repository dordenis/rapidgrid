<?php
namespace AjaxBlog\RapidGrid;

use AjaxBlog\RapidGrid\Header\Label;
use AjaxBlog\RapidGrid\Criteria\Mock;
use AjaxBlog\RapidGrid\Render\Blade;

class DataGridTest extends \PHPUnit_Framework_TestCase
{

    private function getGrid() {
        $row = [
            "field1" => rand(1, 100),
            "field2" => rand(1, 100),
            "link" => rand(1, 100),
            "date" => "2015-10-15 10:14:56",
            "price" => rand(1000, 10000),
            "link" => "link/".rand(1000, 10000),
        ];

        $views = __DIR__ . '../../views';
        $cache = __DIR__ . '../../cache';

        $render = new Blade($views, $cache);
        $model = new Mock($row);
        $grid = new DataGrid($model);
        $grid->setRender($render);

        return $grid;
    }

    public function testHeader()
    {
        $grid = $this->getGrid();
        $grid->setColumns([
            Column::factory("field1", "field1"),
        ]);


        /**
         * @var $columns \AjaxBlog\RapidGrid\Column[]
         */
        $columns = $grid->getColumns();
        /**
         * @var $headers \AjaxBlog\RapidGrid\Header\Label[]
         */
        $headers = $columns[0]->getHeaders();
        $this->assertEquals($headers[0]->render(), "field1");

    }

    public function testHeaders()
    {
        $grid = $this->getGrid();
        $grid->setColumns([
            Column::factory("field1", "field1")->setHeaders([Label::factory("test")]),
        ]);


        /**
         * @var $columns \AjaxBlog\RapidGrid\Column[]
         */
        $columns = $grid->getColumns();
        /**
         * @var $headers \AjaxBlog\RapidGrid\Header[]
         */
        $headers = $columns[0]->getHeaders();
        $this->assertEquals($headers[1]->render(), "test");

    }

}