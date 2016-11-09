<?php

include_once('Config.php');

class ViewRenderer
{
	private $config = null;

	public function __construct()
	{
		$this->config = new Config();
		$this->config = $this->config->getViewConfig();
	}

	public function renderView($viewFile)
	{
		echo $this->renderHead();
		echo $this->renderNavbar();
		echo $this->renderDrawer();
        echo '<main>';
		set_include_path('');
		include 'views/'.$viewFile;
        echo '</main>';
        echo $this->renderFooter();
	}

	private function renderHead(){

		return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>myFramework</title>
	<meta name="description" content="My own framework with my own theme" />
	<meta name="keywords" content="framework, theme, php, js, css, html" />
	<meta name="author" content="znewton" />
	<link rel="stylesheet" href="/lib/css/myFramework.css">
	<script src="/lib/js/myFramework.js"></script>
</head>
HTML;
	}

	private function renderNavbar(){
		$links = [];
		foreach ($this->config['nav_links'] as $link){
			$links[] = <<<HTML
<a href="{$link['href']}">{$link['label']}</a>
HTML;
		}
		$links = implode("\n",$links);
		return <<<HTML
<nav id="navbar">
	<div class="left-nav">
			<a href="/" class="home-link">Lorem Ipsum</a>
	</div>
	<div class="right-nav">
		 {$links}
	</div>
</nav>
HTML;

	}
	private function renderDrawer(){
		$links = [];
		foreach ($this->config['nav_links'] as $link){
			$links[] = <<<HTML
<a href="{$link['href']}">{$link['label']}</a>
HTML;
		}
		$links = implode("\n",$links);
		return <<<HTML
<div id="ham-menu"><span></span><span></span><span></span></div>
<div id="drawer-indicator"></div>
<nav id="drawer">
	{$links}
</nav>
HTML;

	}
	private function renderFooter(){
        return '';
	}
}