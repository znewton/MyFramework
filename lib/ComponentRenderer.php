<?php

class ComponentRenderer
{
    public function alert($message, $type = 'default', $clickable = false){
        $clickableStr='';
        if($clickable){
            $clickableStr = 'clickable';
        }
        return <<<HTML
<div class="alert alert-{$type} {$clickableStr}"><i class="fa fa-exclamation-circle fa-fw"></i>{$message}</div>
HTML;
    }

    public function button($tag,$label,$type = 'default', $attributes = []){
        $attrStr = '';
        foreach ($attributes as $attr => $value){
            $attrStr .= ' ' . $attr . '=' . $value;
        }
        return <<<HTML
<{$tag} class="btn btn-{$type} clickable">{$label}</>
HTML;
    }
}