<?php


abstract class BaseRelDocenteEstablecimientoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rel_docente_establecimiento';

	
	const CLASS_DEFAULT = 'lib.model.RelDocenteEstablecimiento';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'rel_docente_establecimiento.ID';

	
	const FK_ESTABLECIMIENTO_ID = 'rel_docente_establecimiento.FK_ESTABLECIMIENTO_ID';

	
	const FK_DOCENTE_ID = 'rel_docente_establecimiento.FK_DOCENTE_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEstablecimientoId', 'FkDocenteId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkEstablecimientoId', 'fkDocenteId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ESTABLECIMIENTO_ID, self::FK_DOCENTE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_establecimiento_id', 'fk_docente_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEstablecimientoId' => 1, 'FkDocenteId' => 2, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkEstablecimientoId' => 1, 'fkDocenteId' => 2, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ESTABLECIMIENTO_ID => 1, self::FK_DOCENTE_ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_establecimiento_id' => 1, 'fk_docente_id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RelDocenteEstablecimientoMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(RelDocenteEstablecimientoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RelDocenteEstablecimientoPeer::ID);

		$criteria->addSelectColumn(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDocenteEstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RelDocenteEstablecimientoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RelDocenteEstablecimientoPeer::populateObjects(RelDocenteEstablecimientoPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(RelDocenteEstablecimiento $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RelDocenteEstablecimiento) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RelDocenteEstablecimiento object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = RelDocenteEstablecimientoPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RelDocenteEstablecimientoPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDocenteEstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDocente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDocenteEstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDocenteEstablecimientoPeer::addSelectColumns($c);
		$startcol = (RelDocenteEstablecimientoPeer::NUM_COLUMNS - RelDocenteEstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDocenteEstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDocenteEstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDocenteEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDocente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDocenteEstablecimientoPeer::addSelectColumns($c);
		$startcol = (RelDocenteEstablecimientoPeer::NUM_COLUMNS - RelDocenteEstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDocenteEstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = RelDocenteEstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocentePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DocentePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDocenteEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(RelDocenteEstablecimientoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDocenteEstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (RelDocenteEstablecimientoPeer::NUM_COLUMNS - RelDocenteEstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDocenteEstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDocenteEstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDocenteEstablecimiento($obj1);
			} 
			
			$key3 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DocentePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DocentePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addRelDocenteEstablecimiento($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDocente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RelDocenteEstablecimientoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDocenteEstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (RelDocenteEstablecimientoPeer::NUM_COLUMNS - RelDocenteEstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_DOCENTE_ID,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDocenteEstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDocenteEstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DocentePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDocenteEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RelDocenteEstablecimientoPeer::addSelectColumns($c);
		$startcol2 = (RelDocenteEstablecimientoPeer::NUM_COLUMNS - RelDocenteEstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(RelDocenteEstablecimientoPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = RelDocenteEstablecimientoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = RelDocenteEstablecimientoPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = RelDocenteEstablecimientoPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				RelDocenteEstablecimientoPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addRelDocenteEstablecimiento($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return RelDocenteEstablecimientoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(RelDocenteEstablecimientoPeer::ID) && $criteria->keyContainsValue(RelDocenteEstablecimientoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RelDocenteEstablecimientoPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(RelDocenteEstablecimientoPeer::ID);
			$selectCriteria->add(RelDocenteEstablecimientoPeer::ID, $criteria->remove(RelDocenteEstablecimientoPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RelDocenteEstablecimientoPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												RelDocenteEstablecimientoPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof RelDocenteEstablecimiento) {
						RelDocenteEstablecimientoPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RelDocenteEstablecimientoPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								RelDocenteEstablecimientoPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(RelDocenteEstablecimiento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RelDocenteEstablecimientoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RelDocenteEstablecimientoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(RelDocenteEstablecimientoPeer::DATABASE_NAME, RelDocenteEstablecimientoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RelDocenteEstablecimientoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RelDocenteEstablecimientoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RelDocenteEstablecimientoPeer::DATABASE_NAME);
		$criteria->add(RelDocenteEstablecimientoPeer::ID, $pk);

		$v = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RelDocenteEstablecimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RelDocenteEstablecimientoPeer::DATABASE_NAME);
			$criteria->add(RelDocenteEstablecimientoPeer::ID, $pks, Criteria::IN);
			$objs = RelDocenteEstablecimientoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseRelDocenteEstablecimientoPeer::DATABASE_NAME)->addTableBuilder(BaseRelDocenteEstablecimientoPeer::TABLE_NAME, BaseRelDocenteEstablecimientoPeer::getMapBuilder());

