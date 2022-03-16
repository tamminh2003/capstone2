<?php

namespace Propel\Map;

use Propel\PoctDeviceDetailsTimestamps;
use Propel\PoctDeviceDetailsTimestampsQuery;
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
 * This class defines the structure of the 'poct_device_details_timestamps' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PoctDeviceDetailsTimestampsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.PoctDeviceDetailsTimestampsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'poct_device_details_timestamps';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\PoctDeviceDetailsTimestamps';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.PoctDeviceDetailsTimestamps';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the poct_device_details_timestamps_id field
     */
    const COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID = 'poct_device_details_timestamps.poct_device_details_timestamps_id';

    /**
     * the column name for the poct_device_poct_device_id field
     */
    const COL_POCT_DEVICE_POCT_DEVICE_ID = 'poct_device_details_timestamps.poct_device_poct_device_id';

    /**
     * the column name for the user_user_id field
     */
    const COL_USER_USER_ID = 'poct_device_details_timestamps.user_user_id';

    /**
     * the column name for the create_time field
     */
    const COL_CREATE_TIME = 'poct_device_details_timestamps.create_time';

    /**
     * the column name for the update_time field
     */
    const COL_UPDATE_TIME = 'poct_device_details_timestamps.update_time';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'poct_device_details_timestamps.comment';

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
        self::TYPE_PHPNAME       => array('PoctDeviceDetailsTimestampsId', 'PoctDevicePoctDeviceId', 'UserUserId', 'CreateTime', 'UpdateTime', 'Comment', ),
        self::TYPE_CAMELNAME     => array('poctDeviceDetailsTimestampsId', 'poctDevicePoctDeviceId', 'userUserId', 'createTime', 'updateTime', 'comment', ),
        self::TYPE_COLNAME       => array(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME, PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME, PoctDeviceDetailsTimestampsTableMap::COL_COMMENT, ),
        self::TYPE_FIELDNAME     => array('poct_device_details_timestamps_id', 'poct_device_poct_device_id', 'user_user_id', 'create_time', 'update_time', 'comment', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PoctDeviceDetailsTimestampsId' => 0, 'PoctDevicePoctDeviceId' => 1, 'UserUserId' => 2, 'CreateTime' => 3, 'UpdateTime' => 4, 'Comment' => 5, ),
        self::TYPE_CAMELNAME     => array('poctDeviceDetailsTimestampsId' => 0, 'poctDevicePoctDeviceId' => 1, 'userUserId' => 2, 'createTime' => 3, 'updateTime' => 4, 'comment' => 5, ),
        self::TYPE_COLNAME       => array(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID => 0, PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID => 1, PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID => 2, PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME => 3, PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME => 4, PoctDeviceDetailsTimestampsTableMap::COL_COMMENT => 5, ),
        self::TYPE_FIELDNAME     => array('poct_device_details_timestamps_id' => 0, 'poct_device_poct_device_id' => 1, 'user_user_id' => 2, 'create_time' => 3, 'update_time' => 4, 'comment' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'PoctDeviceDetailsTimestampsId' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'PoctDeviceDetailsTimestamps.PoctDeviceDetailsTimestampsId' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'poctDeviceDetailsTimestampsId' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'poctDeviceDetailsTimestamps.poctDeviceDetailsTimestampsId' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'poct_device_details_timestamps_id' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'poct_device_details_timestamps.poct_device_details_timestamps_id' => 'POCT_DEVICE_DETAILS_TIMESTAMPS_ID',
        'PoctDevicePoctDeviceId' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'PoctDeviceDetailsTimestamps.PoctDevicePoctDeviceId' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'poctDevicePoctDeviceId' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'poctDeviceDetailsTimestamps.poctDevicePoctDeviceId' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'COL_POCT_DEVICE_POCT_DEVICE_ID' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'poct_device_poct_device_id' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'poct_device_details_timestamps.poct_device_poct_device_id' => 'POCT_DEVICE_POCT_DEVICE_ID',
        'UserUserId' => 'USER_USER_ID',
        'PoctDeviceDetailsTimestamps.UserUserId' => 'USER_USER_ID',
        'userUserId' => 'USER_USER_ID',
        'poctDeviceDetailsTimestamps.userUserId' => 'USER_USER_ID',
        'PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID' => 'USER_USER_ID',
        'COL_USER_USER_ID' => 'USER_USER_ID',
        'user_user_id' => 'USER_USER_ID',
        'poct_device_details_timestamps.user_user_id' => 'USER_USER_ID',
        'CreateTime' => 'CREATE_TIME',
        'PoctDeviceDetailsTimestamps.CreateTime' => 'CREATE_TIME',
        'createTime' => 'CREATE_TIME',
        'poctDeviceDetailsTimestamps.createTime' => 'CREATE_TIME',
        'PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME' => 'CREATE_TIME',
        'COL_CREATE_TIME' => 'CREATE_TIME',
        'create_time' => 'CREATE_TIME',
        'poct_device_details_timestamps.create_time' => 'CREATE_TIME',
        'UpdateTime' => 'UPDATE_TIME',
        'PoctDeviceDetailsTimestamps.UpdateTime' => 'UPDATE_TIME',
        'updateTime' => 'UPDATE_TIME',
        'poctDeviceDetailsTimestamps.updateTime' => 'UPDATE_TIME',
        'PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME' => 'UPDATE_TIME',
        'COL_UPDATE_TIME' => 'UPDATE_TIME',
        'update_time' => 'UPDATE_TIME',
        'poct_device_details_timestamps.update_time' => 'UPDATE_TIME',
        'Comment' => 'COMMENT',
        'PoctDeviceDetailsTimestamps.Comment' => 'COMMENT',
        'comment' => 'COMMENT',
        'poctDeviceDetailsTimestamps.comment' => 'COMMENT',
        'PoctDeviceDetailsTimestampsTableMap::COL_COMMENT' => 'COMMENT',
        'COL_COMMENT' => 'COMMENT',
        'poct_device_details_timestamps.comment' => 'COMMENT',
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
        $this->setName('poct_device_details_timestamps');
        $this->setPhpName('PoctDeviceDetailsTimestamps');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\PoctDeviceDetailsTimestamps');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('poct_device_details_timestamps_id', 'PoctDeviceDetailsTimestampsId', 'INTEGER', true, null, null);
        $this->addForeignKey('poct_device_poct_device_id', 'PoctDevicePoctDeviceId', 'INTEGER', 'poct_device', 'poct_device_id', true, null, null);
        $this->addForeignKey('user_user_id', 'UserUserId', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addColumn('create_time', 'CreateTime', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('update_time', 'UpdateTime', 'TIMESTAMP', false, null, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('PoctDevice', '\\Propel\\PoctDevice', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':poct_device_poct_device_id',
    1 => ':poct_device_id',
  ),
), 'NO ACTION', 'NO ACTION', null, false);
        $this->addRelation('User', '\\Propel\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PoctDeviceDetailsTimestampsId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PoctDeviceDetailsTimestampsTableMap::CLASS_DEFAULT : PoctDeviceDetailsTimestampsTableMap::OM_CLASS;
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
     * @return array           (PoctDeviceDetailsTimestamps object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PoctDeviceDetailsTimestampsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PoctDeviceDetailsTimestampsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PoctDeviceDetailsTimestampsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PoctDeviceDetailsTimestampsTableMap::OM_CLASS;
            /** @var PoctDeviceDetailsTimestamps $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PoctDeviceDetailsTimestampsTableMap::addInstanceToPool($obj, $key);
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
            $key = PoctDeviceDetailsTimestampsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PoctDeviceDetailsTimestampsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PoctDeviceDetailsTimestamps $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PoctDeviceDetailsTimestampsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID);
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID);
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID);
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME);
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME);
            $criteria->addSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_COMMENT);
        } else {
            $criteria->addSelectColumn($alias . '.poct_device_details_timestamps_id');
            $criteria->addSelectColumn($alias . '.poct_device_poct_device_id');
            $criteria->addSelectColumn($alias . '.user_user_id');
            $criteria->addSelectColumn($alias . '.create_time');
            $criteria->addSelectColumn($alias . '.update_time');
            $criteria->addSelectColumn($alias . '.comment');
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
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID);
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID);
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID);
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME);
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME);
            $criteria->removeSelectColumn(PoctDeviceDetailsTimestampsTableMap::COL_COMMENT);
        } else {
            $criteria->removeSelectColumn($alias . '.poct_device_details_timestamps_id');
            $criteria->removeSelectColumn($alias . '.poct_device_poct_device_id');
            $criteria->removeSelectColumn($alias . '.user_user_id');
            $criteria->removeSelectColumn($alias . '.create_time');
            $criteria->removeSelectColumn($alias . '.update_time');
            $criteria->removeSelectColumn($alias . '.comment');
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
        return Propel::getServiceContainer()->getDatabaseMap(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME)->getTable(PoctDeviceDetailsTimestampsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a PoctDeviceDetailsTimestamps or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PoctDeviceDetailsTimestamps object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\PoctDeviceDetailsTimestamps) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
            $criteria->add(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, (array) $values, Criteria::IN);
        }

        $query = PoctDeviceDetailsTimestampsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PoctDeviceDetailsTimestampsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PoctDeviceDetailsTimestampsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the poct_device_details_timestamps table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PoctDeviceDetailsTimestampsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PoctDeviceDetailsTimestamps or Criteria object.
     *
     * @param mixed               $criteria Criteria or PoctDeviceDetailsTimestamps object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PoctDeviceDetailsTimestamps object
        }

        if ($criteria->containsKey(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID) && $criteria->keyContainsValue(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID.')');
        }


        // Set the correct dbName
        $query = PoctDeviceDetailsTimestampsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PoctDeviceDetailsTimestampsTableMap
