<?php

class ComponentRenderer
{
	/**
	 * @param string $message
	 * @param string $type
	 * @param bool $clickable
	 * @param string $description
	 * @return string
	 */
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

	/**
	 * @param string $tag
	 * @param string $label
	 * @param string $type
	 * @param array $attributes
	 * @return string
	 */
	public function button($tag,$label,$type = 'default', $attributes = []){
		$attrStr = $this->AttributesToString($attributes);
		return <<<HTML
<{$tag} class="btn btn-{$type} clickable" {$attrStr}>{$label}</{$tag}>
HTML;
	}

	/**
	 * @param $label
	 * @param $name
	 * @param $id
	 * @param string $type
	 * @param bool $inline
	 * @param array $inputAttrs
	 * @param array $labelAttrs
	 * @return string
	 */
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
	/**
	 * @param string $title
	 * @param string $type
	 * @param string $name
	 * @param array $options
	 * @param string $checkedValue
	 * @param array $attributes
	 * @return string
	 */
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
	/**
	 * @param string $title
	 * @param string $name
	 * @param array $options
	 * @param string $selectedOption
	 * @param array $attributes
	 * @return string
	 */
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

	/**
	 * @param string $label
	 * @param string $name
	 * @param string $id
	 * @param int $min
	 * @param int $max
	 * @param int $step
	 * @param null $value
	 * @param array $attributes
	 * @return string
	 */
	public function formRangeElement($label, $name, $id, $min, $max, $step = 1, $value = null, $attributes = [])
	{
		if($value == null){
			$value = $min;
		}
		$attrStr = $this->AttributesToString($attributes);
		return <<<HTML
<div class="form-element-range">
	<label for="{$id}">{$label}: <span class="range-val"></span></label>
	<input id="{$id}" type="range" name="{$name}" min="{$min}" max="{$max}" step="{$step}" value="{$value}" {$attrStr}>
	<div id="{$id}-range-ind" class="range-indicator"></div>
</div>
HTML;
	}

	/**
	 * @return string
	 */
	public function loadingBar()
	{
		return <<<HTML
<div class="loading-bar"></div>
HTML;
	}

	/**
	 * @param array $attributes
	 * @return string
	 */
	private function AttributesToString($attributes){
		$attrStr = '';
		foreach ($attributes as $attr => $val){
			$attrStr .= ' '.$attr.'="'.$val.'"';
		}
		return $attrStr;
	}
}