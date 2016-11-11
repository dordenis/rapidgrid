<?php
/**
 * Created by PhpStorm.
 * User: cloudera
 * Date: 8/19/15
 * Time: 12:47 AM
 */

namespace AjaxBlog\RapidGrid;


class DataGrid
{

    /**
     * @var array Column
     */
    private $columns = [];
    private $paginate;
    private $criteria;


    public function __construct($criteria)
    {
        $this->criteria = $criteria;
        $this->paginate = new Paginate();
    }


    /**
     * @return array Column
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * @param $columns array
     * @return $this
     */
    public function setColumns($columns) {
        foreach($columns as $column) {
            $this->columns[] = $column;
        }
        return $this;
    }

    public function setPaginate($paginate) {
        $this->paginate = $paginate;
        return $this;
    }

    public function getPaginate() {
        $criteria = $this->criteria();
        $total = $criteria->countRows();

        $this->paginate->setTotal($total);
        return $this->paginate;
    }

    public function setLimit($limit) {
        $this->paginate->setLimit($limit);
    }


    public function getRows() {
        $criteria = $this->criteria();
        $this->paginate->criteria($criteria);
        return $criteria->queryRows();
    }


    private function criteria() {
        $criteria = clone $this->criteria;
        foreach($this->getColumns() as $column) {
            $column->criteria($criteria);
        }
        return $criteria;
    }


}
