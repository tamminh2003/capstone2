<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDevice as ChildPoctDevice;
use Propel\PoctDeviceAditionalInfo as ChildPoctDeviceAditionalInfo;
use Propel\PoctDeviceAditionalInfoQuery as ChildPoctDeviceAditionalInfoQuery;
use Propel\PoctDeviceDetailsTimestamps as ChildPoctDeviceDetailsTimestamps;
use Propel\PoctDeviceDetailsTimestampsQuery as ChildPoctDeviceDetailsTimestampsQuery;
use Propel\PoctDeviceQuery as ChildPoctDeviceQuery;
use Propel\User as ChildUser;
use Propel\UserQuery as ChildUserQuery;
use Propel\Map\PoctDeviceAditionalInfoTableMap;
use Propel\Map\PoctDeviceDetailsTimestampsTableMap;
use Propel\Map\PoctDeviceTableMap;
use Propel\Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'user' table.
 *
 *
 *
 * @package    propel.generator.Propel.Base
 */
abstract class User implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\UserTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the user_id field.
     *
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the user_firstname field.
     *
     * @var        string|null
     */
    protected $user_firstname;

    /**
     * The value for the user_lastname field.
     *
     * @var        string|null
     */
    protected $user_lastname;

    /**
     * The value for the user_email field.
     *
     * @var        string|null
     */
    protected $user_email;

    /**
     * The value for the user_type field.
     *
     * @var        string|null
     */
    protected $user_type;

    /**
     * The value for the user_username field.
     *
     * @var        string|null
     */
    protected $user_username;

    /**
     * The value for the user_password field.
     *
     * @var        string|null
     */
    protected $user_password;

    /**
     * The value for the user_company field.
     *
     * @var        string|null
     */
    protected $user_company;

    /**
     * @var        ObjectCollection|ChildPoctDevice[] Collection to store aggregation of ChildPoctDevice objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDevice> Collection to store aggregation of ChildPoctDevice objects.
     */
    protected $collPoctDevices;
    protected $collPoctDevicesPartial;

    /**
     * @var        ObjectCollection|ChildPoctDeviceAditionalInfo[] Collection to store aggregation of ChildPoctDeviceAditionalInfo objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> Collection to store aggregation of ChildPoctDeviceAditionalInfo objects.
     */
    protected $collPoctDeviceAditionalInfos;
    protected $collPoctDeviceAditionalInfosPartial;

    /**
     * @var        ObjectCollection|ChildPoctDeviceDetailsTimestamps[] Collection to store aggregation of ChildPoctDeviceDetailsTimestamps objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> Collection to store aggregation of ChildPoctDeviceDetailsTimestamps objects.
     */
    protected $collPoctDeviceDetailsTimestampss;
    protected $collPoctDeviceDetailsTimestampssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPoctDevice[]
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDevice>
     */
    protected $poctDevicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPoctDeviceAditionalInfo[]
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo>
     */
    protected $poctDeviceAditionalInfosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPoctDeviceDetailsTimestamps[]
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps>
     */
    protected $poctDeviceDetailsTimestampssScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\User object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>User</code> instance.  If
     * <code>obj</code> is an instance of <code>User</code>, delegates to
     * <code>equals(User)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param  string  $keyType                (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [user_firstname] column value.
     *
     * @return string|null
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * Get the [user_lastname] column value.
     *
     * @return string|null
     */
    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    /**
     * Get the [user_email] column value.
     *
     * @return string|null
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Get the [user_type] column value.
     *
     * @return string|null
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Get the [user_username] column value.
     *
     * @return string|null
     */
    public function getUserUsername()
    {
        return $this->user_username;
    }

    /**
     * Get the [user_password] column value.
     *
     * @return string|null
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * Get the [user_company] column value.
     *
     * @return string|null
     */
    public function getUserCompany()
    {
        return $this->user_company;
    }

    /**
     * Set the value of [user_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [user_firstname] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_firstname !== $v) {
            $this->user_firstname = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_FIRSTNAME] = true;
        }

        return $this;
    } // setUserFirstname()

    /**
     * Set the value of [user_lastname] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_lastname !== $v) {
            $this->user_lastname = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_LASTNAME] = true;
        }

        return $this;
    } // setUserLastname()

    /**
     * Set the value of [user_email] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_email !== $v) {
            $this->user_email = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_EMAIL] = true;
        }

        return $this;
    } // setUserEmail()

    /**
     * Set the value of [user_type] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_type !== $v) {
            $this->user_type = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_TYPE] = true;
        }

        return $this;
    } // setUserType()

    /**
     * Set the value of [user_username] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_username !== $v) {
            $this->user_username = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_USERNAME] = true;
        }

        return $this;
    } // setUserUsername()

    /**
     * Set the value of [user_password] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_password !== $v) {
            $this->user_password = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_PASSWORD] = true;
        }

        return $this;
    } // setUserPassword()

    /**
     * Set the value of [user_company] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function setUserCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_company !== $v) {
            $this->user_company = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_COMPANY] = true;
        }

        return $this;
    } // setUserCompany()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserTableMap::translateFieldName('UserFirstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserTableMap::translateFieldName('UserLastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserTableMap::translateFieldName('UserEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserTableMap::translateFieldName('UserType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UserTableMap::translateFieldName('UserUsername', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UserTableMap::translateFieldName('UserPassword', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UserTableMap::translateFieldName('UserCompany', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_company = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = UserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\User'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPoctDevices = null;

            $this->collPoctDeviceAditionalInfos = null;

            $this->collPoctDeviceDetailsTimestampss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see User::setDeleted()
     * @see User::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->poctDevicesScheduledForDeletion !== null) {
                if (!$this->poctDevicesScheduledForDeletion->isEmpty()) {
                    \Propel\PoctDeviceQuery::create()
                        ->filterByPrimaryKeys($this->poctDevicesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->poctDevicesScheduledForDeletion = null;
                }
            }

            if ($this->collPoctDevices !== null) {
                foreach ($this->collPoctDevices as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->poctDeviceAditionalInfosScheduledForDeletion !== null) {
                if (!$this->poctDeviceAditionalInfosScheduledForDeletion->isEmpty()) {
                    \Propel\PoctDeviceAditionalInfoQuery::create()
                        ->filterByPrimaryKeys($this->poctDeviceAditionalInfosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->poctDeviceAditionalInfosScheduledForDeletion = null;
                }
            }

            if ($this->collPoctDeviceAditionalInfos !== null) {
                foreach ($this->collPoctDeviceAditionalInfos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->poctDeviceDetailsTimestampssScheduledForDeletion !== null) {
                if (!$this->poctDeviceDetailsTimestampssScheduledForDeletion->isEmpty()) {
                    \Propel\PoctDeviceDetailsTimestampsQuery::create()
                        ->filterByPrimaryKeys($this->poctDeviceDetailsTimestampssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->poctDeviceDetailsTimestampssScheduledForDeletion = null;
                }
            }

            if ($this->collPoctDeviceDetailsTimestampss !== null) {
                foreach ($this->collPoctDeviceDetailsTimestampss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[UserTableMap::COL_USER_ID] = true;
        if (null !== $this->user_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserTableMap::COL_USER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_firstname';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_lastname';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'user_email';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'user_type';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_username';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'user_password';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'user_company';
        }

        $sql = sprintf(
            'INSERT INTO user (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'user_firstname':
                        $stmt->bindValue($identifier, $this->user_firstname, PDO::PARAM_STR);
                        break;
                    case 'user_lastname':
                        $stmt->bindValue($identifier, $this->user_lastname, PDO::PARAM_STR);
                        break;
                    case 'user_email':
                        $stmt->bindValue($identifier, $this->user_email, PDO::PARAM_STR);
                        break;
                    case 'user_type':
                        $stmt->bindValue($identifier, $this->user_type, PDO::PARAM_STR);
                        break;
                    case 'user_username':
                        $stmt->bindValue($identifier, $this->user_username, PDO::PARAM_STR);
                        break;
                    case 'user_password':
                        $stmt->bindValue($identifier, $this->user_password, PDO::PARAM_STR);
                        break;
                    case 'user_company':
                        $stmt->bindValue($identifier, $this->user_company, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setUserId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getUserId();
                break;
            case 1:
                return $this->getUserFirstname();
                break;
            case 2:
                return $this->getUserLastname();
                break;
            case 3:
                return $this->getUserEmail();
                break;
            case 4:
                return $this->getUserType();
                break;
            case 5:
                return $this->getUserUsername();
                break;
            case 6:
                return $this->getUserPassword();
                break;
            case 7:
                return $this->getUserCompany();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['User'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->hashCode()] = true;
        $keys = UserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUserId(),
            $keys[1] => $this->getUserFirstname(),
            $keys[2] => $this->getUserLastname(),
            $keys[3] => $this->getUserEmail(),
            $keys[4] => $this->getUserType(),
            $keys[5] => $this->getUserUsername(),
            $keys[6] => $this->getUserPassword(),
            $keys[7] => $this->getUserCompany(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collPoctDevices) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'poctDevices';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'poct_devices';
                        break;
                    default:
                        $key = 'PoctDevices';
                }

                $result[$key] = $this->collPoctDevices->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPoctDeviceAditionalInfos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'poctDeviceAditionalInfos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'poct_device_aditional_infos';
                        break;
                    default:
                        $key = 'PoctDeviceAditionalInfos';
                }

                $result[$key] = $this->collPoctDeviceAditionalInfos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPoctDeviceDetailsTimestampss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'poctDeviceDetailsTimestampss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'poct_device_details_timestampss';
                        break;
                    default:
                        $key = 'PoctDeviceDetailsTimestampss';
                }

                $result[$key] = $this->collPoctDeviceDetailsTimestampss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Propel\User
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\User
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUserId($value);
                break;
            case 1:
                $this->setUserFirstname($value);
                break;
            case 2:
                $this->setUserLastname($value);
                break;
            case 3:
                $this->setUserEmail($value);
                break;
            case 4:
                $this->setUserType($value);
                break;
            case 5:
                $this->setUserUsername($value);
                break;
            case 6:
                $this->setUserPassword($value);
                break;
            case 7:
                $this->setUserCompany($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return     $this|\Propel\User
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = UserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setUserId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUserFirstname($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUserLastname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUserEmail($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUserType($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUserUsername($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUserPassword($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUserCompany($arr[$keys[7]]);
        }

        return $this;
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\User The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserTableMap::COL_USER_ID)) {
            $criteria->add(UserTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_FIRSTNAME)) {
            $criteria->add(UserTableMap::COL_USER_FIRSTNAME, $this->user_firstname);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LASTNAME)) {
            $criteria->add(UserTableMap::COL_USER_LASTNAME, $this->user_lastname);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EMAIL)) {
            $criteria->add(UserTableMap::COL_USER_EMAIL, $this->user_email);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_TYPE)) {
            $criteria->add(UserTableMap::COL_USER_TYPE, $this->user_type);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_USERNAME)) {
            $criteria->add(UserTableMap::COL_USER_USERNAME, $this->user_username);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PASSWORD)) {
            $criteria->add(UserTableMap::COL_USER_PASSWORD, $this->user_password);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_COMPANY)) {
            $criteria->add(UserTableMap::COL_USER_COMPANY, $this->user_company);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildUserQuery::create();
        $criteria->add(UserTableMap::COL_USER_ID, $this->user_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getUserId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getUserId();
    }

    /**
     * Generic method to set the primary key (user_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUserId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getUserId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\User (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserFirstname($this->getUserFirstname());
        $copyObj->setUserLastname($this->getUserLastname());
        $copyObj->setUserEmail($this->getUserEmail());
        $copyObj->setUserType($this->getUserType());
        $copyObj->setUserUsername($this->getUserUsername());
        $copyObj->setUserPassword($this->getUserPassword());
        $copyObj->setUserCompany($this->getUserCompany());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPoctDevices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPoctDevice($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPoctDeviceAditionalInfos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPoctDeviceAditionalInfo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPoctDeviceDetailsTimestampss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPoctDeviceDetailsTimestamps($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUserId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\User Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('PoctDevice' === $relationName) {
            $this->initPoctDevices();
            return;
        }
        if ('PoctDeviceAditionalInfo' === $relationName) {
            $this->initPoctDeviceAditionalInfos();
            return;
        }
        if ('PoctDeviceDetailsTimestamps' === $relationName) {
            $this->initPoctDeviceDetailsTimestampss();
            return;
        }
    }

    /**
     * Clears out the collPoctDevices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPoctDevices()
     */
    public function clearPoctDevices()
    {
        $this->collPoctDevices = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPoctDevices collection loaded partially.
     */
    public function resetPartialPoctDevices($v = true)
    {
        $this->collPoctDevicesPartial = $v;
    }

    /**
     * Initializes the collPoctDevices collection.
     *
     * By default this just sets the collPoctDevices collection to an empty array (like clearcollPoctDevices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPoctDevices($overrideExisting = true)
    {
        if (null !== $this->collPoctDevices && !$overrideExisting) {
            return;
        }

        $collectionClassName = PoctDeviceTableMap::getTableMap()->getCollectionClassName();

        $this->collPoctDevices = new $collectionClassName;
        $this->collPoctDevices->setModel('\Propel\PoctDevice');
    }

    /**
     * Gets an array of ChildPoctDevice objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPoctDevice[] List of ChildPoctDevice objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDevice> List of ChildPoctDevice objects
     * @throws PropelException
     */
    public function getPoctDevices(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDevicesPartial && !$this->isNew();
        if (null === $this->collPoctDevices || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collPoctDevices) {
                    $this->initPoctDevices();
                } else {
                    $collectionClassName = PoctDeviceTableMap::getTableMap()->getCollectionClassName();

                    $collPoctDevices = new $collectionClassName;
                    $collPoctDevices->setModel('\Propel\PoctDevice');

                    return $collPoctDevices;
                }
            } else {
                $collPoctDevices = ChildPoctDeviceQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPoctDevicesPartial && count($collPoctDevices)) {
                        $this->initPoctDevices(false);

                        foreach ($collPoctDevices as $obj) {
                            if (false == $this->collPoctDevices->contains($obj)) {
                                $this->collPoctDevices->append($obj);
                            }
                        }

                        $this->collPoctDevicesPartial = true;
                    }

                    return $collPoctDevices;
                }

                if ($partial && $this->collPoctDevices) {
                    foreach ($this->collPoctDevices as $obj) {
                        if ($obj->isNew()) {
                            $collPoctDevices[] = $obj;
                        }
                    }
                }

                $this->collPoctDevices = $collPoctDevices;
                $this->collPoctDevicesPartial = false;
            }
        }

        return $this->collPoctDevices;
    }

    /**
     * Sets a collection of ChildPoctDevice objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $poctDevices A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPoctDevices(Collection $poctDevices, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDevice[] $poctDevicesToDelete */
        $poctDevicesToDelete = $this->getPoctDevices(new Criteria(), $con)->diff($poctDevices);


        $this->poctDevicesScheduledForDeletion = $poctDevicesToDelete;

        foreach ($poctDevicesToDelete as $poctDeviceRemoved) {
            $poctDeviceRemoved->setUser(null);
        }

        $this->collPoctDevices = null;
        foreach ($poctDevices as $poctDevice) {
            $this->addPoctDevice($poctDevice);
        }

        $this->collPoctDevices = $poctDevices;
        $this->collPoctDevicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PoctDevice objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PoctDevice objects.
     * @throws PropelException
     */
    public function countPoctDevices(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDevicesPartial && !$this->isNew();
        if (null === $this->collPoctDevices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPoctDevices) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPoctDevices());
            }

            $query = ChildPoctDeviceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collPoctDevices);
    }

    /**
     * Method called to associate a ChildPoctDevice object to this object
     * through the ChildPoctDevice foreign key attribute.
     *
     * @param  ChildPoctDevice $l ChildPoctDevice
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function addPoctDevice(ChildPoctDevice $l)
    {
        if ($this->collPoctDevices === null) {
            $this->initPoctDevices();
            $this->collPoctDevicesPartial = true;
        }

        if (!$this->collPoctDevices->contains($l)) {
            $this->doAddPoctDevice($l);

            if ($this->poctDevicesScheduledForDeletion and $this->poctDevicesScheduledForDeletion->contains($l)) {
                $this->poctDevicesScheduledForDeletion->remove($this->poctDevicesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPoctDevice $poctDevice The ChildPoctDevice object to add.
     */
    protected function doAddPoctDevice(ChildPoctDevice $poctDevice)
    {
        $this->collPoctDevices[]= $poctDevice;
        $poctDevice->setUser($this);
    }

    /**
     * @param  ChildPoctDevice $poctDevice The ChildPoctDevice object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePoctDevice(ChildPoctDevice $poctDevice)
    {
        if ($this->getPoctDevices()->contains($poctDevice)) {
            $pos = $this->collPoctDevices->search($poctDevice);
            $this->collPoctDevices->remove($pos);
            if (null === $this->poctDevicesScheduledForDeletion) {
                $this->poctDevicesScheduledForDeletion = clone $this->collPoctDevices;
                $this->poctDevicesScheduledForDeletion->clear();
            }
            $this->poctDevicesScheduledForDeletion[]= clone $poctDevice;
            $poctDevice->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collPoctDeviceAditionalInfos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPoctDeviceAditionalInfos()
     */
    public function clearPoctDeviceAditionalInfos()
    {
        $this->collPoctDeviceAditionalInfos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPoctDeviceAditionalInfos collection loaded partially.
     */
    public function resetPartialPoctDeviceAditionalInfos($v = true)
    {
        $this->collPoctDeviceAditionalInfosPartial = $v;
    }

    /**
     * Initializes the collPoctDeviceAditionalInfos collection.
     *
     * By default this just sets the collPoctDeviceAditionalInfos collection to an empty array (like clearcollPoctDeviceAditionalInfos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPoctDeviceAditionalInfos($overrideExisting = true)
    {
        if (null !== $this->collPoctDeviceAditionalInfos && !$overrideExisting) {
            return;
        }

        $collectionClassName = PoctDeviceAditionalInfoTableMap::getTableMap()->getCollectionClassName();

        $this->collPoctDeviceAditionalInfos = new $collectionClassName;
        $this->collPoctDeviceAditionalInfos->setModel('\Propel\PoctDeviceAditionalInfo');
    }

    /**
     * Gets an array of ChildPoctDeviceAditionalInfo objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPoctDeviceAditionalInfo[] List of ChildPoctDeviceAditionalInfo objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> List of ChildPoctDeviceAditionalInfo objects
     * @throws PropelException
     */
    public function getPoctDeviceAditionalInfos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceAditionalInfosPartial && !$this->isNew();
        if (null === $this->collPoctDeviceAditionalInfos || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collPoctDeviceAditionalInfos) {
                    $this->initPoctDeviceAditionalInfos();
                } else {
                    $collectionClassName = PoctDeviceAditionalInfoTableMap::getTableMap()->getCollectionClassName();

                    $collPoctDeviceAditionalInfos = new $collectionClassName;
                    $collPoctDeviceAditionalInfos->setModel('\Propel\PoctDeviceAditionalInfo');

                    return $collPoctDeviceAditionalInfos;
                }
            } else {
                $collPoctDeviceAditionalInfos = ChildPoctDeviceAditionalInfoQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPoctDeviceAditionalInfosPartial && count($collPoctDeviceAditionalInfos)) {
                        $this->initPoctDeviceAditionalInfos(false);

                        foreach ($collPoctDeviceAditionalInfos as $obj) {
                            if (false == $this->collPoctDeviceAditionalInfos->contains($obj)) {
                                $this->collPoctDeviceAditionalInfos->append($obj);
                            }
                        }

                        $this->collPoctDeviceAditionalInfosPartial = true;
                    }

                    return $collPoctDeviceAditionalInfos;
                }

                if ($partial && $this->collPoctDeviceAditionalInfos) {
                    foreach ($this->collPoctDeviceAditionalInfos as $obj) {
                        if ($obj->isNew()) {
                            $collPoctDeviceAditionalInfos[] = $obj;
                        }
                    }
                }

                $this->collPoctDeviceAditionalInfos = $collPoctDeviceAditionalInfos;
                $this->collPoctDeviceAditionalInfosPartial = false;
            }
        }

        return $this->collPoctDeviceAditionalInfos;
    }

    /**
     * Sets a collection of ChildPoctDeviceAditionalInfo objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $poctDeviceAditionalInfos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfos(Collection $poctDeviceAditionalInfos, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceAditionalInfo[] $poctDeviceAditionalInfosToDelete */
        $poctDeviceAditionalInfosToDelete = $this->getPoctDeviceAditionalInfos(new Criteria(), $con)->diff($poctDeviceAditionalInfos);


        $this->poctDeviceAditionalInfosScheduledForDeletion = $poctDeviceAditionalInfosToDelete;

        foreach ($poctDeviceAditionalInfosToDelete as $poctDeviceAditionalInfoRemoved) {
            $poctDeviceAditionalInfoRemoved->setUser(null);
        }

        $this->collPoctDeviceAditionalInfos = null;
        foreach ($poctDeviceAditionalInfos as $poctDeviceAditionalInfo) {
            $this->addPoctDeviceAditionalInfo($poctDeviceAditionalInfo);
        }

        $this->collPoctDeviceAditionalInfos = $poctDeviceAditionalInfos;
        $this->collPoctDeviceAditionalInfosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PoctDeviceAditionalInfo objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PoctDeviceAditionalInfo objects.
     * @throws PropelException
     */
    public function countPoctDeviceAditionalInfos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceAditionalInfosPartial && !$this->isNew();
        if (null === $this->collPoctDeviceAditionalInfos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPoctDeviceAditionalInfos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPoctDeviceAditionalInfos());
            }

            $query = ChildPoctDeviceAditionalInfoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collPoctDeviceAditionalInfos);
    }

    /**
     * Method called to associate a ChildPoctDeviceAditionalInfo object to this object
     * through the ChildPoctDeviceAditionalInfo foreign key attribute.
     *
     * @param  ChildPoctDeviceAditionalInfo $l ChildPoctDeviceAditionalInfo
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function addPoctDeviceAditionalInfo(ChildPoctDeviceAditionalInfo $l)
    {
        if ($this->collPoctDeviceAditionalInfos === null) {
            $this->initPoctDeviceAditionalInfos();
            $this->collPoctDeviceAditionalInfosPartial = true;
        }

        if (!$this->collPoctDeviceAditionalInfos->contains($l)) {
            $this->doAddPoctDeviceAditionalInfo($l);

            if ($this->poctDeviceAditionalInfosScheduledForDeletion and $this->poctDeviceAditionalInfosScheduledForDeletion->contains($l)) {
                $this->poctDeviceAditionalInfosScheduledForDeletion->remove($this->poctDeviceAditionalInfosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo The ChildPoctDeviceAditionalInfo object to add.
     */
    protected function doAddPoctDeviceAditionalInfo(ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo)
    {
        $this->collPoctDeviceAditionalInfos[]= $poctDeviceAditionalInfo;
        $poctDeviceAditionalInfo->setUser($this);
    }

    /**
     * @param  ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo The ChildPoctDeviceAditionalInfo object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePoctDeviceAditionalInfo(ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo)
    {
        if ($this->getPoctDeviceAditionalInfos()->contains($poctDeviceAditionalInfo)) {
            $pos = $this->collPoctDeviceAditionalInfos->search($poctDeviceAditionalInfo);
            $this->collPoctDeviceAditionalInfos->remove($pos);
            if (null === $this->poctDeviceAditionalInfosScheduledForDeletion) {
                $this->poctDeviceAditionalInfosScheduledForDeletion = clone $this->collPoctDeviceAditionalInfos;
                $this->poctDeviceAditionalInfosScheduledForDeletion->clear();
            }
            $this->poctDeviceAditionalInfosScheduledForDeletion[]= clone $poctDeviceAditionalInfo;
            $poctDeviceAditionalInfo->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related PoctDeviceAditionalInfos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceAditionalInfo[] List of ChildPoctDeviceAditionalInfo objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo}> List of ChildPoctDeviceAditionalInfo objects
     */
    public function getPoctDeviceAditionalInfosJoinPoctDevice(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceAditionalInfoQuery::create(null, $criteria);
        $query->joinWith('PoctDevice', $joinBehavior);

        return $this->getPoctDeviceAditionalInfos($query, $con);
    }

    /**
     * Clears out the collPoctDeviceDetailsTimestampss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPoctDeviceDetailsTimestampss()
     */
    public function clearPoctDeviceDetailsTimestampss()
    {
        $this->collPoctDeviceDetailsTimestampss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPoctDeviceDetailsTimestampss collection loaded partially.
     */
    public function resetPartialPoctDeviceDetailsTimestampss($v = true)
    {
        $this->collPoctDeviceDetailsTimestampssPartial = $v;
    }

    /**
     * Initializes the collPoctDeviceDetailsTimestampss collection.
     *
     * By default this just sets the collPoctDeviceDetailsTimestampss collection to an empty array (like clearcollPoctDeviceDetailsTimestampss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPoctDeviceDetailsTimestampss($overrideExisting = true)
    {
        if (null !== $this->collPoctDeviceDetailsTimestampss && !$overrideExisting) {
            return;
        }

        $collectionClassName = PoctDeviceDetailsTimestampsTableMap::getTableMap()->getCollectionClassName();

        $this->collPoctDeviceDetailsTimestampss = new $collectionClassName;
        $this->collPoctDeviceDetailsTimestampss->setModel('\Propel\PoctDeviceDetailsTimestamps');
    }

    /**
     * Gets an array of ChildPoctDeviceDetailsTimestamps objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPoctDeviceDetailsTimestamps[] List of ChildPoctDeviceDetailsTimestamps objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> List of ChildPoctDeviceDetailsTimestamps objects
     * @throws PropelException
     */
    public function getPoctDeviceDetailsTimestampss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceDetailsTimestampssPartial && !$this->isNew();
        if (null === $this->collPoctDeviceDetailsTimestampss || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collPoctDeviceDetailsTimestampss) {
                    $this->initPoctDeviceDetailsTimestampss();
                } else {
                    $collectionClassName = PoctDeviceDetailsTimestampsTableMap::getTableMap()->getCollectionClassName();

                    $collPoctDeviceDetailsTimestampss = new $collectionClassName;
                    $collPoctDeviceDetailsTimestampss->setModel('\Propel\PoctDeviceDetailsTimestamps');

                    return $collPoctDeviceDetailsTimestampss;
                }
            } else {
                $collPoctDeviceDetailsTimestampss = ChildPoctDeviceDetailsTimestampsQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPoctDeviceDetailsTimestampssPartial && count($collPoctDeviceDetailsTimestampss)) {
                        $this->initPoctDeviceDetailsTimestampss(false);

                        foreach ($collPoctDeviceDetailsTimestampss as $obj) {
                            if (false == $this->collPoctDeviceDetailsTimestampss->contains($obj)) {
                                $this->collPoctDeviceDetailsTimestampss->append($obj);
                            }
                        }

                        $this->collPoctDeviceDetailsTimestampssPartial = true;
                    }

                    return $collPoctDeviceDetailsTimestampss;
                }

                if ($partial && $this->collPoctDeviceDetailsTimestampss) {
                    foreach ($this->collPoctDeviceDetailsTimestampss as $obj) {
                        if ($obj->isNew()) {
                            $collPoctDeviceDetailsTimestampss[] = $obj;
                        }
                    }
                }

                $this->collPoctDeviceDetailsTimestampss = $collPoctDeviceDetailsTimestampss;
                $this->collPoctDeviceDetailsTimestampssPartial = false;
            }
        }

        return $this->collPoctDeviceDetailsTimestampss;
    }

    /**
     * Sets a collection of ChildPoctDeviceDetailsTimestamps objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $poctDeviceDetailsTimestampss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPoctDeviceDetailsTimestampss(Collection $poctDeviceDetailsTimestampss, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceDetailsTimestamps[] $poctDeviceDetailsTimestampssToDelete */
        $poctDeviceDetailsTimestampssToDelete = $this->getPoctDeviceDetailsTimestampss(new Criteria(), $con)->diff($poctDeviceDetailsTimestampss);


        $this->poctDeviceDetailsTimestampssScheduledForDeletion = $poctDeviceDetailsTimestampssToDelete;

        foreach ($poctDeviceDetailsTimestampssToDelete as $poctDeviceDetailsTimestampsRemoved) {
            $poctDeviceDetailsTimestampsRemoved->setUser(null);
        }

        $this->collPoctDeviceDetailsTimestampss = null;
        foreach ($poctDeviceDetailsTimestampss as $poctDeviceDetailsTimestamps) {
            $this->addPoctDeviceDetailsTimestamps($poctDeviceDetailsTimestamps);
        }

        $this->collPoctDeviceDetailsTimestampss = $poctDeviceDetailsTimestampss;
        $this->collPoctDeviceDetailsTimestampssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PoctDeviceDetailsTimestamps objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PoctDeviceDetailsTimestamps objects.
     * @throws PropelException
     */
    public function countPoctDeviceDetailsTimestampss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceDetailsTimestampssPartial && !$this->isNew();
        if (null === $this->collPoctDeviceDetailsTimestampss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPoctDeviceDetailsTimestampss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPoctDeviceDetailsTimestampss());
            }

            $query = ChildPoctDeviceDetailsTimestampsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collPoctDeviceDetailsTimestampss);
    }

    /**
     * Method called to associate a ChildPoctDeviceDetailsTimestamps object to this object
     * through the ChildPoctDeviceDetailsTimestamps foreign key attribute.
     *
     * @param  ChildPoctDeviceDetailsTimestamps $l ChildPoctDeviceDetailsTimestamps
     * @return $this|\Propel\User The current object (for fluent API support)
     */
    public function addPoctDeviceDetailsTimestamps(ChildPoctDeviceDetailsTimestamps $l)
    {
        if ($this->collPoctDeviceDetailsTimestampss === null) {
            $this->initPoctDeviceDetailsTimestampss();
            $this->collPoctDeviceDetailsTimestampssPartial = true;
        }

        if (!$this->collPoctDeviceDetailsTimestampss->contains($l)) {
            $this->doAddPoctDeviceDetailsTimestamps($l);

            if ($this->poctDeviceDetailsTimestampssScheduledForDeletion and $this->poctDeviceDetailsTimestampssScheduledForDeletion->contains($l)) {
                $this->poctDeviceDetailsTimestampssScheduledForDeletion->remove($this->poctDeviceDetailsTimestampssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps The ChildPoctDeviceDetailsTimestamps object to add.
     */
    protected function doAddPoctDeviceDetailsTimestamps(ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps)
    {
        $this->collPoctDeviceDetailsTimestampss[]= $poctDeviceDetailsTimestamps;
        $poctDeviceDetailsTimestamps->setUser($this);
    }

    /**
     * @param  ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps The ChildPoctDeviceDetailsTimestamps object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePoctDeviceDetailsTimestamps(ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps)
    {
        if ($this->getPoctDeviceDetailsTimestampss()->contains($poctDeviceDetailsTimestamps)) {
            $pos = $this->collPoctDeviceDetailsTimestampss->search($poctDeviceDetailsTimestamps);
            $this->collPoctDeviceDetailsTimestampss->remove($pos);
            if (null === $this->poctDeviceDetailsTimestampssScheduledForDeletion) {
                $this->poctDeviceDetailsTimestampssScheduledForDeletion = clone $this->collPoctDeviceDetailsTimestampss;
                $this->poctDeviceDetailsTimestampssScheduledForDeletion->clear();
            }
            $this->poctDeviceDetailsTimestampssScheduledForDeletion[]= clone $poctDeviceDetailsTimestamps;
            $poctDeviceDetailsTimestamps->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related PoctDeviceDetailsTimestampss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceDetailsTimestamps[] List of ChildPoctDeviceDetailsTimestamps objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps}> List of ChildPoctDeviceDetailsTimestamps objects
     */
    public function getPoctDeviceDetailsTimestampssJoinPoctDevice(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceDetailsTimestampsQuery::create(null, $criteria);
        $query->joinWith('PoctDevice', $joinBehavior);

        return $this->getPoctDeviceDetailsTimestampss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->user_id = null;
        $this->user_firstname = null;
        $this->user_lastname = null;
        $this->user_email = null;
        $this->user_type = null;
        $this->user_username = null;
        $this->user_password = null;
        $this->user_company = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collPoctDevices) {
                foreach ($this->collPoctDevices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPoctDeviceAditionalInfos) {
                foreach ($this->collPoctDeviceAditionalInfos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPoctDeviceDetailsTimestampss) {
                foreach ($this->collPoctDeviceDetailsTimestampss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPoctDevices = null;
        $this->collPoctDeviceAditionalInfos = null;
        $this->collPoctDeviceDetailsTimestampss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
