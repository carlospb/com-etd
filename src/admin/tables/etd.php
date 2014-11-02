<?php
defined('_JEXEC') or die;

class EtdTableEtd extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__etd', 'id', $db);
	}

	public function bind($array, $ignore = '')
	{
		return parent::bind($array, $ignore);
	}

	public function store($updateNulls = false)
	{
		return parent::store($updateNulls);
	}
}
