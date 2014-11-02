<?php
defined('_JEXEC') or die;

class com_etdInstallerScript
{
	function install($parent)
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_etd');
	}

	function uninstall($parent)
	{
		echo '<p>' . JText::_('COM_ETD_UNINSTALL_TEXT') . '</p>';
	}

	function update($parent)
	{
		echo '<p>' . JText::_('COM_ETD_UPDATE_TEXT') . '</p>';
	}

	function preflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_ETD_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	function postflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_ETD_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
