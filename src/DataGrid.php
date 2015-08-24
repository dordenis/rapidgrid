<?php
/**
 * Created by PhpStorm.
 * User: cloudera
 * Date: 8/19/15
 * Time: 12:47 AM
 */

namespace AjaxBlog\RapidGrid;


use AjaxBlog\RapidGrid\Column\ColumnAbstract;

class DataGrid
{

    public $template = "grid";

    private $columns = [];
    private $prefix;

    /**
     * @var Criteria
     */
    private $criteria;

    /**
     * @var Paginate
     */
    private $paginate;

    public function __construct($criteria, $prefix=null) {
        $this->criteria = $criteria;
        $this->prefix = $prefix;
        $this->setPaginate(new Paginate($prefix));
    }


    /**
     * @param $column ColumnAbstract
     * @return $this
     */
    public function setColumn($column) {
        $column->setUrl(new Url($this->prefix));
        $this->columns[] = $column;
        return $this;
    }

    /**
     * @param $columns array
     * @return $this
     */
    public function setColumns($columns) {
        foreach($columns as $column) {
            $this->setColumn($column);
        }
        return $this;
    }

    public function setPaginate($paginate) {
        $this->paginate = $paginate;
        return $this;
    }

    public function getPaginate() {
        $criteria = $this->criteria();
        $this->paginate->setTotal($criteria->countRows());
        return $this->paginate;
    }

    /**
     * @return array
     */
    public function getColumns() {
        return $this->columns;
    }

    public function rows() {
        $criteria = $this->paginate->criteria($this->criteria());
        return $criteria->queryRows();
    }

    private function criteria() {
        $criteria = $this->criteria;
        foreach($this->getColumns() as $column) {
            $criteria = $column->criteria($criteria);
        }
        return $criteria;
    }
}