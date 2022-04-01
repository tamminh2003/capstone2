<?php

namespace Propel\Map;

use Propel\PoctDeviceHasDisease;
use Propel\PoctDeviceHasDiseaseQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'poct_device_has_disease' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PoctDeviceHasDiseaseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.PoctDeviceHasDiseaseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'poct_device_has_disease';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\PoctDeviceHasDisease';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.PoctDeviceHasDisease';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the poct_device_has_disease_id field
     */
    const COL_POCT_DEVICE_HAS_DISEASE_ID = 'poct_device_has_disease.poct_device_has_disease_id';

    /**
     * the column name for the poct_device_id field
     */
    const COL_POCT_DEVICE_ID = 'poct_device_has_disease.poct_device_id';

    /**
     * the column name for the disease_id field
     */
    const COL_DISEASE_ID = 'poct_device_has_disease.disease_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('PoctDeviceHasDiseaseId', 'PoctDeviceId', 'DiseaseId', ),
        self::TYPE_CAMELNAME     => array('poctDeviceHasDiseaseId', 'poctDeviceId', 'diseaseId', ),
        self::TYPE_COLNAME       => array(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, ),
        self::TYPE_FIELDNAME     => array('poct_device_has_disease_id', 'poct_device_id', 'disease_id', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PoctDeviceHasDiseaseId' => 0, 'PoctDeviceId' => 1, 'DiseaseId' => 2, ),
        self::TYPE_CAMELNAME     => array('poctDeviceHasDiseaseId' => 0, 'poctDeviceId' => 1, 'diseaseId' => 2, ),
        self::TYPE_COLNAME       => array(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID => 0, PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID => 1, PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID => 2, ),
        self::TYPE_FIELDNAME     => array('poct_device_has_disease_id' => 0, 'poct_device_id' => 1, 'disease_id' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'PoctDeviceHasDiseaseId' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'PoctDeviceHasDisease.PoctDeviceHasDiseaseId' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'poctDeviceHasDiseaseId' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'poctDeviceHasDisease.poctDeviceHasDiseaseId' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'COL_POCT_DEVICE_HAS_DISEASE_ID' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'poct_device_has_disease_id' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'poct_device_has_disease.poct_device_has_disease_id' => 'POCT_DEVICE_HAS_DISEASE_ID',
        'PoctDeviceId' => 'POCT_DEVICE_ID',
        'PoctDeviceHasDisease.PoctDeviceId' => 'POCT_DEVICE_ID',
        'poctDeviceId' => 'POCT_DEVICE_ID',
        'poctDeviceHasDisease.poctDeviceId' => 'POCT_DEVICE_ID',
        'PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID' => 'POCT_DEVICE_ID',
        'COL_POCT_DEVICE_ID' => 'POCT_DEVICE_ID',
        'poct_device_id' => 'POCT_DEVICE_ID',
        'poct_device_has_disease.poct_device_id' => 'POCT_DEVICE_ID',
        'DiseaseId' => 'DISEASE_ID',
        'PoctDeviceHasDisease.DiseaseId' => 'DISEASE_ID',
        'diseaseId' => 'DISEASE_ID',
        'poctDeviceHasDisease.diseaseId' => 'DISEASE_ID',
        'PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID' => 'DISEASE_ID',
        'COL_DISEASE_ID' => 'DISEASE_ID',
        'disease_id' => 'DISEASE_ID',
        'poct_device_has_disease.disease_id' => 'DISEASE_ID',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('poct_device_has_disease');
        $this->setPhpName('PoctDeviceHasDisease');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\PoctDeviceHasDisease');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('poct_device_has_disease_id', 'PoctDeviceHasDiseaseId', 'INTEGER', true, null, null);
        $this->addForeignKey('poct_device_id', 'PoctDeviceId', 'INTEGER', 'poct_device', 'poct_device_id', true, null, null);
        $this->addForeignKey('disease_id', 'DiseaseId', 'INTEGER', 'disease', 'disease_id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('Disease', '\\Propel\\Disease', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':disease_id',
    1 => ':disease_id',
  ),
), 'NO ACTION', 'NO ACTION', null, false);
        $this->addRelation('PoctDevice', '\\Propel\\PoctDevice', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':poct_device_id',
    1 => ':poct_device_id',
  ),
), 'NO ACTION', 'NO ACTION', null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('PoctDeviceHasDiseaseId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PoctDeviceHasDiseaseTableMap::CLASS_DEFAULT : PoctDeviceHasDiseaseTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (PoctDeviceHasDisease object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PoctDeviceHasDiseaseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PoctDeviceHasDiseaseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PoctDeviceHasDiseaseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PoctDeviceHasDiseaseTableMap::OM_CLASS;
            /** @var PoctDeviceHasDisease $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PoctDeviceHasDiseaseTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PoctDeviceHasDiseaseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PoctDeviceHasDiseaseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PoctDeviceHasDisease $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PoctDeviceHasDiseaseTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID);
            $criteria->addSelectColumn(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID);
            $criteria->addSelectColumn(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.poct_device_has_disease_id');
            $criteria->addSelectColumn($alias . '.poct_device_id');
            $criteria->addSelectColumn($alias . '.disease_id');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID);
            $criteria->removeSelectColumn(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID);
            $criteria->removeSelectColumn(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID);
        } else {
            $criteria->removeSelectColumn($alias . '.poct_device_has_disease_id');
            $criteria->removeSelectColumn($alias . '.poct_device_id');
            $criteria->removeSelectColumn($alias . '.disease_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PoctDeviceHasDiseaseTableMap::DATABASE_NAME)->getTable(PoctDeviceHasDiseaseTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a PoctDeviceHasDisease or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PoctDeviceHasDisease object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\PoctDeviceHasDisease) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
            $criteria->add(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, (array) $values, Criteria::IN);
        }

        $query = PoctDeviceHasDiseaseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PoctDeviceHasDiseaseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PoctDeviceHasDiseaseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the poct_device_has_disease table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PoctDeviceHasDiseaseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PoctDeviceHasDisease or Criteria object.
     *
     * @param mixed               $criteria Criteria or PoctDeviceHasDisease object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PoctDeviceHasDisease object
        }

        if ($criteria->containsKey(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID) && $criteria->keyContainsValue(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID.')');
        }


        // Set the correct dbName
        $query = PoctDeviceHasDiseaseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PoctDeviceHasDiseaseTableMap
