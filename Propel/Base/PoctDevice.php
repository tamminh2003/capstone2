<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDevice as ChildPoctDevice;
use Propel\PoctDeviceAditionalInfo as ChildPoctDeviceAditionalInfo;
use Propel\PoctDeviceAditionalInfoQuery as ChildPoctDeviceAditionalInfoQuery;
use Propel\PoctDeviceDetailsTimestamps as ChildPoctDeviceDetailsTimestamps;
use Propel\PoctDeviceDetailsTimestampsQuery as ChildPoctDeviceDetailsTimestampsQuery;
use Propel\PoctDeviceHasDisease as ChildPoctDeviceHasDisease;
use Propel\PoctDeviceHasDiseaseQuery as ChildPoctDeviceHasDiseaseQuery;
use Propel\PoctDeviceQuery as ChildPoctDeviceQuery;
use Propel\Users as ChildUsers;
use Propel\UsersQuery as ChildUsersQuery;
use Propel\Map\PoctDeviceAditionalInfoTableMap;
use Propel\Map\PoctDeviceDetailsTimestampsTableMap;
use Propel\Map\PoctDeviceHasDiseaseTableMap;
use Propel\Map\PoctDeviceTableMap;
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
 * Base class that represents a row from the 'poct_device' table.
 *
 *
 *
 * @package    propel.generator.Propel.Base
 */
abstract class PoctDevice implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\PoctDeviceTableMap';


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
     * The value for the poct_device_id field.
     *
     * @var        int
     */
    protected $poct_device_id;

    /**
     * The value for the user_user_id field.
     *
     * @var        int
     */
    protected $user_user_id;

    /**
     * The value for the poct_device_manufacture_name field.
     *
     * @var        string|null
     */
    protected $poct_device_manufacture_name;

    /**
     * The value for the poct_device_generic_name field.
     *
     * @var        string|null
     */
    protected $poct_device_generic_name;

    /**
     * The value for the device_model field.
     *
     * @var        string|null
     */
    protected $device_model;

    /**
     * The value for the device_image_url field.
     *
     * @var        string|null
     */
    protected $device_image_url;

    /**
     * The value for the device_type field.
     *
     * @var        string|null
     */
    protected $device_type;

    /**
     * @var        ChildUsers
     */
    protected $aUsers;

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
     * @var        ObjectCollection|ChildPoctDeviceHasDisease[] Collection to store aggregation of ChildPoctDeviceHasDisease objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> Collection to store aggregation of ChildPoctDeviceHasDisease objects.
     */
    protected $collPoctDeviceHasDiseases;
    protected $collPoctDeviceHasDiseasesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

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
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPoctDeviceHasDisease[]
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceHasDisease>
     */
    protected $poctDeviceHasDiseasesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\PoctDevice object.
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
     * Compares this with another <code>PoctDevice</code> instance.  If
     * <code>obj</code> is an instance of <code>PoctDevice</code>, delegates to
     * <code>equals(PoctDevice)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [poct_device_id] column value.
     *
     * @return int
     */
    public function getPoctDeviceId()
    {
        return $this->poct_device_id;
    }

    /**
     * Get the [user_user_id] column value.
     *
     * @return int
     */
    public function getUserUserId()
    {
        return $this->user_user_id;
    }

    /**
     * Get the [poct_device_manufacture_name] column value.
     *
     * @return string|null
     */
    public function getPoctDeviceManufactureName()
    {
        return $this->poct_device_manufacture_name;
    }

    /**
     * Get the [poct_device_generic_name] column value.
     *
     * @return string|null
     */
    public function getPoctDeviceGenericName()
    {
        return $this->poct_device_generic_name;
    }

    /**
     * Get the [device_model] column value.
     *
     * @return string|null
     */
    public function getDeviceModel()
    {
        return $this->device_model;
    }

    /**
     * Get the [device_image_url] column value.
     *
     * @return string|null
     */
    public function getDeviceImageUrl()
    {
        return $this->device_image_url;
    }

    /**
     * Get the [device_type] column value.
     *
     * @return string|null
     */
    public function getDeviceType()
    {
        return $this->device_type;
    }

    /**
     * Set the value of [poct_device_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->poct_device_id !== $v) {
            $this->poct_device_id = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_POCT_DEVICE_ID] = true;
        }

        return $this;
    } // setPoctDeviceId()

    /**
     * Set the value of [user_user_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setUserUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_user_id !== $v) {
            $this->user_user_id = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_USER_USER_ID] = true;
        }

        if ($this->aUsers !== null && $this->aUsers->getUserId() !== $v) {
            $this->aUsers = null;
        }

        return $this;
    } // setUserUserId()

    /**
     * Set the value of [poct_device_manufacture_name] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceManufactureName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poct_device_manufacture_name !== $v) {
            $this->poct_device_manufacture_name = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME] = true;
        }

        return $this;
    } // setPoctDeviceManufactureName()

    /**
     * Set the value of [poct_device_generic_name] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceGenericName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poct_device_generic_name !== $v) {
            $this->poct_device_generic_name = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME] = true;
        }

        return $this;
    } // setPoctDeviceGenericName()

    /**
     * Set the value of [device_model] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setDeviceModel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->device_model !== $v) {
            $this->device_model = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_DEVICE_MODEL] = true;
        }

        return $this;
    } // setDeviceModel()

    /**
     * Set the value of [device_image_url] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setDeviceImageUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->device_image_url !== $v) {
            $this->device_image_url = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_DEVICE_IMAGE_URL] = true;
        }

        return $this;
    } // setDeviceImageUrl()

    /**
     * Set the value of [device_type] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function setDeviceType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->device_type !== $v) {
            $this->device_type = $v;
            $this->modifiedColumns[PoctDeviceTableMap::COL_DEVICE_TYPE] = true;
        }

        return $this;
    } // setDeviceType()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PoctDeviceTableMap::translateFieldName('PoctDeviceId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PoctDeviceTableMap::translateFieldName('UserUserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PoctDeviceTableMap::translateFieldName('PoctDeviceManufactureName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_manufacture_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PoctDeviceTableMap::translateFieldName('PoctDeviceGenericName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_generic_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PoctDeviceTableMap::translateFieldName('DeviceModel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->device_model = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PoctDeviceTableMap::translateFieldName('DeviceImageUrl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->device_image_url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PoctDeviceTableMap::translateFieldName('DeviceType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->device_type = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = PoctDeviceTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\PoctDevice'), 0, $e);
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
        if ($this->aUsers !== null && $this->user_user_id !== $this->aUsers->getUserId()) {
            $this->aUsers = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPoctDeviceQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUsers = null;
            $this->collPoctDeviceAditionalInfos = null;

            $this->collPoctDeviceDetailsTimestampss = null;

            $this->collPoctDeviceHasDiseases = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see PoctDevice::setDeleted()
     * @see PoctDevice::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPoctDeviceQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
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
                PoctDeviceTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUsers !== null) {
                if ($this->aUsers->isModified() || $this->aUsers->isNew()) {
                    $affectedRows += $this->aUsers->save($con);
                }
                $this->setUsers($this->aUsers);
            }

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

            if ($this->poctDeviceHasDiseasesScheduledForDeletion !== null) {
                if (!$this->poctDeviceHasDiseasesScheduledForDeletion->isEmpty()) {
                    \Propel\PoctDeviceHasDiseaseQuery::create()
                        ->filterByPrimaryKeys($this->poctDeviceHasDiseasesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->poctDeviceHasDiseasesScheduledForDeletion = null;
                }
            }

            if ($this->collPoctDeviceHasDiseases !== null) {
                foreach ($this->collPoctDeviceHasDiseases as $referrerFK) {
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

        $this->modifiedColumns[PoctDeviceTableMap::COL_POCT_DEVICE_ID] = true;
        if (null !== $this->poct_device_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PoctDeviceTableMap::COL_POCT_DEVICE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_id';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_USER_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_user_id';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_manufacture_name';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_generic_name';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_MODEL)) {
            $modifiedColumns[':p' . $index++]  = 'device_model';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL)) {
            $modifiedColumns[':p' . $index++]  = 'device_image_url';
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'device_type';
        }

        $sql = sprintf(
            'INSERT INTO poct_device (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'poct_device_id':
                        $stmt->bindValue($identifier, $this->poct_device_id, PDO::PARAM_INT);
                        break;
                    case 'user_user_id':
                        $stmt->bindValue($identifier, $this->user_user_id, PDO::PARAM_INT);
                        break;
                    case 'poct_device_manufacture_name':
                        $stmt->bindValue($identifier, $this->poct_device_manufacture_name, PDO::PARAM_STR);
                        break;
                    case 'poct_device_generic_name':
                        $stmt->bindValue($identifier, $this->poct_device_generic_name, PDO::PARAM_STR);
                        break;
                    case 'device_model':
                        $stmt->bindValue($identifier, $this->device_model, PDO::PARAM_STR);
                        break;
                    case 'device_image_url':
                        $stmt->bindValue($identifier, $this->device_image_url, PDO::PARAM_STR);
                        break;
                    case 'device_type':
                        $stmt->bindValue($identifier, $this->device_type, PDO::PARAM_STR);
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
        $this->setPoctDeviceId($pk);

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
        $pos = PoctDeviceTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPoctDeviceId();
                break;
            case 1:
                return $this->getUserUserId();
                break;
            case 2:
                return $this->getPoctDeviceManufactureName();
                break;
            case 3:
                return $this->getPoctDeviceGenericName();
                break;
            case 4:
                return $this->getDeviceModel();
                break;
            case 5:
                return $this->getDeviceImageUrl();
                break;
            case 6:
                return $this->getDeviceType();
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

        if (isset($alreadyDumpedObjects['PoctDevice'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PoctDevice'][$this->hashCode()] = true;
        $keys = PoctDeviceTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPoctDeviceId(),
            $keys[1] => $this->getUserUserId(),
            $keys[2] => $this->getPoctDeviceManufactureName(),
            $keys[3] => $this->getPoctDeviceGenericName(),
            $keys[4] => $this->getDeviceModel(),
            $keys[5] => $this->getDeviceImageUrl(),
            $keys[6] => $this->getDeviceType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUsers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'users';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'users';
                        break;
                    default:
                        $key = 'Users';
                }

                $result[$key] = $this->aUsers->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collPoctDeviceHasDiseases) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'poctDeviceHasDiseases';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'poct_device_has_diseases';
                        break;
                    default:
                        $key = 'PoctDeviceHasDiseases';
                }

                $result[$key] = $this->collPoctDeviceHasDiseases->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\PoctDevice
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PoctDeviceTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\PoctDevice
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPoctDeviceId($value);
                break;
            case 1:
                $this->setUserUserId($value);
                break;
            case 2:
                $this->setPoctDeviceManufactureName($value);
                break;
            case 3:
                $this->setPoctDeviceGenericName($value);
                break;
            case 4:
                $this->setDeviceModel($value);
                break;
            case 5:
                $this->setDeviceImageUrl($value);
                break;
            case 6:
                $this->setDeviceType($value);
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
     * @return     $this|\Propel\PoctDevice
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PoctDeviceTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPoctDeviceId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUserUserId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPoctDeviceManufactureName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPoctDeviceGenericName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDeviceModel($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDeviceImageUrl($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDeviceType($arr[$keys[6]]);
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
     * @return $this|\Propel\PoctDevice The current object, for fluid interface
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
        $criteria = new Criteria(PoctDeviceTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_ID)) {
            $criteria->add(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $this->poct_device_id);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_USER_USER_ID)) {
            $criteria->add(PoctDeviceTableMap::COL_USER_USER_ID, $this->user_user_id);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME)) {
            $criteria->add(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME, $this->poct_device_manufacture_name);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME)) {
            $criteria->add(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME, $this->poct_device_generic_name);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_MODEL)) {
            $criteria->add(PoctDeviceTableMap::COL_DEVICE_MODEL, $this->device_model);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL)) {
            $criteria->add(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL, $this->device_image_url);
        }
        if ($this->isColumnModified(PoctDeviceTableMap::COL_DEVICE_TYPE)) {
            $criteria->add(PoctDeviceTableMap::COL_DEVICE_TYPE, $this->device_type);
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
        $criteria = ChildPoctDeviceQuery::create();
        $criteria->add(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $this->poct_device_id);

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
        $validPk = null !== $this->getPoctDeviceId();

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
        return $this->getPoctDeviceId();
    }

    /**
     * Generic method to set the primary key (poct_device_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPoctDeviceId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPoctDeviceId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\PoctDevice (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserUserId($this->getUserUserId());
        $copyObj->setPoctDeviceManufactureName($this->getPoctDeviceManufactureName());
        $copyObj->setPoctDeviceGenericName($this->getPoctDeviceGenericName());
        $copyObj->setDeviceModel($this->getDeviceModel());
        $copyObj->setDeviceImageUrl($this->getDeviceImageUrl());
        $copyObj->setDeviceType($this->getDeviceType());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

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

            foreach ($this->getPoctDeviceHasDiseases() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPoctDeviceHasDisease($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPoctDeviceId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\PoctDevice Clone of current object.
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
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsers(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setUserUserId(NULL);
        } else {
            $this->setUserUserId($v->getUserId());
        }

        $this->aUsers = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addPoctDevice($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUsers The associated ChildUsers object.
     * @throws PropelException
     */
    public function getUsers(ConnectionInterface $con = null)
    {
        if ($this->aUsers === null && ($this->user_user_id != 0)) {
            $this->aUsers = ChildUsersQuery::create()->findPk($this->user_user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsers->addPoctDevices($this);
             */
        }

        return $this->aUsers;
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
        if ('PoctDeviceAditionalInfo' === $relationName) {
            $this->initPoctDeviceAditionalInfos();
            return;
        }
        if ('PoctDeviceDetailsTimestamps' === $relationName) {
            $this->initPoctDeviceDetailsTimestampss();
            return;
        }
        if ('PoctDeviceHasDisease' === $relationName) {
            $this->initPoctDeviceHasDiseases();
            return;
        }
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
     * If this ChildPoctDevice is new, it will return
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
                    ->filterByPoctDevice($this)
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
     * @return $this|ChildPoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfos(Collection $poctDeviceAditionalInfos, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceAditionalInfo[] $poctDeviceAditionalInfosToDelete */
        $poctDeviceAditionalInfosToDelete = $this->getPoctDeviceAditionalInfos(new Criteria(), $con)->diff($poctDeviceAditionalInfos);


        $this->poctDeviceAditionalInfosScheduledForDeletion = $poctDeviceAditionalInfosToDelete;

        foreach ($poctDeviceAditionalInfosToDelete as $poctDeviceAditionalInfoRemoved) {
            $poctDeviceAditionalInfoRemoved->setPoctDevice(null);
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
                ->filterByPoctDevice($this)
                ->count($con);
        }

        return count($this->collPoctDeviceAditionalInfos);
    }

    /**
     * Method called to associate a ChildPoctDeviceAditionalInfo object to this object
     * through the ChildPoctDeviceAditionalInfo foreign key attribute.
     *
     * @param  ChildPoctDeviceAditionalInfo $l ChildPoctDeviceAditionalInfo
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
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
        $poctDeviceAditionalInfo->setPoctDevice($this);
    }

    /**
     * @param  ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo The ChildPoctDeviceAditionalInfo object to remove.
     * @return $this|ChildPoctDevice The current object (for fluent API support)
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
            $poctDeviceAditionalInfo->setPoctDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PoctDevice is new, it will return
     * an empty collection; or if this PoctDevice has previously
     * been saved, it will retrieve related PoctDeviceAditionalInfos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PoctDevice.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceAditionalInfo[] List of ChildPoctDeviceAditionalInfo objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo}> List of ChildPoctDeviceAditionalInfo objects
     */
    public function getPoctDeviceAditionalInfosJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceAditionalInfoQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

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
     * If this ChildPoctDevice is new, it will return
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
                    ->filterByPoctDevice($this)
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
     * @return $this|ChildPoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceDetailsTimestampss(Collection $poctDeviceDetailsTimestampss, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceDetailsTimestamps[] $poctDeviceDetailsTimestampssToDelete */
        $poctDeviceDetailsTimestampssToDelete = $this->getPoctDeviceDetailsTimestampss(new Criteria(), $con)->diff($poctDeviceDetailsTimestampss);


        $this->poctDeviceDetailsTimestampssScheduledForDeletion = $poctDeviceDetailsTimestampssToDelete;

        foreach ($poctDeviceDetailsTimestampssToDelete as $poctDeviceDetailsTimestampsRemoved) {
            $poctDeviceDetailsTimestampsRemoved->setPoctDevice(null);
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
                ->filterByPoctDevice($this)
                ->count($con);
        }

        return count($this->collPoctDeviceDetailsTimestampss);
    }

    /**
     * Method called to associate a ChildPoctDeviceDetailsTimestamps object to this object
     * through the ChildPoctDeviceDetailsTimestamps foreign key attribute.
     *
     * @param  ChildPoctDeviceDetailsTimestamps $l ChildPoctDeviceDetailsTimestamps
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
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
        $poctDeviceDetailsTimestamps->setPoctDevice($this);
    }

    /**
     * @param  ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps The ChildPoctDeviceDetailsTimestamps object to remove.
     * @return $this|ChildPoctDevice The current object (for fluent API support)
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
            $poctDeviceDetailsTimestamps->setPoctDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PoctDevice is new, it will return
     * an empty collection; or if this PoctDevice has previously
     * been saved, it will retrieve related PoctDeviceDetailsTimestampss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PoctDevice.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceDetailsTimestamps[] List of ChildPoctDeviceDetailsTimestamps objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps}> List of ChildPoctDeviceDetailsTimestamps objects
     */
    public function getPoctDeviceDetailsTimestampssJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceDetailsTimestampsQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getPoctDeviceDetailsTimestampss($query, $con);
    }

    /**
     * Clears out the collPoctDeviceHasDiseases collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPoctDeviceHasDiseases()
     */
    public function clearPoctDeviceHasDiseases()
    {
        $this->collPoctDeviceHasDiseases = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPoctDeviceHasDiseases collection loaded partially.
     */
    public function resetPartialPoctDeviceHasDiseases($v = true)
    {
        $this->collPoctDeviceHasDiseasesPartial = $v;
    }

    /**
     * Initializes the collPoctDeviceHasDiseases collection.
     *
     * By default this just sets the collPoctDeviceHasDiseases collection to an empty array (like clearcollPoctDeviceHasDiseases());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPoctDeviceHasDiseases($overrideExisting = true)
    {
        if (null !== $this->collPoctDeviceHasDiseases && !$overrideExisting) {
            return;
        }

        $collectionClassName = PoctDeviceHasDiseaseTableMap::getTableMap()->getCollectionClassName();

        $this->collPoctDeviceHasDiseases = new $collectionClassName;
        $this->collPoctDeviceHasDiseases->setModel('\Propel\PoctDeviceHasDisease');
    }

    /**
     * Gets an array of ChildPoctDeviceHasDisease objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPoctDevice is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPoctDeviceHasDisease[] List of ChildPoctDeviceHasDisease objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> List of ChildPoctDeviceHasDisease objects
     * @throws PropelException
     */
    public function getPoctDeviceHasDiseases(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceHasDiseasesPartial && !$this->isNew();
        if (null === $this->collPoctDeviceHasDiseases || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collPoctDeviceHasDiseases) {
                    $this->initPoctDeviceHasDiseases();
                } else {
                    $collectionClassName = PoctDeviceHasDiseaseTableMap::getTableMap()->getCollectionClassName();

                    $collPoctDeviceHasDiseases = new $collectionClassName;
                    $collPoctDeviceHasDiseases->setModel('\Propel\PoctDeviceHasDisease');

                    return $collPoctDeviceHasDiseases;
                }
            } else {
                $collPoctDeviceHasDiseases = ChildPoctDeviceHasDiseaseQuery::create(null, $criteria)
                    ->filterByPoctDevice($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPoctDeviceHasDiseasesPartial && count($collPoctDeviceHasDiseases)) {
                        $this->initPoctDeviceHasDiseases(false);

                        foreach ($collPoctDeviceHasDiseases as $obj) {
                            if (false == $this->collPoctDeviceHasDiseases->contains($obj)) {
                                $this->collPoctDeviceHasDiseases->append($obj);
                            }
                        }

                        $this->collPoctDeviceHasDiseasesPartial = true;
                    }

                    return $collPoctDeviceHasDiseases;
                }

                if ($partial && $this->collPoctDeviceHasDiseases) {
                    foreach ($this->collPoctDeviceHasDiseases as $obj) {
                        if ($obj->isNew()) {
                            $collPoctDeviceHasDiseases[] = $obj;
                        }
                    }
                }

                $this->collPoctDeviceHasDiseases = $collPoctDeviceHasDiseases;
                $this->collPoctDeviceHasDiseasesPartial = false;
            }
        }

        return $this->collPoctDeviceHasDiseases;
    }

    /**
     * Sets a collection of ChildPoctDeviceHasDisease objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $poctDeviceHasDiseases A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPoctDevice The current object (for fluent API support)
     */
    public function setPoctDeviceHasDiseases(Collection $poctDeviceHasDiseases, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceHasDisease[] $poctDeviceHasDiseasesToDelete */
        $poctDeviceHasDiseasesToDelete = $this->getPoctDeviceHasDiseases(new Criteria(), $con)->diff($poctDeviceHasDiseases);


        $this->poctDeviceHasDiseasesScheduledForDeletion = $poctDeviceHasDiseasesToDelete;

        foreach ($poctDeviceHasDiseasesToDelete as $poctDeviceHasDiseaseRemoved) {
            $poctDeviceHasDiseaseRemoved->setPoctDevice(null);
        }

        $this->collPoctDeviceHasDiseases = null;
        foreach ($poctDeviceHasDiseases as $poctDeviceHasDisease) {
            $this->addPoctDeviceHasDisease($poctDeviceHasDisease);
        }

        $this->collPoctDeviceHasDiseases = $poctDeviceHasDiseases;
        $this->collPoctDeviceHasDiseasesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PoctDeviceHasDisease objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PoctDeviceHasDisease objects.
     * @throws PropelException
     */
    public function countPoctDeviceHasDiseases(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPoctDeviceHasDiseasesPartial && !$this->isNew();
        if (null === $this->collPoctDeviceHasDiseases || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPoctDeviceHasDiseases) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPoctDeviceHasDiseases());
            }

            $query = ChildPoctDeviceHasDiseaseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPoctDevice($this)
                ->count($con);
        }

        return count($this->collPoctDeviceHasDiseases);
    }

    /**
     * Method called to associate a ChildPoctDeviceHasDisease object to this object
     * through the ChildPoctDeviceHasDisease foreign key attribute.
     *
     * @param  ChildPoctDeviceHasDisease $l ChildPoctDeviceHasDisease
     * @return $this|\Propel\PoctDevice The current object (for fluent API support)
     */
    public function addPoctDeviceHasDisease(ChildPoctDeviceHasDisease $l)
    {
        if ($this->collPoctDeviceHasDiseases === null) {
            $this->initPoctDeviceHasDiseases();
            $this->collPoctDeviceHasDiseasesPartial = true;
        }

        if (!$this->collPoctDeviceHasDiseases->contains($l)) {
            $this->doAddPoctDeviceHasDisease($l);

            if ($this->poctDeviceHasDiseasesScheduledForDeletion and $this->poctDeviceHasDiseasesScheduledForDeletion->contains($l)) {
                $this->poctDeviceHasDiseasesScheduledForDeletion->remove($this->poctDeviceHasDiseasesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPoctDeviceHasDisease $poctDeviceHasDisease The ChildPoctDeviceHasDisease object to add.
     */
    protected function doAddPoctDeviceHasDisease(ChildPoctDeviceHasDisease $poctDeviceHasDisease)
    {
        $this->collPoctDeviceHasDiseases[]= $poctDeviceHasDisease;
        $poctDeviceHasDisease->setPoctDevice($this);
    }

    /**
     * @param  ChildPoctDeviceHasDisease $poctDeviceHasDisease The ChildPoctDeviceHasDisease object to remove.
     * @return $this|ChildPoctDevice The current object (for fluent API support)
     */
    public function removePoctDeviceHasDisease(ChildPoctDeviceHasDisease $poctDeviceHasDisease)
    {
        if ($this->getPoctDeviceHasDiseases()->contains($poctDeviceHasDisease)) {
            $pos = $this->collPoctDeviceHasDiseases->search($poctDeviceHasDisease);
            $this->collPoctDeviceHasDiseases->remove($pos);
            if (null === $this->poctDeviceHasDiseasesScheduledForDeletion) {
                $this->poctDeviceHasDiseasesScheduledForDeletion = clone $this->collPoctDeviceHasDiseases;
                $this->poctDeviceHasDiseasesScheduledForDeletion->clear();
            }
            $this->poctDeviceHasDiseasesScheduledForDeletion[]= clone $poctDeviceHasDisease;
            $poctDeviceHasDisease->setPoctDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PoctDevice is new, it will return
     * an empty collection; or if this PoctDevice has previously
     * been saved, it will retrieve related PoctDeviceHasDiseases from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PoctDevice.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceHasDisease[] List of ChildPoctDeviceHasDisease objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceHasDisease}> List of ChildPoctDeviceHasDisease objects
     */
    public function getPoctDeviceHasDiseasesJoinDisease(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceHasDiseaseQuery::create(null, $criteria);
        $query->joinWith('Disease', $joinBehavior);

        return $this->getPoctDeviceHasDiseases($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUsers) {
            $this->aUsers->removePoctDevice($this);
        }
        $this->poct_device_id = null;
        $this->user_user_id = null;
        $this->poct_device_manufacture_name = null;
        $this->poct_device_generic_name = null;
        $this->device_model = null;
        $this->device_image_url = null;
        $this->device_type = null;
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
            if ($this->collPoctDeviceHasDiseases) {
                foreach ($this->collPoctDeviceHasDiseases as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPoctDeviceAditionalInfos = null;
        $this->collPoctDeviceDetailsTimestampss = null;
        $this->collPoctDeviceHasDiseases = null;
        $this->aUsers = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PoctDeviceTableMap::DEFAULT_STRING_FORMAT);
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
