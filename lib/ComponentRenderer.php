<?php

class ComponentRenderer
{
    public function alert($message, $type = 'default', $clickable = false, $description = ''){
        $alertCollapseAttrs = '';
        $alertCollapsed = '';
        if($clickable && $description != ''){
            $alertCollapseAttrs = ' onclick="toggleCollapse(this)"';
            $alertCollapsed = <<<HTML
<div class="alert-description collapse-toggle collapsed">
    {$description}
</div>
HTML;
        }
        $clickable=($clickable) ? 'clickable' : '';
        return <<<HTML
<div class="alert alert-{$type} {$clickable}" {$alertCollapseAttrs}>
    <i class="fa fa-exclamation-circle fa-fw"></i>{$message}
    {$alertCollapsed}
</div>
HTML;
    }

    public function button($tag,$label,$type = 'default', $attributes = []){
        $attrStr = '';
        foreach ($attributes as $attr => $value){
            $attrStr .= ' ' . $attr . '="' . $value . '"';
        }
        return <<<HTML
<{$tag} class="btn btn-{$type} clickable">{$label}</>
HTML;
    }

    public function formTextElement($label,$name,$id,$type='text',$inline=false, $inputAttrs=[],$labelAttrs=[]){
        $inline = ($inline) ? 'inline' : '';
        $inputAttrStr = '';
        foreach ($inputAttrs as $attr => $value)
        {
            $inputAttrStr .=  ' ' . $attr . '="' . $value . '"';
        }
        $labelAttrStr = '';
        foreach ($labelAttrs as $attr => $value){
            $labelAttrStr .=  ' ' . $attr . '="' . $value . '"';
        }
        $passwordToggle = '';
        if($type=='password'){
            $passwordToggle = '<span class="password-toggle"></span>';
        }
        return <<<HTML
<div class="form-element-text {$inline}">
    <input id="{$id}" type="{$type}" name="{$name}" value="" placeholder="" onchange="inputTextStyle(this)" {$inputAttrStr}>
    <label for="{$id}" {$labelAttrStr}>{$label}</label>
    {$passwordToggle}
</div>
HTML;
    }
}