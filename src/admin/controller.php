<?php
defined('_JEXEC') or die;

class EtdController extends JControllerLegacy
{
	protected $default_view = 'etds';

	public function display($cachable = false, $urlparams = false)
	{
        require_once JPATH_COMPONENT.'/helpers/etd.php';
		
		// set default view if not set
        // $input = JFactory::getApplication()->input;
    
		$view   = $this->input->get('view', 'etds');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');

		if ($view == 'etd' && $layout == 'edit' && !$this->checkEditId('com_etd.edit.etd', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_etd&view=etds', false));

			return false;
		}

		parent::display();

		return $this;
	}
}
