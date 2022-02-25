<?php

namespace Propel\Map;

use Propel\PoctDeviceAditionalInfo;
use Propel\PoctDeviceAditionalInfoQuery;
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
 * This class defines the structure of the 'poct_device_aditional_info' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PoctDeviceAditionalInfoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.PoctDeviceAditionalInfoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'poct_device_aditional_info';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\PoctDeviceAditionalInfo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.PoctDeviceAditionalInfo';

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
     * the column name for the poct_device_aditional_info_id field
     */
    const COL_POCT_DEVICE_ADITIONAL_INFO_ID = 'poct_device_aditional_info.poct_device_aditional_info_id';

    /**
     * the column name for the idpoct_device field
     */
    const COL_IDPOCT_DEVICE = 'poct_device_aditional_info.idpoct_device';

    /**
     * the column name for the user_user_id field
     */
    const COL_USER_USER_ID = 'poct_device_aditional_info.user_user_id';

    /**
     * the column name for the poct_device_aditional_info_label field
     */
    const COL_POCT_DEVICE_ADITIONAL_INFO_LABEL = 'poct_device_aditional_info.poct_device_aditional_info_label';

    /**
     * the column name for the poct_device_aditional_info_type field
     */
    const COL_POCT_DEVICE_ADITIONAL_INFO_TYPE = 'poct_device_aditional_info.poct_device_aditional_info_type';

    /**
     * the column name for the poct_device_aditional_info_details field
     */
    const COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS = 'poct_device_aditional_info.poct_device_aditional_info_details';

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
        self::TYPE_PHPNAME       => array('PoctDeviceAditionalInfoId', 'IdpoctDevice', 'UserUserId', 'PoctDeviceAditionalInfoLabel', 'PoctDeviceAditionalInfoType', 'PoctDeviceAditionalInfoDetails', ),
        self::TYPE_CAMELNAME     => array('poctDeviceAditionalInfoId', 'idpoctDevice', 'userUserId', 'poctDeviceAditionalInfoLabel', 'poctDeviceAditionalInfoType', 'poctDeviceAditionalInfoDetails', ),
        self::TYPE_COLNAME       => array(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS, ),
        self::TYPE_FIELDNAME     => array('poct_device_aditional_info_id', 'idpoct_device', 'user_user_id', 'poct_device_aditional_info_label', 'poct_device_aditional_info_type', 'poct_device_aditional_info_details', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PoctDeviceAditionalInfoId' => 0, 'IdpoctDevice' => 1, 'UserUserId' => 2, 'PoctDeviceAditionalInfoLabel' => 3, 'PoctDeviceAditionalInfoType' => 4, 'PoctDeviceAditionalInfoDetails' => 5, ),
        self::TYPE_CAMELNAME     => array('poctDeviceAditionalInfoId' => 0, 'idpoctDevice' => 1, 'userUserId' => 2, 'poctDeviceAditionalInfoLabel' => 3, 'poctDeviceAditionalInfoType' => 4, 'poctDeviceAditionalInfoDetails' => 5, ),
        self::TYPE_COLNAME       => array(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID => 0, PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE => 1, PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID => 2, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL => 3, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE => 4, PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS => 5, ),
        self::TYPE_FIELDNAME     => array('poct_device_aditional_info_id' => 0, 'idpoct_device' => 1, 'user_user_id' => 2, 'poct_device_aditional_info_label' => 3, 'poct_device_aditional_info_type' => 4, 'poct_device_aditional_info_details' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'PoctDeviceAditionalInfoId' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'PoctDeviceAditionalInfo.PoctDeviceAditionalInfoId' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'poctDeviceAditionalInfoId' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'poctDeviceAditionalInfo.poctDeviceAditionalInfoId' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'COL_POCT_DEVICE_ADITIONAL_INFO_ID' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'poct_device_aditional_info_id' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'poct_device_aditional_info.poct_device_aditional_info_id' => 'POCT_DEVICE_ADITIONAL_INFO_ID',
        'IdpoctDevice' => 'IDPOCT_DEVICE',
        'PoctDeviceAditionalInfo.IdpoctDevice' => 'IDPOCT_DEVICE',
        'idpoctDevice' => 'IDPOCT_DEVICE',
        'poctDeviceAditionalInfo.idpoctDevice' => 'IDPOCT_DEVICE',
        'PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE' => 'IDPOCT_DEVICE',
        'COL_IDPOCT_DEVICE' => 'IDPOCT_DEVICE',
        'idpoct_device' => 'IDPOCT_DEVICE',
        'poct_device_aditional_info.idpoct_device' => 'IDPOCT_DEVICE',
        'UserUserId' => 'USER_USER_ID',
        'PoctDeviceAditionalInfo.UserUserId' => 'USER_USER_ID',
        'userUserId' => 'USER_USER_ID',
        'poctDeviceAditionalInfo.userUserId' => 'USER_USER_ID',
        'PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID' => 'USER_USER_ID',
        'COL_USER_USER_ID' => 'USER_USER_ID',
        'user_user_id' => 'USER_USER_ID',
        'poct_device_aditional_info.user_user_id' => 'USER_USER_ID',
        'PoctDeviceAditionalInfoLabel' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'PoctDeviceAditionalInfo.PoctDeviceAditionalInfoLabel' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'poctDeviceAditionalInfoLabel' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'poctDeviceAditionalInfo.poctDeviceAditionalInfoLabel' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'COL_POCT_DEVICE_ADITIONAL_INFO_LABEL' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'poct_device_aditional_info_label' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'poct_device_aditional_info.poct_device_aditional_info_label' => 'POCT_DEVICE_ADITIONAL_INFO_LABEL',
        'PoctDeviceAditionalInfoType' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'PoctDeviceAditionalInfo.PoctDeviceAditionalInfoType' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'poctDeviceAditionalInfoType' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'poctDeviceAditionalInfo.poctDeviceAditionalInfoType' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'COL_POCT_DEVICE_ADITIONAL_INFO_TYPE' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'poct_device_aditional_info_type' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'poct_device_aditional_info.poct_device_aditional_info_type' => 'POCT_DEVICE_ADITIONAL_INFO_TYPE',
        'PoctDeviceAditionalInfoDetails' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'PoctDeviceAditionalInfo.PoctDeviceAditionalInfoDetails' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'poctDeviceAditionalInfoDetails' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'poctDeviceAditionalInfo.poctDeviceAditionalInfoDetails' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'poct_device_aditional_info_details' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
        'poct_device_aditional_info.poct_device_aditional_info_details' => 'POCT_DEVICE_ADITIONAL_INFO_DETAILS',
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
        $this->setName('poct_device_aditional_info');
        $this->setPhpName('PoctDeviceAditionalInfo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\PoctDeviceAditionalInfo');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('poct_device_aditional_info_id', 'PoctDeviceAditionalInfoId', 'INTEGER', true, null, null);
        $this->addForeignKey('idpoct_device', 'IdpoctDevice', 'INTEGER', 'poct_device', 'poct_device_id', true, null, null);
        $this->addForeignKey('user_user_id', 'UserUserId', 'INTEGER', 'users', 'user_id', true, null, null);
        $this->addColumn('poct_device_aditional_info_label', 'PoctDeviceAditionalInfoLabel', 'VARCHAR', false, 100, null);
        $this->addColumn('poct_device_aditional_info_type', 'PoctDeviceAditionalInfoType', 'VARCHAR', false, 100, null);
        $this->addColumn('poct_device_aditional_info_details', 'PoctDeviceAditionalInfoDetails', 'VARCHAR', false, 100, null);
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
    0 => ':idpoct_device',
    1 => ':poct_device_id',
  ),
), null, null, null, false);
        $this->addRelation('Users', '\\Propel\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PoctDeviceAditionalInfoTableMap::CLASS_DEFAULT : PoctDeviceAditionalInfoTableMap::OM_CLASS;
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
     * @return array           (PoctDeviceAditionalInfo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PoctDeviceAditionalInfoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PoctDeviceAditionalInfoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PoctDeviceAditionalInfoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PoctDeviceAditionalInfoTableMap::OM_CLASS;
            /** @var PoctDeviceAditionalInfo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PoctDeviceAditionalInfoTableMap::addInstanceToPool($obj, $key);
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
            $key = PoctDeviceAditionalInfoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PoctDeviceAditionalInfoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PoctDeviceAditionalInfo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PoctDeviceAditionalInfoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID);
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE);
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID);
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL);
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE);
            $criteria->addSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS);
        } else {
            $criteria->addSelectColumn($alias . '.poct_device_aditional_info_id');
            $criteria->addSelectColumn($alias . '.idpoct_device');
            $criteria->addSelectColumn($alias . '.user_user_id');
            $criteria->addSelectColumn($alias . '.poct_device_aditional_info_label');
            $criteria->addSelectColumn($alias . '.poct_device_aditional_info_type');
            $criteria->addSelectColumn($alias . '.poct_device_aditional_info_details');
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
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID);
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE);
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID);
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL);
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE);
            $criteria->removeSelectColumn(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS);
        } else {
            $criteria->removeSelectColumn($alias . '.poct_device_aditional_info_id');
            $criteria->removeSelectColumn($alias . '.idpoct_device');
            $criteria->removeSelectColumn($alias . '.user_user_id');
            $criteria->removeSelectColumn($alias . '.poct_device_aditional_info_label');
            $criteria->removeSelectColumn($alias . '.poct_device_aditional_info_type');
            $criteria->removeSelectColumn($alias . '.poct_device_aditional_info_details');
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
        return Propel::getServiceContainer()->getDatabaseMap(PoctDeviceAditionalInfoTableMap::DATABASE_NAME)->getTable(PoctDeviceAditionalInfoTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a PoctDeviceAditionalInfo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PoctDeviceAditionalInfo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\PoctDeviceAditionalInfo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, (array) $values, Criteria::IN);
        }

        $query = PoctDeviceAditionalInfoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PoctDeviceAditionalInfoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PoctDeviceAditionalInfoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the poct_device_aditional_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PoctDeviceAditionalInfoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PoctDeviceAditionalInfo or Criteria object.
     *
     * @param mixed               $criteria Criteria or PoctDeviceAditionalInfo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PoctDeviceAditionalInfo object
        }

        if ($criteria->containsKey(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID) && $criteria->keyContainsValue(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID.')');
        }


        // Set the correct dbName
        $query = PoctDeviceAditionalInfoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PoctDeviceAditionalInfoTableMap
