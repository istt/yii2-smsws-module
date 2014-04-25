<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
	['label' => \Yii::t('template', 'Template'), 'url' => '#', 'items' => [
		['label' => \Yii::t('template','Item'), 'url' => ['/template/item/index']],
	]]
];