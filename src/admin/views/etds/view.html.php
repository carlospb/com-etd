<?php
defined('_JEXEC') or die;

class EtdViewEtds extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$canDo	= EtdHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_ETD_MANAGER_ETDS'), '');

		JToolbarHelper::addNew('etd.add');

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('etd.edit');
		}
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_etd');
		}
	}
}
