<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class JControllerLegacy extends JController
{
}

jimport('joomla.application.component.view');

class JViewLegacy extends JView
{
}

jimport('joomla.application.component.model');

class JModelLegacy extends JModel
{
  public static function addIncludePath($path = '', $prefix = '')
  {
    return parent::addIncludePath($path, $prefix);
  }
}

