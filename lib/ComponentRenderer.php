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
		$attrStr = $this->AttributesToString($attributes);
		return <<<HTML
<{$tag} class="btn btn-{$type} clickable" {$attrStr}>{$label}</{$tag}>
HTML;
	}

	public function formTextElement($label,$name,$id,$type='text',$inline=false, $inputAttrs=[],$labelAttrs=[]){
		$inline = ($inline) ? 'inline' : '';
		$inputAttrStr = $this->AttributesToString($inputAttrs);
		$labelAttrStr = $this->AttributesToString($labelAttrs);
		$passwordToggle = '';
		if($type=='password'){
			$passwordToggle = '<span class="password-toggle clickable-text"></span>';
		}
		return <<<HTML
<div class="form-element-text {$inline}">
	<input id="{$id}" type="{$type}" name="{$name}" value="" placeholder="" {$inputAttrStr}>
	<label for="{$id}" {$labelAttrStr}>{$label}</label>
	{$passwordToggle}
</div>
HTML;
	}
//TODO: add ID and attributes
	public function formListElement($title, $type, $name, $options = [], $checkedValue='', $attributes = []){
		$optionsStr = '';
		foreach ($options as $value => $label)
		{
			$id = $name . '_' . str_replace(' ', '_', $value);
			$checked = $checkedValue == $value ? 'checked="checked"' : '';
			$optionsStr .= <<<HTML
<li>
	<input type="{$type}" name="{$name}" value="{$value}" id="{$id}" {$checked}>
	<label for="{$id}">{$label}</label>
</li>
HTML;
		}
		return <<<HTML
<div class="form-element-list form-list-{$type}">
	<div class="list-title">{$title}</div>
	<ul>
		{$optionsStr}
	</ul>
</div>
HTML;
	}
//TODO: Add ID and Attributes
	public function formSelectElement($title, $name, $options = [], $selectedOption = '', $attributes = []){
		$optionsStr = '';
		foreach ($options as $value => $label)
		{
			$blank = $value == '' ? 'class="blank"' : '';
			$selected = $selectedOption === $value ? 'selected' : '';
			$optionsStr .= <<<HTML
<option {$blank} value="{$value}" {$selected}>{$label}</option>
HTML;
		}
		return <<<HTML
<div class="form-element-select">
	<select name="{$name}">
		{$optionsStr}
	</select>
	<div class="select-title">{$title}</div>
</div>
HTML;
	}

	public function formRangeElement($label, $name, $id, $min, $max, $step = 1, $value = null, $attributes = [])
	{
		if($value == null){
			$value = $min;
		}
		$attrStr = $this->AttributesToString($attributes);
		return <<<HTML
<div class="form-element-range">
	<label for="{$id}">{$label}</label>
	<input id="{$id}" name="{$name}" min="{$min}" max="{$max}" step="{$step}" value="{$value}" {$attrStr}>
	<div id="" class="range-indicator"></div>
</div>
HTML;
	}

	public function loadingBar()
	{
		return <<<HTML
<div class="loading-bar"></div>
HTML;
	}

	private function AttributesToString($attributes){
		$attrStr = '';
		foreach ($attributes as $attr => $val){
			$attrStr .= ' '.$attr.'="'.$val.'"';
		}
		return $attrStr;
	}
}