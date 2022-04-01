<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDevice as ChildPoctDevice;
use Propel\PoctDeviceAditionalInfoQuery as ChildPoctDeviceAditionalInfoQuery;
use Propel\PoctDeviceQuery as ChildPoctDeviceQuery;
use Propel\User as ChildUser;
use Propel\UserQuery as ChildUserQuery;
use Propel\Map\PoctDeviceAditionalInfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'poct_device_aditional_info' table.
 *
 *
 *
 * @package    propel.generator.Propel.Base
 */
abstract class PoctDeviceAditionalInfo implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\PoctDeviceAditionalInfoTableMap';


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
     * The value for the poct_device_aditional_info_id field.
     *
     * @var        int
     */
    protected $poct_device_aditional_info_id;

    /**
     * The value for the idpoct_device field.
     *
     * @var        int
     */
    protected $idpoct_device;

    /**
     * The value for the user_user_id field.
     *
     * @var        int
     */
    protected $user_user_id;

    /**
     * The value for the poct_device_aditional_info_label field.
     *
     * @var        string|null
     */
    protected $poct_device_aditional_info_label;

    /**
     * The value for the poct_device_aditional_info_type field.
     *
     * @var        string|null
     */
    protected $poct_device_aditional_info_type;

    /**
     * The value for the poct_device_aditional_info_details field.
     *
     * @var        string|null
     */
    protected $poct_device_aditional_info_details;

    /**
     * @var        ChildPoctDevice
     */
    protected $aPoctDevice;

    /**
     * @var        ChildUser
     */
    protected $aUser;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Base\PoctDeviceAditionalInfo object.
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
     * Compares this with another <code>PoctDeviceAditionalInfo</code> instance.  If
     * <code>obj</code> is an instance of <code>PoctDeviceAditionalInfo</code>, delegates to
     * <code>equals(PoctDeviceAditionalInfo)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [poct_device_aditional_info_id] column value.
     *
     * @return int
     */
    public function getPoctDeviceAditionalInfoId()
    {
        return $this->poct_device_aditional_info_id;
    }

    /**
     * Get the [idpoct_device] column value.
     *
     * @return int
     */
    public function getIdpoctDevice()
    {
        return $this->idpoct_device;
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
     * Get the [poct_device_aditional_info_label] column value.
     *
     * @return string|null
     */
    public function getPoctDeviceAditionalInfoLabel()
    {
        return $this->poct_device_aditional_info_label;
    }

    /**
     * Get the [poct_device_aditional_info_type] column value.
     *
     * @return string|null
     */
    public function getPoctDeviceAditionalInfoType()
    {
        return $this->poct_device_aditional_info_type;
    }

    /**
     * Get the [poct_device_aditional_info_details] column value.
     *
     * @return string|null
     */
    public function getPoctDeviceAditionalInfoDetails()
    {
        return $this->poct_device_aditional_info_details;
    }

    /**
     * Set the value of [poct_device_aditional_info_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->poct_device_aditional_info_id !== $v) {
            $this->poct_device_aditional_info_id = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID] = true;
        }

        return $this;
    } // setPoctDeviceAditionalInfoId()

    /**
     * Set the value of [idpoct_device] column.
     *
     * @param int $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setIdpoctDevice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idpoct_device !== $v) {
            $this->idpoct_device = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE] = true;
        }

        if ($this->aPoctDevice !== null && $this->aPoctDevice->getPoctDeviceId() !== $v) {
            $this->aPoctDevice = null;
        }

        return $this;
    } // setIdpoctDevice()

    /**
     * Set the value of [user_user_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setUserUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_user_id !== $v) {
            $this->user_user_id = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID] = true;
        }

        if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
            $this->aUser = null;
        }

        return $this;
    } // setUserUserId()

    /**
     * Set the value of [poct_device_aditional_info_label] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfoLabel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poct_device_aditional_info_label !== $v) {
            $this->poct_device_aditional_info_label = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL] = true;
        }

        return $this;
    } // setPoctDeviceAditionalInfoLabel()

    /**
     * Set the value of [poct_device_aditional_info_type] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfoType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poct_device_aditional_info_type !== $v) {
            $this->poct_device_aditional_info_type = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE] = true;
        }

        return $this;
    } // setPoctDeviceAditionalInfoType()

    /**
     * Set the value of [poct_device_aditional_info_details] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     */
    public function setPoctDeviceAditionalInfoDetails($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poct_device_aditional_info_details !== $v) {
            $this->poct_device_aditional_info_details = $v;
            $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS] = true;
        }

        return $this;
    } // setPoctDeviceAditionalInfoDetails()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('PoctDeviceAditionalInfoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_aditional_info_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('IdpoctDevice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idpoct_device = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('UserUserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('PoctDeviceAditionalInfoLabel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_aditional_info_label = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('PoctDeviceAditionalInfoType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_aditional_info_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PoctDeviceAditionalInfoTableMap::translateFieldName('PoctDeviceAditionalInfoDetails', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poct_device_aditional_info_details = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = PoctDeviceAditionalInfoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\PoctDeviceAditionalInfo'), 0, $e);
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
        if ($this->aPoctDevice !== null && $this->idpoct_device !== $this->aPoctDevice->getPoctDeviceId()) {
            $this->aPoctDevice = null;
        }
        if ($this->aUser !== null && $this->user_user_id !== $this->aUser->getUserId()) {
            $this->aUser = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPoctDeviceAditionalInfoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPoctDevice = null;
            $this->aUser = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see PoctDeviceAditionalInfo::setDeleted()
     * @see PoctDeviceAditionalInfo::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPoctDeviceAditionalInfoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
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
                PoctDeviceAditionalInfoTableMap::addInstanceToPool($this);
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

            if ($this->aPoctDevice !== null) {
                if ($this->aPoctDevice->isModified() || $this->aPoctDevice->isNew()) {
                    $affectedRows += $this->aPoctDevice->save($con);
                }
                $this->setPoctDevice($this->aPoctDevice);
            }

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
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

        $this->modifiedColumns[PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID] = true;
        if (null !== $this->poct_device_aditional_info_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_aditional_info_id';
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE)) {
            $modifiedColumns[':p' . $index++]  = 'idpoct_device';
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_user_id';
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_aditional_info_label';
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_aditional_info_type';
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS)) {
            $modifiedColumns[':p' . $index++]  = 'poct_device_aditional_info_details';
        }

        $sql = sprintf(
            'INSERT INTO poct_device_aditional_info (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'poct_device_aditional_info_id':
                        $stmt->bindValue($identifier, $this->poct_device_aditional_info_id, PDO::PARAM_INT);
                        break;
                    case 'idpoct_device':
                        $stmt->bindValue($identifier, $this->idpoct_device, PDO::PARAM_INT);
                        break;
                    case 'user_user_id':
                        $stmt->bindValue($identifier, $this->user_user_id, PDO::PARAM_INT);
                        break;
                    case 'poct_device_aditional_info_label':
                        $stmt->bindValue($identifier, $this->poct_device_aditional_info_label, PDO::PARAM_STR);
                        break;
                    case 'poct_device_aditional_info_type':
                        $stmt->bindValue($identifier, $this->poct_device_aditional_info_type, PDO::PARAM_STR);
                        break;
                    case 'poct_device_aditional_info_details':
                        $stmt->bindValue($identifier, $this->poct_device_aditional_info_details, PDO::PARAM_STR);
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
        $this->setPoctDeviceAditionalInfoId($pk);

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
        $pos = PoctDeviceAditionalInfoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPoctDeviceAditionalInfoId();
                break;
            case 1:
                return $this->getIdpoctDevice();
                break;
            case 2:
                return $this->getUserUserId();
                break;
            case 3:
                return $this->getPoctDeviceAditionalInfoLabel();
                break;
            case 4:
                return $this->getPoctDeviceAditionalInfoType();
                break;
            case 5:
                return $this->getPoctDeviceAditionalInfoDetails();
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

        if (isset($alreadyDumpedObjects['PoctDeviceAditionalInfo'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PoctDeviceAditionalInfo'][$this->hashCode()] = true;
        $keys = PoctDeviceAditionalInfoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPoctDeviceAditionalInfoId(),
            $keys[1] => $this->getIdpoctDevice(),
            $keys[2] => $this->getUserUserId(),
            $keys[3] => $this->getPoctDeviceAditionalInfoLabel(),
            $keys[4] => $this->getPoctDeviceAditionalInfoType(),
            $keys[5] => $this->getPoctDeviceAditionalInfoDetails(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPoctDevice) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'poctDevice';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'poct_device';
                        break;
                    default:
                        $key = 'PoctDevice';
                }

                $result[$key] = $this->aPoctDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUser) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }

                $result[$key] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\PoctDeviceAditionalInfo
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PoctDeviceAditionalInfoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\PoctDeviceAditionalInfo
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPoctDeviceAditionalInfoId($value);
                break;
            case 1:
                $this->setIdpoctDevice($value);
                break;
            case 2:
                $this->setUserUserId($value);
                break;
            case 3:
                $this->setPoctDeviceAditionalInfoLabel($value);
                break;
            case 4:
                $this->setPoctDeviceAditionalInfoType($value);
                break;
            case 5:
                $this->setPoctDeviceAditionalInfoDetails($value);
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
     * @return     $this|\Propel\PoctDeviceAditionalInfo
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PoctDeviceAditionalInfoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPoctDeviceAditionalInfoId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdpoctDevice($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUserUserId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPoctDeviceAditionalInfoLabel($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPoctDeviceAditionalInfoType($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPoctDeviceAditionalInfoDetails($arr[$keys[5]]);
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
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object, for fluid interface
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
        $criteria = new Criteria(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $this->poct_device_aditional_info_id);
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $this->idpoct_device);
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $this->user_user_id);
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL, $this->poct_device_aditional_info_label);
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE, $this->poct_device_aditional_info_type);
        }
        if ($this->isColumnModified(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS)) {
            $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS, $this->poct_device_aditional_info_details);
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
        $criteria = ChildPoctDeviceAditionalInfoQuery::create();
        $criteria->add(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $this->poct_device_aditional_info_id);

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
        $validPk = null !== $this->getPoctDeviceAditionalInfoId();

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
        return $this->getPoctDeviceAditionalInfoId();
    }

    /**
     * Generic method to set the primary key (poct_device_aditional_info_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPoctDeviceAditionalInfoId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPoctDeviceAditionalInfoId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\PoctDeviceAditionalInfo (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdpoctDevice($this->getIdpoctDevice());
        $copyObj->setUserUserId($this->getUserUserId());
        $copyObj->setPoctDeviceAditionalInfoLabel($this->getPoctDeviceAditionalInfoLabel());
        $copyObj->setPoctDeviceAditionalInfoType($this->getPoctDeviceAditionalInfoType());
        $copyObj->setPoctDeviceAditionalInfoDetails($this->getPoctDeviceAditionalInfoDetails());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPoctDeviceAditionalInfoId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\PoctDeviceAditionalInfo Clone of current object.
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
     * Declares an association between this object and a ChildPoctDevice object.
     *
     * @param  ChildPoctDevice $v
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPoctDevice(ChildPoctDevice $v = null)
    {
        if ($v === null) {
            $this->setIdpoctDevice(NULL);
        } else {
            $this->setIdpoctDevice($v->getPoctDeviceId());
        }

        $this->aPoctDevice = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPoctDevice object, it will not be re-added.
        if ($v !== null) {
            $v->addPoctDeviceAditionalInfo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPoctDevice object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPoctDevice The associated ChildPoctDevice object.
     * @throws PropelException
     */
    public function getPoctDevice(ConnectionInterface $con = null)
    {
        if ($this->aPoctDevice === null && ($this->idpoct_device != 0)) {
            $this->aPoctDevice = ChildPoctDeviceQuery::create()->findPk($this->idpoct_device, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPoctDevice->addPoctDeviceAditionalInfos($this);
             */
        }

        return $this->aPoctDevice;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Propel\PoctDeviceAditionalInfo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setUserUserId(NULL);
        } else {
            $this->setUserUserId($v->getUserId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addPoctDeviceAditionalInfo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUser(ConnectionInterface $con = null)
    {
        if ($this->aUser === null && ($this->user_user_id != 0)) {
            $this->aUser = ChildUserQuery::create()->findPk($this->user_user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addPoctDeviceAditionalInfos($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aPoctDevice) {
            $this->aPoctDevice->removePoctDeviceAditionalInfo($this);
        }
        if (null !== $this->aUser) {
            $this->aUser->removePoctDeviceAditionalInfo($this);
        }
        $this->poct_device_aditional_info_id = null;
        $this->idpoct_device = null;
        $this->user_user_id = null;
        $this->poct_device_aditional_info_label = null;
        $this->poct_device_aditional_info_type = null;
        $this->poct_device_aditional_info_details = null;
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
        } // if ($deep)

        $this->aPoctDevice = null;
        $this->aUser = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PoctDeviceAditionalInfoTableMap::DEFAULT_STRING_FORMAT);
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
