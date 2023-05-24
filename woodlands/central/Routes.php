<?php
namespace central;
interface Routes {
	public function getController($name);
    public function getDefaultRoute();
    public function checkLogin($route);
    public function checkAdmin($route);


}