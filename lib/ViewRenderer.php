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
        echo $this->renderNavbar();
        set_include_path('');
        include 'views/'.$viewFile;
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