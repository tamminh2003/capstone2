<?php

namespace Propel\Map;

use Propel\User;
use Propel\UserQuery;
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
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.UserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\User';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.User';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'user.user_id';

    /**
     * the column name for the user_firstname field
     */
    const COL_USER_FIRSTNAME = 'user.user_firstname';

    /**
     * the column name for the user_lastname field
     */
    const COL_USER_LASTNAME = 'user.user_lastname';

    /**
     * the column name for the user_email field
     */
    const COL_USER_EMAIL = 'user.user_email';

    /**
     * the column name for the user_type field
     */
    const COL_USER_TYPE = 'user.user_type';

    /**
     * the column name for the user_username field
     */
    const COL_USER_USERNAME = 'user.user_username';

    /**
     * the column name for the user_password field
     */
    const COL_USER_PASSWORD = 'user.user_password';

    /**
     * the column name for the user_company field
     */
    const COL_USER_COMPANY = 'user.user_company';

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
        self::TYPE_PHPNAME       => array('UserId', 'UserFirstname', 'UserLastname', 'UserEmail', 'UserType', 'UserUsername', 'UserPassword', 'UserCompany', ),
        self::TYPE_CAMELNAME     => array('userId', 'userFirstname', 'userLastname', 'userEmail', 'userType', 'userUsername', 'userPassword', 'userCompany', ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_USER_ID, UserTableMap::COL_USER_FIRSTNAME, UserTableMap::COL_USER_LASTNAME, UserTableMap::COL_USER_EMAIL, UserTableMap::COL_USER_TYPE, UserTableMap::COL_USER_USERNAME, UserTableMap::COL_USER_PASSWORD, UserTableMap::COL_USER_COMPANY, ),
        self::TYPE_FIELDNAME     => array('user_id', 'user_firstname', 'user_lastname', 'user_email', 'user_type', 'user_username', 'user_password', 'user_company', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'UserFirstname' => 1, 'UserLastname' => 2, 'UserEmail' => 3, 'UserType' => 4, 'UserUsername' => 5, 'UserPassword' => 6, 'UserCompany' => 7, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'userFirstname' => 1, 'userLastname' => 2, 'userEmail' => 3, 'userType' => 4, 'userUsername' => 5, 'userPassword' => 6, 'userCompany' => 7, ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_USER_ID => 0, UserTableMap::COL_USER_FIRSTNAME => 1, UserTableMap::COL_USER_LASTNAME => 2, UserTableMap::COL_USER_EMAIL => 3, UserTableMap::COL_USER_TYPE => 4, UserTableMap::COL_USER_USERNAME => 5, UserTableMap::COL_USER_PASSWORD => 6, UserTableMap::COL_USER_COMPANY => 7, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'user_firstname' => 1, 'user_lastname' => 2, 'user_email' => 3, 'user_type' => 4, 'user_username' => 5, 'user_password' => 6, 'user_company' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'UserId' => 'USER_ID',
        'User.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'user.userId' => 'USER_ID',
        'UserTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'user.user_id' => 'USER_ID',
        'UserFirstname' => 'USER_FIRSTNAME',
        'User.UserFirstname' => 'USER_FIRSTNAME',
        'userFirstname' => 'USER_FIRSTNAME',
        'user.userFirstname' => 'USER_FIRSTNAME',
        'UserTableMap::COL_USER_FIRSTNAME' => 'USER_FIRSTNAME',
        'COL_USER_FIRSTNAME' => 'USER_FIRSTNAME',
        'user_firstname' => 'USER_FIRSTNAME',
        'user.user_firstname' => 'USER_FIRSTNAME',
        'UserLastname' => 'USER_LASTNAME',
        'User.UserLastname' => 'USER_LASTNAME',
        'userLastname' => 'USER_LASTNAME',
        'user.userLastname' => 'USER_LASTNAME',
        'UserTableMap::COL_USER_LASTNAME' => 'USER_LASTNAME',
        'COL_USER_LASTNAME' => 'USER_LASTNAME',
        'user_lastname' => 'USER_LASTNAME',
        'user.user_lastname' => 'USER_LASTNAME',
        'UserEmail' => 'USER_EMAIL',
        'User.UserEmail' => 'USER_EMAIL',
        'userEmail' => 'USER_EMAIL',
        'user.userEmail' => 'USER_EMAIL',
        'UserTableMap::COL_USER_EMAIL' => 'USER_EMAIL',
        'COL_USER_EMAIL' => 'USER_EMAIL',
        'user_email' => 'USER_EMAIL',
        'user.user_email' => 'USER_EMAIL',
        'UserType' => 'USER_TYPE',
        'User.UserType' => 'USER_TYPE',
        'userType' => 'USER_TYPE',
        'user.userType' => 'USER_TYPE',
        'UserTableMap::COL_USER_TYPE' => 'USER_TYPE',
        'COL_USER_TYPE' => 'USER_TYPE',
        'user_type' => 'USER_TYPE',
        'user.user_type' => 'USER_TYPE',
        'UserUsername' => 'USER_USERNAME',
        'User.UserUsername' => 'USER_USERNAME',
        'userUsername' => 'USER_USERNAME',
        'user.userUsername' => 'USER_USERNAME',
        'UserTableMap::COL_USER_USERNAME' => 'USER_USERNAME',
        'COL_USER_USERNAME' => 'USER_USERNAME',
        'user_username' => 'USER_USERNAME',
        'user.user_username' => 'USER_USERNAME',
        'UserPassword' => 'USER_PASSWORD',
        'User.UserPassword' => 'USER_PASSWORD',
        'userPassword' => 'USER_PASSWORD',
        'user.userPassword' => 'USER_PASSWORD',
        'UserTableMap::COL_USER_PASSWORD' => 'USER_PASSWORD',
        'COL_USER_PASSWORD' => 'USER_PASSWORD',
        'user_password' => 'USER_PASSWORD',
        'user.user_password' => 'USER_PASSWORD',
        'UserCompany' => 'USER_COMPANY',
        'User.UserCompany' => 'USER_COMPANY',
        'userCompany' => 'USER_COMPANY',
        'user.userCompany' => 'USER_COMPANY',
        'UserTableMap::COL_USER_COMPANY' => 'USER_COMPANY',
        'COL_USER_COMPANY' => 'USER_COMPANY',
        'user_company' => 'USER_COMPANY',
        'user.user_company' => 'USER_COMPANY',
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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\User');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('user_firstname', 'UserFirstname', 'VARCHAR', false, 100, null);
        $this->addColumn('user_lastname', 'UserLastname', 'VARCHAR', false, 100, null);
        $this->addColumn('user_email', 'UserEmail', 'VARCHAR', false, 255, null);
        $this->addColumn('user_type', 'UserType', 'VARCHAR', false, 100, null);
        $this->addColumn('user_username', 'UserUsername', 'VARCHAR', false, 100, null);
        $this->addColumn('user_password', 'UserPassword', 'VARCHAR', false, 100, null);
        $this->addColumn('user_company', 'UserCompany', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('PoctDevice', '\\Propel\\PoctDevice', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
  ),
), 'NO ACTION', 'NO ACTION', 'PoctDevices', false);
        $this->addRelation('PoctDeviceAditionalInfo', '\\Propel\\PoctDeviceAditionalInfo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
  ),
), 'NO ACTION', 'NO ACTION', 'PoctDeviceAditionalInfos', false);
        $this->addRelation('PoctDeviceDetailsTimestamps', '\\Propel\\PoctDeviceDetailsTimestamps', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_user_id',
    1 => ':user_id',
  ),
), 'NO ACTION', 'NO ACTION', 'PoctDeviceDetailsTimestampss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UserTableMap::CLASS_DEFAULT : UserTableMap::OM_CLASS;
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
     * @return array           (User object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserTableMap::OM_CLASS;
            /** @var User $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserTableMap::addInstanceToPool($obj, $key);
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
            $key = UserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var User $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UserTableMap::COL_USER_FIRSTNAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_LASTNAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_EMAIL);
            $criteria->addSelectColumn(UserTableMap::COL_USER_TYPE);
            $criteria->addSelectColumn(UserTableMap::COL_USER_USERNAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_PASSWORD);
            $criteria->addSelectColumn(UserTableMap::COL_USER_COMPANY);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.user_firstname');
            $criteria->addSelectColumn($alias . '.user_lastname');
            $criteria->addSelectColumn($alias . '.user_email');
            $criteria->addSelectColumn($alias . '.user_type');
            $criteria->addSelectColumn($alias . '.user_username');
            $criteria->addSelectColumn($alias . '.user_password');
            $criteria->addSelectColumn($alias . '.user_company');
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
            $criteria->removeSelectColumn(UserTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_FIRSTNAME);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_LASTNAME);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_EMAIL);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_TYPE);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_USERNAME);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_PASSWORD);
            $criteria->removeSelectColumn(UserTableMap::COL_USER_COMPANY);
        } else {
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.user_firstname');
            $criteria->removeSelectColumn($alias . '.user_lastname');
            $criteria->removeSelectColumn($alias . '.user_email');
            $criteria->removeSelectColumn($alias . '.user_type');
            $criteria->removeSelectColumn($alias . '.user_username');
            $criteria->removeSelectColumn($alias . '.user_password');
            $criteria->removeSelectColumn($alias . '.user_company');
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
        return Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME)->getTable(UserTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a User or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or User object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\User) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserTableMap::DATABASE_NAME);
            $criteria->add(UserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = UserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a User or Criteria object.
     *
     * @param mixed               $criteria Criteria or User object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from User object
        }

        if ($criteria->containsKey(UserTableMap::COL_USER_ID) && $criteria->keyContainsValue(UserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = UserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserTableMap
