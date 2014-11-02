<?php
defined('_JEXEC') or die;

//jimport( 'joomla.application.component.modellist' );

class EtdModelEtds extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'titulo', 'a.titulo',
			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.titulo'
			)
		);
		$query->from($db->quoteName('#__etd').' AS a');

		return $query;
	}
}
