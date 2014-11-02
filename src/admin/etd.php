<?php
defined('_JEXEC') or die;

/*
if (!class_exists('JControllerLegacy'))
{
  require_once( JPATH_COMPONENT_ADMINISTRATOR.'/legacy.php' );
}
*/
if (!JFactory::getUser()->authorise('core.manage', 'com_etd'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Etd');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
