<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/28/16
 * Time: 12:56 PM
 */

namespace AjaxBlog\RapidGrid;

trait Template {

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
}