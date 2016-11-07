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
        set_include_path('');
        include 'views/'.$viewFile;
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
<li><a href="{$link['href']}">{$link['label']}</a></li>
HTML;
        }
        $links = implode("\n",$links);
        return <<<HTML
<nav id="navbar">
    <div class="left-nav">
        <ul>
            <li class="ham-menu"><span></span><span></span><span></span></li>
            <li class="home-link"><a href="/">Home</a></li>
        </ul>
    </div>
    <div class="right-nav">
        <ul>
            {$links}
        </ul>
    </div>
</nav>
HTML;

    }
    private function renderDrawer(){
        $links = [];
        foreach ($this->config['nav_links'] as $link){
            $links[] = <<<HTML
<li><a href="{$link['href']}">{$link['label']}</a></li>
HTML;
        }
        $links = implode("\n",$links);
        return <<<HTML
<nav id="drawer">

</nav>
HTML;

    }
    private function renderFooter(){

    }
}