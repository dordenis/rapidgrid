<?php
/**
 * Created by PhpStorm.
 * User: ddoroshenko
 * Date: 23.10.2014
 * Time: 15:03
 */

namespace AjaxBlog\RapidGrid;

class Url {

	private $params = [];
	private $url;
    private $prefix;


	public function __construct($prefix=null) {
        $this->prefix = $prefix;
		$this->params = $_GET;

        $request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
		$this->url = preg_replace('/\?.*/', '', $request);
	}

	public function __toString() {
		return $this->build();
	}

	public function group($group, $value) {
        $key = $this->getKey($group);
		$this->params[$key] = $value;
	}

	public function clear($group=null) {
		if (is_null($group)) {
			$this->params = [];
		} else {
            $key = $this->getKey($group);
			if (isset($this->params[$key])) {
				unset($this->params[$key]);
			}
		}
	}

	public function get($name, $default=null) {
        $key = $this->getKey($name);
		return isset($this->params[$key]) ? $this->params[$key] : $default;
	}

	public function setBaseUrl($url) {
		$this->url = $url;
	}

	public function build() {
		$param = http_build_query($this->params, null, '&');
		$param =  empty($param) ? $param : "?".$param;
		return  $this->url.$param;
	}

    private function getKey($group) {
        return $this->prefix ? "{$this->prefix}.{$group}" : $group;
    }

} 