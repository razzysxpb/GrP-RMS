<?php
namespace woodlands\Controllers;

class Modules {
    private $modulesTable;

    public function __construct($modulesTable) {
        $this->modulesTable = $modulesTable;
    }

    public function modules() {
        if (isset($_GET['id'])) {
            $modules = $this->modulesTable->find('module_id', $_GET['id']);
        } else {
            $modules = $this->modulesTable->findAll();
        }

        return [
            'template' => 'moduleList.html.php',
            'variables' => [
                'modules' => $modules
            ],
            'title' => 'Modules'
        ];
    }

    public function manageModule() {
        if(isset($_GET['id'])){
            $modules = $this->modulesTable->find('module_id',$_GET['id']);
            }else{
                $modules = [];
            }

        return [
            'template' => 'manageModule.html.php',
            'variables' => [
                'modules' => $modules
            ],
            'title' => 'Manage Module'
        ];
    }

    public function manageModuleSubmit() {
        $this->modulesTable->save($_POST['module']);
        header('location:/modules/modules');

        
    }

    public function deleteSubmit()
	{
		$this->modulesTable->delete($_POST['id']);

		header('location: /modules/modules');
	}
}
