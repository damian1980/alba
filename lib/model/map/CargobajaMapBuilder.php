<?php



class CargobajaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CargobajaMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(CargobajaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CargobajaPeer::TABLE_NAME);
		$tMap->setPhpName('Cargobaja');
		$tMap->setClassname('Cargobaja');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 