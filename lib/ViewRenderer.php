<?php

class ViewRenderer
{
    public function renderView($viewFile)
    {
        include 'views/'.$viewFile;
    }
}