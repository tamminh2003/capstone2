<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\Disease as ChildDisease;
use Propel\DiseaseQuery as ChildDiseaseQuery;
use Propel\PoctDeviceHasDisease as ChildPoctDeviceHasDisease;
use Propel\PoctDeviceHasDiseaseQuery as ChildPoctDeviceHasDiseaseQuery;
use Propel\Map\DiseaseTableMap;
use Propel\Map\PoctDeviceHasDiseaseTableMap;
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
 * Base class that represents a row from the 'disease' table.
 *
 *
 *
 * @package    propel.generator.Propel.Base
 */
abstract class Disease implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\DiseaseTableMap';


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
     * The value for the disease_id field.
     *
     * @var        int
     */
    protected $disease_id;

    /**
     * The value for the disease_api_key field.
     *
     * @var        string|null
     */
    protected $disease_api_key;

    /**
     * The value for the disease_name field.
     *
     * @var        string|null
     */
    protected $disease_name;

    /**
     * The value for the disease_group field.
     *
     * @var        string|null
     */
    protected $disease_group;

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
     * @var ObjectCollection|ChildPoctDeviceHasDisease[]
     * @phpstan-var ObjectCollection&\Traversable<ChildPoctDeviceHasDisease>
     */
    protected $poctDeviceHasDiseasesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\Disease object.
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
     * Compares this with another <code>Disease</code> instance.  If
     * <code>obj</code> is an instance of <code>Disease</code>, delegates to
     * <code>equals(Disease)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [disease_id] column value.
     *
     * @return int
     */
    public function getDiseaseId()
    {
        return $this->disease_id;
    }

    /**
     * Get the [disease_api_key] column value.
     *
     * @return string|null
     */
    public function getDiseaseApiKey()
    {
        return $this->disease_api_key;
    }

    /**
     * Get the [disease_name] column value.
     *
     * @return string|null
     */
    public function getDiseaseName()
    {
        return $this->disease_name;
    }

    /**
     * Get the [disease_group] column value.
     *
     * @return string|null
     */
    public function getDiseaseGroup()
    {
        return $this->disease_group;
    }

    /**
     * Set the value of [disease_id] column.
     *
     * @param int $v New value
     * @return $this|\Propel\Disease The current object (for fluent API support)
     */
    public function setDiseaseId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->disease_id !== $v) {
            $this->disease_id = $v;
            $this->modifiedColumns[DiseaseTableMap::COL_DISEASE_ID] = true;
        }

        return $this;
    } // setDiseaseId()

    /**
     * Set the value of [disease_api_key] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\Disease The current object (for fluent API support)
     */
    public function setDiseaseApiKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->disease_api_key !== $v) {
            $this->disease_api_key = $v;
            $this->modifiedColumns[DiseaseTableMap::COL_DISEASE_API_KEY] = true;
        }

        return $this;
    } // setDiseaseApiKey()

    /**
     * Set the value of [disease_name] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\Disease The current object (for fluent API support)
     */
    public function setDiseaseName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->disease_name !== $v) {
            $this->disease_name = $v;
            $this->modifiedColumns[DiseaseTableMap::COL_DISEASE_NAME] = true;
        }

        return $this;
    } // setDiseaseName()

    /**
     * Set the value of [disease_group] column.
     *
     * @param string|null $v New value
     * @return $this|\Propel\Disease The current object (for fluent API support)
     */
    public function setDiseaseGroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->disease_group !== $v) {
            $this->disease_group = $v;
            $this->modifiedColumns[DiseaseTableMap::COL_DISEASE_GROUP] = true;
        }

        return $this;
    } // setDiseaseGroup()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DiseaseTableMap::translateFieldName('DiseaseId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->disease_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DiseaseTableMap::translateFieldName('DiseaseApiKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->disease_api_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DiseaseTableMap::translateFieldName('DiseaseName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->disease_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DiseaseTableMap::translateFieldName('DiseaseGroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->disease_group = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = DiseaseTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\Disease'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(DiseaseTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDiseaseQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPoctDeviceHasDiseases = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Disease::setDeleted()
     * @see Disease::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDiseaseQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
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
                DiseaseTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[DiseaseTableMap::COL_DISEASE_ID] = true;
        if (null !== $this->disease_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DiseaseTableMap::COL_DISEASE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'disease_id';
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_API_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'disease_api_key';
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'disease_name';
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_GROUP)) {
            $modifiedColumns[':p' . $index++]  = 'disease_group';
        }

        $sql = sprintf(
            'INSERT INTO disease (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'disease_id':
                        $stmt->bindValue($identifier, $this->disease_id, PDO::PARAM_INT);
                        break;
                    case 'disease_api_key':
                        $stmt->bindValue($identifier, $this->disease_api_key, PDO::PARAM_STR);
                        break;
                    case 'disease_name':
                        $stmt->bindValue($identifier, $this->disease_name, PDO::PARAM_STR);
                        break;
                    case 'disease_group':
                        $stmt->bindValue($identifier, $this->disease_group, PDO::PARAM_STR);
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
        $this->setDiseaseId($pk);

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
        $pos = DiseaseTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDiseaseId();
                break;
            case 1:
                return $this->getDiseaseApiKey();
                break;
            case 2:
                return $this->getDiseaseName();
                break;
            case 3:
                return $this->getDiseaseGroup();
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

        if (isset($alreadyDumpedObjects['Disease'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Disease'][$this->hashCode()] = true;
        $keys = DiseaseTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDiseaseId(),
            $keys[1] => $this->getDiseaseApiKey(),
            $keys[2] => $this->getDiseaseName(),
            $keys[3] => $this->getDiseaseGroup(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
     * @return $this|\Propel\Disease
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DiseaseTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\Disease
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDiseaseId($value);
                break;
            case 1:
                $this->setDiseaseApiKey($value);
                break;
            case 2:
                $this->setDiseaseName($value);
                break;
            case 3:
                $this->setDiseaseGroup($value);
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
     * @return     $this|\Propel\Disease
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = DiseaseTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDiseaseId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDiseaseApiKey($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDiseaseName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDiseaseGroup($arr[$keys[3]]);
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
     * @return $this|\Propel\Disease The current object, for fluid interface
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
        $criteria = new Criteria(DiseaseTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_ID)) {
            $criteria->add(DiseaseTableMap::COL_DISEASE_ID, $this->disease_id);
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_API_KEY)) {
            $criteria->add(DiseaseTableMap::COL_DISEASE_API_KEY, $this->disease_api_key);
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_NAME)) {
            $criteria->add(DiseaseTableMap::COL_DISEASE_NAME, $this->disease_name);
        }
        if ($this->isColumnModified(DiseaseTableMap::COL_DISEASE_GROUP)) {
            $criteria->add(DiseaseTableMap::COL_DISEASE_GROUP, $this->disease_group);
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
        $criteria = ChildDiseaseQuery::create();
        $criteria->add(DiseaseTableMap::COL_DISEASE_ID, $this->disease_id);

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
        $validPk = null !== $this->getDiseaseId();

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
        return $this->getDiseaseId();
    }

    /**
     * Generic method to set the primary key (disease_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDiseaseId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getDiseaseId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\Disease (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDiseaseApiKey($this->getDiseaseApiKey());
        $copyObj->setDiseaseName($this->getDiseaseName());
        $copyObj->setDiseaseGroup($this->getDiseaseGroup());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPoctDeviceHasDiseases() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPoctDeviceHasDisease($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setDiseaseId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\Disease Clone of current object.
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
        if ('PoctDeviceHasDisease' === $relationName) {
            $this->initPoctDeviceHasDiseases();
            return;
        }
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
     * If this ChildDisease is new, it will return
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
                    ->filterByDisease($this)
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
     * @return $this|ChildDisease The current object (for fluent API support)
     */
    public function setPoctDeviceHasDiseases(Collection $poctDeviceHasDiseases, ConnectionInterface $con = null)
    {
        /** @var ChildPoctDeviceHasDisease[] $poctDeviceHasDiseasesToDelete */
        $poctDeviceHasDiseasesToDelete = $this->getPoctDeviceHasDiseases(new Criteria(), $con)->diff($poctDeviceHasDiseases);


        $this->poctDeviceHasDiseasesScheduledForDeletion = $poctDeviceHasDiseasesToDelete;

        foreach ($poctDeviceHasDiseasesToDelete as $poctDeviceHasDiseaseRemoved) {
            $poctDeviceHasDiseaseRemoved->setDisease(null);
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
                ->filterByDisease($this)
                ->count($con);
        }

        return count($this->collPoctDeviceHasDiseases);
    }

    /**
     * Method called to associate a ChildPoctDeviceHasDisease object to this object
     * through the ChildPoctDeviceHasDisease foreign key attribute.
     *
     * @param  ChildPoctDeviceHasDisease $l ChildPoctDeviceHasDisease
     * @return $this|\Propel\Disease The current object (for fluent API support)
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
        $poctDeviceHasDisease->setDisease($this);
    }

    /**
     * @param  ChildPoctDeviceHasDisease $poctDeviceHasDisease The ChildPoctDeviceHasDisease object to remove.
     * @return $this|ChildDisease The current object (for fluent API support)
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
            $poctDeviceHasDisease->setDisease(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Disease is new, it will return
     * an empty collection; or if this Disease has previously
     * been saved, it will retrieve related PoctDeviceHasDiseases from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Disease.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPoctDeviceHasDisease[] List of ChildPoctDeviceHasDisease objects
     * @phpstan-return ObjectCollection&\Traversable<ChildPoctDeviceHasDisease}> List of ChildPoctDeviceHasDisease objects
     */
    public function getPoctDeviceHasDiseasesJoinPoctDevice(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPoctDeviceHasDiseaseQuery::create(null, $criteria);
        $query->joinWith('PoctDevice', $joinBehavior);

        return $this->getPoctDeviceHasDiseases($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->disease_id = null;
        $this->disease_api_key = null;
        $this->disease_name = null;
        $this->disease_group = null;
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
            if ($this->collPoctDeviceHasDiseases) {
                foreach ($this->collPoctDeviceHasDiseases as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPoctDeviceHasDiseases = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DiseaseTableMap::DEFAULT_STRING_FORMAT);
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
