<?php
defined('_JEXEC') or die;

class EtdHelper
{
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_etd';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_etd.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_etd', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
