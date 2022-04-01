<?php

namespace Propel\Map;

use Propel\Disease;
use Propel\DiseaseQuery;
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
 * This class defines the structure of the 'disease' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class DiseaseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.DiseaseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'disease';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Disease';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Disease';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the disease_id field
     */
    const COL_DISEASE_ID = 'disease.disease_id';

    /**
     * the column name for the disease_api_key field
     */
    const COL_DISEASE_API_KEY = 'disease.disease_api_key';

    /**
     * the column name for the disease_name field
     */
    const COL_DISEASE_NAME = 'disease.disease_name';

    /**
     * the column name for the disease_group field
     */
    const COL_DISEASE_GROUP = 'disease.disease_group';

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
        self::TYPE_PHPNAME       => array('DiseaseId', 'DiseaseApiKey', 'DiseaseName', 'DiseaseGroup', ),
        self::TYPE_CAMELNAME     => array('diseaseId', 'diseaseApiKey', 'diseaseName', 'diseaseGroup', ),
        self::TYPE_COLNAME       => array(DiseaseTableMap::COL_DISEASE_ID, DiseaseTableMap::COL_DISEASE_API_KEY, DiseaseTableMap::COL_DISEASE_NAME, DiseaseTableMap::COL_DISEASE_GROUP, ),
        self::TYPE_FIELDNAME     => array('disease_id', 'disease_api_key', 'disease_name', 'disease_group', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DiseaseId' => 0, 'DiseaseApiKey' => 1, 'DiseaseName' => 2, 'DiseaseGroup' => 3, ),
        self::TYPE_CAMELNAME     => array('diseaseId' => 0, 'diseaseApiKey' => 1, 'diseaseName' => 2, 'diseaseGroup' => 3, ),
        self::TYPE_COLNAME       => array(DiseaseTableMap::COL_DISEASE_ID => 0, DiseaseTableMap::COL_DISEASE_API_KEY => 1, DiseaseTableMap::COL_DISEASE_NAME => 2, DiseaseTableMap::COL_DISEASE_GROUP => 3, ),
        self::TYPE_FIELDNAME     => array('disease_id' => 0, 'disease_api_key' => 1, 'disease_name' => 2, 'disease_group' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'DiseaseId' => 'DISEASE_ID',
        'Disease.DiseaseId' => 'DISEASE_ID',
        'diseaseId' => 'DISEASE_ID',
        'disease.diseaseId' => 'DISEASE_ID',
        'DiseaseTableMap::COL_DISEASE_ID' => 'DISEASE_ID',
        'COL_DISEASE_ID' => 'DISEASE_ID',
        'disease_id' => 'DISEASE_ID',
        'disease.disease_id' => 'DISEASE_ID',
        'DiseaseApiKey' => 'DISEASE_API_KEY',
        'Disease.DiseaseApiKey' => 'DISEASE_API_KEY',
        'diseaseApiKey' => 'DISEASE_API_KEY',
        'disease.diseaseApiKey' => 'DISEASE_API_KEY',
        'DiseaseTableMap::COL_DISEASE_API_KEY' => 'DISEASE_API_KEY',
        'COL_DISEASE_API_KEY' => 'DISEASE_API_KEY',
        'disease_api_key' => 'DISEASE_API_KEY',
        'disease.disease_api_key' => 'DISEASE_API_KEY',
        'DiseaseName' => 'DISEASE_NAME',
        'Disease.DiseaseName' => 'DISEASE_NAME',
        'diseaseName' => 'DISEASE_NAME',
        'disease.diseaseName' => 'DISEASE_NAME',
        'DiseaseTableMap::COL_DISEASE_NAME' => 'DISEASE_NAME',
        'COL_DISEASE_NAME' => 'DISEASE_NAME',
        'disease_name' => 'DISEASE_NAME',
        'disease.disease_name' => 'DISEASE_NAME',
        'DiseaseGroup' => 'DISEASE_GROUP',
        'Disease.DiseaseGroup' => 'DISEASE_GROUP',
        'diseaseGroup' => 'DISEASE_GROUP',
        'disease.diseaseGroup' => 'DISEASE_GROUP',
        'DiseaseTableMap::COL_DISEASE_GROUP' => 'DISEASE_GROUP',
        'COL_DISEASE_GROUP' => 'DISEASE_GROUP',
        'disease_group' => 'DISEASE_GROUP',
        'disease.disease_group' => 'DISEASE_GROUP',
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
        $this->setName('disease');
        $this->setPhpName('Disease');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Disease');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('disease_id', 'DiseaseId', 'INTEGER', true, null, null);
        $this->addColumn('disease_api_key', 'DiseaseApiKey', 'VARCHAR', false, 100, null);
        $this->addColumn('disease_name', 'DiseaseName', 'VARCHAR', false, 100, null);
        $this->addColumn('disease_group', 'DiseaseGroup', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('PoctDeviceHasDisease', '\\Propel\\PoctDeviceHasDisease', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':disease_id',
    1 => ':disease_id',
  ),
), 'NO ACTION', 'NO ACTION', 'PoctDeviceHasDiseases', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DiseaseTableMap::CLASS_DEFAULT : DiseaseTableMap::OM_CLASS;
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
     * @return array           (Disease object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DiseaseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DiseaseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DiseaseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DiseaseTableMap::OM_CLASS;
            /** @var Disease $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DiseaseTableMap::addInstanceToPool($obj, $key);
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
            $key = DiseaseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DiseaseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Disease $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DiseaseTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DiseaseTableMap::COL_DISEASE_ID);
            $criteria->addSelectColumn(DiseaseTableMap::COL_DISEASE_API_KEY);
            $criteria->addSelectColumn(DiseaseTableMap::COL_DISEASE_NAME);
            $criteria->addSelectColumn(DiseaseTableMap::COL_DISEASE_GROUP);
        } else {
            $criteria->addSelectColumn($alias . '.disease_id');
            $criteria->addSelectColumn($alias . '.disease_api_key');
            $criteria->addSelectColumn($alias . '.disease_name');
            $criteria->addSelectColumn($alias . '.disease_group');
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
            $criteria->removeSelectColumn(DiseaseTableMap::COL_DISEASE_ID);
            $criteria->removeSelectColumn(DiseaseTableMap::COL_DISEASE_API_KEY);
            $criteria->removeSelectColumn(DiseaseTableMap::COL_DISEASE_NAME);
            $criteria->removeSelectColumn(DiseaseTableMap::COL_DISEASE_GROUP);
        } else {
            $criteria->removeSelectColumn($alias . '.disease_id');
            $criteria->removeSelectColumn($alias . '.disease_api_key');
            $criteria->removeSelectColumn($alias . '.disease_name');
            $criteria->removeSelectColumn($alias . '.disease_group');
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
        return Propel::getServiceContainer()->getDatabaseMap(DiseaseTableMap::DATABASE_NAME)->getTable(DiseaseTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Disease or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Disease object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Disease) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DiseaseTableMap::DATABASE_NAME);
            $criteria->add(DiseaseTableMap::COL_DISEASE_ID, (array) $values, Criteria::IN);
        }

        $query = DiseaseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DiseaseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DiseaseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the disease table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DiseaseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Disease or Criteria object.
     *
     * @param mixed               $criteria Criteria or Disease object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Disease object
        }

        if ($criteria->containsKey(DiseaseTableMap::COL_DISEASE_ID) && $criteria->keyContainsValue(DiseaseTableMap::COL_DISEASE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DiseaseTableMap::COL_DISEASE_ID.')');
        }


        // Set the correct dbName
        $query = DiseaseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DiseaseTableMap
