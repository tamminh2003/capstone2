<?php

namespace Propel\Map;

use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
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
 * This class defines the structure of the 'poct_device' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PoctDeviceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.PoctDeviceTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'poct_device';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\PoctDevice';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.PoctDevice';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the poct_device_id field
     */
    const COL_POCT_DEVICE_ID = 'poct_device.poct_device_id';

    /**
     * the column name for the user_user_id field
     */
    const COL_USER_USER_ID = 'poct_device.user_user_id';

    /**
     * the column name for the poct_device_manufacture_name field
     */
    const COL_POCT_DEVICE_MANUFACTURE_NAME = 'poct_device.poct_device_manufacture_name';

    /**
     * the column name for the poct_device_generic_name field
     */
    const COL_POCT_DEVICE_GENERIC_NAME = 'poct_device.poct_device_generic_name';

    /**
     * the column name for the device_model field
     */
    const COL_DEVICE_MODEL = 'poct_device.device_model';

    /**
     * the column name for the device_image_url field
     */
    const COL_DEVICE_IMAGE_URL = 'poct_device.device_image_url';

    /**
     * the column name for the device_type field
     */
    const COL_DEVICE_TYPE = 'poct_device.device_type';

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
        self::TYPE_PHPNAME       => array('PoctDeviceId', 'UserUserId', 'PoctDeviceManufactureName', 'PoctDeviceGenericName', 'DeviceModel', 'DeviceImageUrl', 'DeviceType', ),
        self::TYPE_CAMELNAME     => array('poctDeviceId', 'userUserId', 'poctDeviceManufactureName', 'poctDeviceGenericName', 'deviceModel', 'deviceImageUrl', 'deviceType', ),
        self::TYPE_COLNAME       => array(PoctDeviceTableMap::COL_POCT_DEVICE_ID, PoctDeviceTableMap::COL_USER_USER_ID, PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME, PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME, PoctDeviceTableMap::COL_DEVICE_MODEL, PoctDeviceTableMap::COL_DEVICE_IMAGE_URL, PoctDeviceTableMap::COL_DEVICE_TYPE, ),
        self::TYPE_FIELDNAME     => array('poct_device_id', 'user_user_id', 'poct_device_manufacture_name', 'poct_device_generic_name', 'device_model', 'device_image_url', 'device_type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PoctDeviceId' => 0, 'UserUserId' => 1, 'PoctDeviceManufactureName' => 2, 'PoctDeviceGenericName' => 3, 'DeviceModel' => 4, 'DeviceImageUrl' => 5, 'DeviceType' => 6, ),
        self::TYPE_CAMELNAME     => array('poctDeviceId' => 0, 'userUserId' => 1, 'poctDeviceManufactureName' => 2, 'poctDeviceGenericName' => 3, 'deviceModel' => 4, 'deviceImageUrl' => 5, 'deviceType' => 6, ),
        self::TYPE_COLNAME       => array(PoctDeviceTableMap::COL_POCT_DEVICE_ID => 0, PoctDeviceTableMap::COL_USER_USER_ID => 1, PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME => 2, PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME => 3, PoctDeviceTableMap::COL_DEVICE_MODEL => 4, PoctDeviceTableMap::COL_DEVICE_IMAGE_URL => 5, PoctDeviceTableMap::COL_DEVICE_TYPE => 6, ),
        self::TYPE_FIELDNAME     => array('poct_device_id' => 0, 'user_user_id' => 1, 'poct_device_manufacture_name' => 2, 'poct_device_generic_name' => 3, 'device_model' => 4, 'device_image_url' => 5, 'device_type' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'PoctDeviceId' => 'POCT_DEVICE_ID',
        'PoctDevice.PoctDeviceId' => 'POCT_DEVICE_ID',
        'poctDeviceId' => 'POCT_DEVICE_ID',
        'poctDevice.poctDeviceId' => 'POCT_DEVICE_ID',
        'PoctDeviceTableMap::COL_POCT_DEVICE_ID' => 'POCT_DEVICE_ID',
        'COL_POCT_DEVICE_ID' => 'POCT_DEVICE_ID',
        'poct_device_id' => 'POCT_DEVICE_ID',
        'poct_device.poct_device_id' => 'POCT_DEVICE_ID',
        'UserUserId' => 'USER_USER_ID',
        'PoctDevice.UserUserId' => 'USER_USER_ID',
        'userUserId' => 'USER_USER_ID',
        'poctDevice.userUserId' => 'USER_USER_ID',
        'PoctDeviceTableMap::COL_USER_USER_ID' => 'USER_USER_ID',
        'COL_USER_USER_ID' => 'USER_USER_ID',
        'user_user_id' => 'USER_USER_ID',
        'poct_device.user_user_id' => 'USER_USER_ID',
        'PoctDeviceManufactureName' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'PoctDevice.PoctDeviceManufactureName' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'poctDeviceManufactureName' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'poctDevice.poctDeviceManufactureName' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'COL_POCT_DEVICE_MANUFACTURE_NAME' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'poct_device_manufacture_name' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'poct_device.poct_device_manufacture_name' => 'POCT_DEVICE_MANUFACTURE_NAME',
        'PoctDeviceGenericName' => 'POCT_DEVICE_GENERIC_NAME',
        'PoctDevice.PoctDeviceGenericName' => 'POCT_DEVICE_GENERIC_NAME',
        'poctDeviceGenericName' => 'POCT_DEVICE_GENERIC_NAME',
        'poctDevice.poctDeviceGenericName' => 'POCT_DEVICE_GENERIC_NAME',
        'PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME' => 'POCT_DEVICE_GENERIC_NAME',
        'COL_POCT_DEVICE_GENERIC_NAME' => 'POCT_DEVICE_GENERIC_NAME',
        'poct_device_generic_name' => 'POCT_DEVICE_GENERIC_NAME',
        'poct_device.poct_device_generic_name' => 'POCT_DEVICE_GENERIC_NAME',
        'DeviceModel' => 'DEVICE_MODEL',
        'PoctDevice.DeviceModel' => 'DEVICE_MODEL',
        'deviceModel' => 'DEVICE_MODEL',
        'poctDevice.deviceModel' => 'DEVICE_MODEL',
        'PoctDeviceTableMap::COL_DEVICE_MODEL' => 'DEVICE_MODEL',
        'COL_DEVICE_MODEL' => 'DEVICE_MODEL',
        'device_model' => 'DEVICE_MODEL',
        'poct_device.device_model' => 'DEVICE_MODEL',
        'DeviceImageUrl' => 'DEVICE_IMAGE_URL',
        'PoctDevice.DeviceImageUrl' => 'DEVICE_IMAGE_URL',
        'deviceImageUrl' => 'DEVICE_IMAGE_URL',
        'poctDevice.deviceImageUrl' => 'DEVICE_IMAGE_URL',
        'PoctDeviceTableMap::COL_DEVICE_IMAGE_URL' => 'DEVICE_IMAGE_URL',
        'COL_DEVICE_IMAGE_URL' => 'DEVICE_IMAGE_URL',
        'device_image_url' => 'DEVICE_IMAGE_URL',
        'poct_device.device_image_url' => 'DEVICE_IMAGE_URL',
        'DeviceType' => 'DEVICE_TYPE',
        'PoctDevice.DeviceType' => 'DEVICE_TYPE',
        'deviceType' => 'DEVICE_TYPE',
        'poctDevice.deviceType' => 'DEVICE_TYPE',
        'PoctDeviceTableMap::COL_DEVICE_TYPE' => 'DEVICE_TYPE',
        'COL_DEVICE_TYPE' => 'DEVICE_TYPE',
        'device_type' => 'DEVICE_TYPE',
        'poct_device.device_type' => 'DEVICE_TYPE',
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
        $this->setName('poct_device');
        $this->setPhpName('PoctDevice');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\PoctDevice');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('poct_device_id', 'PoctDeviceId', 'INTEGER', true, null, null);
        $this->addForeignKey('user_user_id', 'UserUserId', 'INTEGER', 'users', 'user_id', true, null, null);
        $this->addColumn('poct_device_manufacture_name', 'PoctDeviceManufactureName', 'VARCHAR', false, 255, null);
        $this->addColumn('poct_device_generic_name', 'PoctDeviceGenericName', 'VARCHAR', false, 255, null);
        $this->addColumn('device_model', 'DeviceModel', 'VARCHAR', false, 255, null);
        $this->addColumn('device_image_url', 'DeviceImageUrl', 'VARCHAR', false, 255, null);
        $this->addColumn('device_type', 'DeviceType', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('Users', '\\Propel\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
  ),
), null, null, null, false);
        $this->addRelation('PoctDeviceAditionalInfo', '\\Propel\\PoctDeviceAditionalInfo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idpoct_device',
    1 => ':poct_device_id',
  ),
), null, null, 'PoctDeviceAditionalInfos', false);
        $this->addRelation('PoctDeviceDetailsTimestamps', '\\Propel\\PoctDeviceDetailsTimestamps', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':poct_device_poct_device_id',
    1 => ':poct_device_id',
  ),
), null, null, 'PoctDeviceDetailsTimestampss', false);
        $this->addRelation('PoctDeviceHasDisease', '\\Propel\\PoctDeviceHasDisease', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':poct_device_id',
    1 => ':poct_device_id',
  ),
), null, null, 'PoctDeviceHasDiseases', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PoctDeviceTableMap::CLASS_DEFAULT : PoctDeviceTableMap::OM_CLASS;
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
     * @return array           (PoctDevice object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PoctDeviceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PoctDeviceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PoctDeviceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PoctDeviceTableMap::OM_CLASS;
            /** @var PoctDevice $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PoctDeviceTableMap::addInstanceToPool($obj, $key);
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
            $key = PoctDeviceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PoctDeviceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PoctDevice $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PoctDeviceTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_ID);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_USER_USER_ID);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_DEVICE_MODEL);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL);
            $criteria->addSelectColumn(PoctDeviceTableMap::COL_DEVICE_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.poct_device_id');
            $criteria->addSelectColumn($alias . '.user_user_id');
            $criteria->addSelectColumn($alias . '.poct_device_manufacture_name');
            $criteria->addSelectColumn($alias . '.poct_device_generic_name');
            $criteria->addSelectColumn($alias . '.device_model');
            $criteria->addSelectColumn($alias . '.device_image_url');
            $criteria->addSelectColumn($alias . '.device_type');
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
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_ID);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_USER_USER_ID);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_DEVICE_MODEL);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL);
            $criteria->removeSelectColumn(PoctDeviceTableMap::COL_DEVICE_TYPE);
        } else {
            $criteria->removeSelectColumn($alias . '.poct_device_id');
            $criteria->removeSelectColumn($alias . '.user_user_id');
            $criteria->removeSelectColumn($alias . '.poct_device_manufacture_name');
            $criteria->removeSelectColumn($alias . '.poct_device_generic_name');
            $criteria->removeSelectColumn($alias . '.device_model');
            $criteria->removeSelectColumn($alias . '.device_image_url');
            $criteria->removeSelectColumn($alias . '.device_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(PoctDeviceTableMap::DATABASE_NAME)->getTable(PoctDeviceTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a PoctDevice or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PoctDevice object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\PoctDevice) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PoctDeviceTableMap::DATABASE_NAME);
            $criteria->add(PoctDeviceTableMap::COL_POCT_DEVICE_ID, (array) $values, Criteria::IN);
        }

        $query = PoctDeviceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PoctDeviceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PoctDeviceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the poct_device table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PoctDeviceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PoctDevice or Criteria object.
     *
     * @param mixed               $criteria Criteria or PoctDevice object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PoctDevice object
        }

        if ($criteria->containsKey(PoctDeviceTableMap::COL_POCT_DEVICE_ID) && $criteria->keyContainsValue(PoctDeviceTableMap::COL_POCT_DEVICE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PoctDeviceTableMap::COL_POCT_DEVICE_ID.')');
        }


        // Set the correct dbName
        $query = PoctDeviceQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PoctDeviceTableMap
