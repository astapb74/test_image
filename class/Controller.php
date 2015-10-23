<?php

class Controller
{

	public $css = [];
	public $js = [];

	public function registerCss()
	{
		foreach ($this->css as $item) {
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$item\">";
		}
	}

	public function registerJs()
	{
		foreach ($this->js as $item) {
			echo "<script language=\"javascript\" src=\"/$item\"></script>" . PHP_EOL;
		}
	}

	public function render($view, $data = [])
	{

		ob_start();
		include($_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.php');
		$content = ob_get_contents();
		ob_end_clean();

		include $_SERVER['DOCUMENT_ROOT'] . '/tpl/main.php';
	}

}
