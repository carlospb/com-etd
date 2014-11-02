<?php
defined('_JEXEC') or die;

class EtdModelEtd extends JModelAdmin
{
	protected $text_prefix = 'COM_ETD';

	public function getTable($type = 'Etd', $prefix = 'EtdTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_etd.etd', 'etd', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_etd.edit.etd.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	protected function prepareTable($table)
	{
		$table->title		= htmlspecialchars_decode($table->title, ENT_QUOTES);
	}
}
