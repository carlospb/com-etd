<?php
defined('_JEXEC') or die;

class EtdControllerEtds extends JControllerAdmin
{
	public function getModel($name = 'Etd', $prefix = 'EtdModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}
