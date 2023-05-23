<?php
namespace central;
class EntryPoint {
	
	private $routes;

	public function __construct(Routes $routes) {
		$this->routes = $routes;

	}

	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		// $this->routes->checkLogin($route);
		if ($route == '') {
			$route = $this->routes->getDefaultRoute();
			}
		   
			list($controllerName, $functionName) = explode('/', $route);
		   
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$functionName = $functionName . 'Submit';
			}
			$controller = $this->routes->getController($controllerName);
			$page = $controller->$functionName();
			// $menus = $this->routes->getCategoryController()->menu();
			// $sidebar = $this->routes->getCategoryController()->sidebar();
			//menu and sidebar variables & controllers 
		
		// $sidebar = $this->loadTemplate('../templates/sidebar.html.php', $sidebar['variables']);
		$output = $this->loadTemplate('../templates/' . $page['template'],$page['variables']);
		// $menu = $this->loadTemplate('../templates/menu.html.php', $menus['variables']);
		$title = $page['title'];
		
		
		require '../templates/layout.html.php';
		}
public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}