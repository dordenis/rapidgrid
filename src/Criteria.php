<?php
/**
 * Created by PhpStorm.
 * User: cloudera
 * Date: 8/19/15
 * Time: 2:18 AM
 */

namespace AjaxBlog\RapidGrid;


interface Criteria
{

    /**
     * @return array
     */
    public function queryRows();
    public function countRows();

    public function order($field, $sort);
    public function offset($offset);
    public function limit($limit);
    public function match($field, $value);
    public function equal($field, $value);
}