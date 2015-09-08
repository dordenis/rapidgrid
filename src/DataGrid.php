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

    protected $template = "grid";

    private $columns = [];

    /**
     * @var Criteria
     */
    private $criteria;

    /**
     * @var Paginate
     */
    private $paginate;

    public function __construct($criteria) {
        $this->criteria = $criteria;
        $this->setPaginate(new Paginate());
    }


    /**
     * @param $column ColumnAbstract
     * @return $this
     */
    public function setColumn($column) {
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
        foreach($this->getColumns() as $column) {
            $column->criteria($this->criteria);
        }
        return $this->criteria;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setUrl($url) {
        $this->paginate->setUrl(clone $url);

        foreach($this->getColumns() as $column) {
            $column->setUrl(clone $url);
            $column->getFilter()->setUrl(clone $url);
        }
    }
}