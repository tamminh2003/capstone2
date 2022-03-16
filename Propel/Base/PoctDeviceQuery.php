<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDevice as ChildPoctDevice;
use Propel\PoctDeviceQuery as ChildPoctDeviceQuery;
use Propel\Map\PoctDeviceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'poct_device' table.
 *
 *
 *
 * @method     ChildPoctDeviceQuery orderByPoctDeviceId($order = Criteria::ASC) Order by the poct_device_id column
 * @method     ChildPoctDeviceQuery orderByUserUserId($order = Criteria::ASC) Order by the user_user_id column
 * @method     ChildPoctDeviceQuery orderByPoctDeviceManufactureName($order = Criteria::ASC) Order by the poct_device_manufacture_name column
 * @method     ChildPoctDeviceQuery orderByPoctDeviceGenericName($order = Criteria::ASC) Order by the poct_device_generic_name column
 * @method     ChildPoctDeviceQuery orderByDeviceModel($order = Criteria::ASC) Order by the device_model column
 * @method     ChildPoctDeviceQuery orderByDeviceImageUrl($order = Criteria::ASC) Order by the device_image_url column
 * @method     ChildPoctDeviceQuery orderByDeviceType($order = Criteria::ASC) Order by the device_type column
 * @method     ChildPoctDeviceQuery orderByDeviceDescripition($order = Criteria::ASC) Order by the device_descripition column
 *
 * @method     ChildPoctDeviceQuery groupByPoctDeviceId() Group by the poct_device_id column
 * @method     ChildPoctDeviceQuery groupByUserUserId() Group by the user_user_id column
 * @method     ChildPoctDeviceQuery groupByPoctDeviceManufactureName() Group by the poct_device_manufacture_name column
 * @method     ChildPoctDeviceQuery groupByPoctDeviceGenericName() Group by the poct_device_generic_name column
 * @method     ChildPoctDeviceQuery groupByDeviceModel() Group by the device_model column
 * @method     ChildPoctDeviceQuery groupByDeviceImageUrl() Group by the device_image_url column
 * @method     ChildPoctDeviceQuery groupByDeviceType() Group by the device_type column
 * @method     ChildPoctDeviceQuery groupByDeviceDescripition() Group by the device_descripition column
 *
 * @method     ChildPoctDeviceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPoctDeviceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPoctDeviceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPoctDeviceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPoctDeviceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPoctDeviceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPoctDeviceQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildPoctDeviceQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildPoctDeviceQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildPoctDeviceQuery leftJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildPoctDeviceQuery rightJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildPoctDeviceQuery innerJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildPoctDeviceQuery joinWithPoctDeviceAditionalInfo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildPoctDeviceQuery leftJoinWithPoctDeviceAditionalInfo() Adds a LEFT JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildPoctDeviceQuery rightJoinWithPoctDeviceAditionalInfo() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildPoctDeviceQuery innerJoinWithPoctDeviceAditionalInfo() Adds a INNER JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildPoctDeviceQuery leftJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildPoctDeviceQuery rightJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildPoctDeviceQuery innerJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     ChildPoctDeviceQuery joinWithPoctDeviceDetailsTimestamps($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     ChildPoctDeviceQuery leftJoinWithPoctDeviceDetailsTimestamps() Adds a LEFT JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildPoctDeviceQuery rightJoinWithPoctDeviceDetailsTimestamps() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildPoctDeviceQuery innerJoinWithPoctDeviceDetailsTimestamps() Adds a INNER JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     ChildPoctDeviceQuery leftJoinPoctDeviceHasDisease($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceHasDisease relation
 * @method     ChildPoctDeviceQuery rightJoinPoctDeviceHasDisease($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceHasDisease relation
 * @method     ChildPoctDeviceQuery innerJoinPoctDeviceHasDisease($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceHasDisease relation
 *
 * @method     ChildPoctDeviceQuery joinWithPoctDeviceHasDisease($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceHasDisease relation
 *
 * @method     ChildPoctDeviceQuery leftJoinWithPoctDeviceHasDisease() Adds a LEFT JOIN clause and with to the query using the PoctDeviceHasDisease relation
 * @method     ChildPoctDeviceQuery rightJoinWithPoctDeviceHasDisease() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceHasDisease relation
 * @method     ChildPoctDeviceQuery innerJoinWithPoctDeviceHasDisease() Adds a INNER JOIN clause and with to the query using the PoctDeviceHasDisease relation
 *
 * @method     \Propel\UserQuery|\Propel\PoctDeviceAditionalInfoQuery|\Propel\PoctDeviceDetailsTimestampsQuery|\Propel\PoctDeviceHasDiseaseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPoctDevice|null findOne(ConnectionInterface $con = null) Return the first ChildPoctDevice matching the query
 * @method     ChildPoctDevice findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPoctDevice matching the query, or a new ChildPoctDevice object populated from the query conditions when no match is found
 *
 * @method     ChildPoctDevice|null findOneByPoctDeviceId(int $poct_device_id) Return the first ChildPoctDevice filtered by the poct_device_id column
 * @method     ChildPoctDevice|null findOneByUserUserId(int $user_user_id) Return the first ChildPoctDevice filtered by the user_user_id column
 * @method     ChildPoctDevice|null findOneByPoctDeviceManufactureName(string $poct_device_manufacture_name) Return the first ChildPoctDevice filtered by the poct_device_manufacture_name column
 * @method     ChildPoctDevice|null findOneByPoctDeviceGenericName(string $poct_device_generic_name) Return the first ChildPoctDevice filtered by the poct_device_generic_name column
 * @method     ChildPoctDevice|null findOneByDeviceModel(string $device_model) Return the first ChildPoctDevice filtered by the device_model column
 * @method     ChildPoctDevice|null findOneByDeviceImageUrl(string $device_image_url) Return the first ChildPoctDevice filtered by the device_image_url column
 * @method     ChildPoctDevice|null findOneByDeviceType(string $device_type) Return the first ChildPoctDevice filtered by the device_type column
 * @method     ChildPoctDevice|null findOneByDeviceDescripition(string $device_descripition) Return the first ChildPoctDevice filtered by the device_descripition column *

 * @method     ChildPoctDevice requirePk($key, ConnectionInterface $con = null) Return the ChildPoctDevice by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOne(ConnectionInterface $con = null) Return the first ChildPoctDevice matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDevice requireOneByPoctDeviceId(int $poct_device_id) Return the first ChildPoctDevice filtered by the poct_device_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByUserUserId(int $user_user_id) Return the first ChildPoctDevice filtered by the user_user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByPoctDeviceManufactureName(string $poct_device_manufacture_name) Return the first ChildPoctDevice filtered by the poct_device_manufacture_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByPoctDeviceGenericName(string $poct_device_generic_name) Return the first ChildPoctDevice filtered by the poct_device_generic_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByDeviceModel(string $device_model) Return the first ChildPoctDevice filtered by the device_model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByDeviceImageUrl(string $device_image_url) Return the first ChildPoctDevice filtered by the device_image_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByDeviceType(string $device_type) Return the first ChildPoctDevice filtered by the device_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDevice requireOneByDeviceDescripition(string $device_descripition) Return the first ChildPoctDevice filtered by the device_descripition column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDevice[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPoctDevice objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> find(ConnectionInterface $con = null) Return ChildPoctDevice objects based on current ModelCriteria
 * @method     ChildPoctDevice[]|ObjectCollection findByPoctDeviceId(int $poct_device_id) Return ChildPoctDevice objects filtered by the poct_device_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByPoctDeviceId(int $poct_device_id) Return ChildPoctDevice objects filtered by the poct_device_id column
 * @method     ChildPoctDevice[]|ObjectCollection findByUserUserId(int $user_user_id) Return ChildPoctDevice objects filtered by the user_user_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByUserUserId(int $user_user_id) Return ChildPoctDevice objects filtered by the user_user_id column
 * @method     ChildPoctDevice[]|ObjectCollection findByPoctDeviceManufactureName(string $poct_device_manufacture_name) Return ChildPoctDevice objects filtered by the poct_device_manufacture_name column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByPoctDeviceManufactureName(string $poct_device_manufacture_name) Return ChildPoctDevice objects filtered by the poct_device_manufacture_name column
 * @method     ChildPoctDevice[]|ObjectCollection findByPoctDeviceGenericName(string $poct_device_generic_name) Return ChildPoctDevice objects filtered by the poct_device_generic_name column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByPoctDeviceGenericName(string $poct_device_generic_name) Return ChildPoctDevice objects filtered by the poct_device_generic_name column
 * @method     ChildPoctDevice[]|ObjectCollection findByDeviceModel(string $device_model) Return ChildPoctDevice objects filtered by the device_model column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByDeviceModel(string $device_model) Return ChildPoctDevice objects filtered by the device_model column
 * @method     ChildPoctDevice[]|ObjectCollection findByDeviceImageUrl(string $device_image_url) Return ChildPoctDevice objects filtered by the device_image_url column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByDeviceImageUrl(string $device_image_url) Return ChildPoctDevice objects filtered by the device_image_url column
 * @method     ChildPoctDevice[]|ObjectCollection findByDeviceType(string $device_type) Return ChildPoctDevice objects filtered by the device_type column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByDeviceType(string $device_type) Return ChildPoctDevice objects filtered by the device_type column
 * @method     ChildPoctDevice[]|ObjectCollection findByDeviceDescripition(string $device_descripition) Return ChildPoctDevice objects filtered by the device_descripition column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDevice> findByDeviceDescripition(string $device_descripition) Return ChildPoctDevice objects filtered by the device_descripition column
 * @method     ChildPoctDevice[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPoctDevice> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PoctDeviceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\PoctDeviceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\PoctDevice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPoctDeviceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPoctDeviceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPoctDeviceQuery) {
            return $criteria;
        }
        $query = new ChildPoctDeviceQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPoctDevice|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PoctDeviceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDevice A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT poct_device_id, user_user_id, poct_device_manufacture_name, poct_device_generic_name, device_model, device_image_url, device_type, device_descripition FROM poct_device WHERE poct_device_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPoctDevice $obj */
            $obj = new ChildPoctDevice();
            $obj->hydrate($row);
            PoctDeviceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPoctDevice|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the poct_device_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceId(1234); // WHERE poct_device_id = 1234
     * $query->filterByPoctDeviceId(array(12, 34)); // WHERE poct_device_id IN (12, 34)
     * $query->filterByPoctDeviceId(array('min' => 12)); // WHERE poct_device_id > 12
     * </code>
     *
     * @param     mixed $poctDeviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceId($poctDeviceId = null, $comparison = null)
    {
        if (is_array($poctDeviceId)) {
            $useMinMax = false;
            if (isset($poctDeviceId['min'])) {
                $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDeviceId['max'])) {
                $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceId, $comparison);
    }

    /**
     * Filter the query on the user_user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserUserId(1234); // WHERE user_user_id = 1234
     * $query->filterByUserUserId(array(12, 34)); // WHERE user_user_id IN (12, 34)
     * $query->filterByUserUserId(array('min' => 12)); // WHERE user_user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userUserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByUserUserId($userUserId = null, $comparison = null)
    {
        if (is_array($userUserId)) {
            $useMinMax = false;
            if (isset($userUserId['min'])) {
                $this->addUsingAlias(PoctDeviceTableMap::COL_USER_USER_ID, $userUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userUserId['max'])) {
                $this->addUsingAlias(PoctDeviceTableMap::COL_USER_USER_ID, $userUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_USER_USER_ID, $userUserId, $comparison);
    }

    /**
     * Filter the query on the poct_device_manufacture_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceManufactureName('fooValue');   // WHERE poct_device_manufacture_name = 'fooValue'
     * $query->filterByPoctDeviceManufactureName('%fooValue%', Criteria::LIKE); // WHERE poct_device_manufacture_name LIKE '%fooValue%'
     * $query->filterByPoctDeviceManufactureName(['foo', 'bar']); // WHERE poct_device_manufacture_name IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $poctDeviceManufactureName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceManufactureName($poctDeviceManufactureName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poctDeviceManufactureName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_MANUFACTURE_NAME, $poctDeviceManufactureName, $comparison);
    }

    /**
     * Filter the query on the poct_device_generic_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceGenericName('fooValue');   // WHERE poct_device_generic_name = 'fooValue'
     * $query->filterByPoctDeviceGenericName('%fooValue%', Criteria::LIKE); // WHERE poct_device_generic_name LIKE '%fooValue%'
     * $query->filterByPoctDeviceGenericName(['foo', 'bar']); // WHERE poct_device_generic_name IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $poctDeviceGenericName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceGenericName($poctDeviceGenericName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poctDeviceGenericName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_GENERIC_NAME, $poctDeviceGenericName, $comparison);
    }

    /**
     * Filter the query on the device_model column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceModel('fooValue');   // WHERE device_model = 'fooValue'
     * $query->filterByDeviceModel('%fooValue%', Criteria::LIKE); // WHERE device_model LIKE '%fooValue%'
     * $query->filterByDeviceModel(['foo', 'bar']); // WHERE device_model IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $deviceModel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceModel($deviceModel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceModel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_DEVICE_MODEL, $deviceModel, $comparison);
    }

    /**
     * Filter the query on the device_image_url column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceImageUrl('fooValue');   // WHERE device_image_url = 'fooValue'
     * $query->filterByDeviceImageUrl('%fooValue%', Criteria::LIKE); // WHERE device_image_url LIKE '%fooValue%'
     * $query->filterByDeviceImageUrl(['foo', 'bar']); // WHERE device_image_url IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $deviceImageUrl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceImageUrl($deviceImageUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceImageUrl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_DEVICE_IMAGE_URL, $deviceImageUrl, $comparison);
    }

    /**
     * Filter the query on the device_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceType('fooValue');   // WHERE device_type = 'fooValue'
     * $query->filterByDeviceType('%fooValue%', Criteria::LIKE); // WHERE device_type LIKE '%fooValue%'
     * $query->filterByDeviceType(['foo', 'bar']); // WHERE device_type IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $deviceType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceType($deviceType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_DEVICE_TYPE, $deviceType, $comparison);
    }

    /**
     * Filter the query on the device_descripition column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceDescripition('fooValue');   // WHERE device_descripition = 'fooValue'
     * $query->filterByDeviceDescripition('%fooValue%', Criteria::LIKE); // WHERE device_descripition LIKE '%fooValue%'
     * $query->filterByDeviceDescripition(['foo', 'bar']); // WHERE device_descripition IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $deviceDescripition The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceDescripition($deviceDescripition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceDescripition)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceTableMap::COL_DEVICE_DESCRIPITION, $deviceDescripition, $comparison);
    }

    /**
     * Filter the query by a related \Propel\User object
     *
     * @param \Propel\User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \Propel\User) {
            return $this
                ->addUsingAlias(PoctDeviceTableMap::COL_USER_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceTableMap::COL_USER_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \Propel\User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\Propel\UserQuery');
    }

    /**
     * Use the User relation User object
     *
     * @param callable(\Propel\UserQuery):\Propel\UserQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withUserQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useUserQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to User table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\UserQuery The inner query object of the EXISTS statement
     */
    public function useUserExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('User', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to User table for a NOT EXISTS query.
     *
     * @see useUserExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\UserQuery The inner query object of the NOT EXISTS statement
     */
    public function useUserNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('User', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Propel\PoctDeviceAditionalInfo object
     *
     * @param \Propel\PoctDeviceAditionalInfo|ObjectCollection $poctDeviceAditionalInfo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfo($poctDeviceAditionalInfo, $comparison = null)
    {
        if ($poctDeviceAditionalInfo instanceof \Propel\PoctDeviceAditionalInfo) {
            return $this
                ->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceAditionalInfo->getIdpoctDevice(), $comparison);
        } elseif ($poctDeviceAditionalInfo instanceof ObjectCollection) {
            return $this
                ->usePoctDeviceAditionalInfoQuery()
                ->filterByPrimaryKeys($poctDeviceAditionalInfo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPoctDeviceAditionalInfo() only accepts arguments of type \Propel\PoctDeviceAditionalInfo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PoctDeviceAditionalInfo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function joinPoctDeviceAditionalInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PoctDeviceAditionalInfo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PoctDeviceAditionalInfo');
        }

        return $this;
    }

    /**
     * Use the PoctDeviceAditionalInfo relation PoctDeviceAditionalInfo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\PoctDeviceAditionalInfoQuery A secondary query class using the current class as primary query
     */
    public function usePoctDeviceAditionalInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoctDeviceAditionalInfo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PoctDeviceAditionalInfo', '\Propel\PoctDeviceAditionalInfoQuery');
    }

    /**
     * Use the PoctDeviceAditionalInfo relation PoctDeviceAditionalInfo object
     *
     * @param callable(\Propel\PoctDeviceAditionalInfoQuery):\Propel\PoctDeviceAditionalInfoQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPoctDeviceAditionalInfoQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePoctDeviceAditionalInfoQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PoctDeviceAditionalInfo table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\PoctDeviceAditionalInfoQuery The inner query object of the EXISTS statement
     */
    public function usePoctDeviceAditionalInfoExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PoctDeviceAditionalInfo', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PoctDeviceAditionalInfo table for a NOT EXISTS query.
     *
     * @see usePoctDeviceAditionalInfoExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\PoctDeviceAditionalInfoQuery The inner query object of the NOT EXISTS statement
     */
    public function usePoctDeviceAditionalInfoNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PoctDeviceAditionalInfo', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Propel\PoctDeviceDetailsTimestamps object
     *
     * @param \Propel\PoctDeviceDetailsTimestamps|ObjectCollection $poctDeviceDetailsTimestamps the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceDetailsTimestamps($poctDeviceDetailsTimestamps, $comparison = null)
    {
        if ($poctDeviceDetailsTimestamps instanceof \Propel\PoctDeviceDetailsTimestamps) {
            return $this
                ->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceDetailsTimestamps->getPoctDevicePoctDeviceId(), $comparison);
        } elseif ($poctDeviceDetailsTimestamps instanceof ObjectCollection) {
            return $this
                ->usePoctDeviceDetailsTimestampsQuery()
                ->filterByPrimaryKeys($poctDeviceDetailsTimestamps->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPoctDeviceDetailsTimestamps() only accepts arguments of type \Propel\PoctDeviceDetailsTimestamps or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function joinPoctDeviceDetailsTimestamps($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PoctDeviceDetailsTimestamps');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PoctDeviceDetailsTimestamps');
        }

        return $this;
    }

    /**
     * Use the PoctDeviceDetailsTimestamps relation PoctDeviceDetailsTimestamps object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\PoctDeviceDetailsTimestampsQuery A secondary query class using the current class as primary query
     */
    public function usePoctDeviceDetailsTimestampsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoctDeviceDetailsTimestamps($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PoctDeviceDetailsTimestamps', '\Propel\PoctDeviceDetailsTimestampsQuery');
    }

    /**
     * Use the PoctDeviceDetailsTimestamps relation PoctDeviceDetailsTimestamps object
     *
     * @param callable(\Propel\PoctDeviceDetailsTimestampsQuery):\Propel\PoctDeviceDetailsTimestampsQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPoctDeviceDetailsTimestampsQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePoctDeviceDetailsTimestampsQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PoctDeviceDetailsTimestamps table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\PoctDeviceDetailsTimestampsQuery The inner query object of the EXISTS statement
     */
    public function usePoctDeviceDetailsTimestampsExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PoctDeviceDetailsTimestamps', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PoctDeviceDetailsTimestamps table for a NOT EXISTS query.
     *
     * @see usePoctDeviceDetailsTimestampsExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\PoctDeviceDetailsTimestampsQuery The inner query object of the NOT EXISTS statement
     */
    public function usePoctDeviceDetailsTimestampsNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PoctDeviceDetailsTimestamps', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Propel\PoctDeviceHasDisease object
     *
     * @param \Propel\PoctDeviceHasDisease|ObjectCollection $poctDeviceHasDisease the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceHasDisease($poctDeviceHasDisease, $comparison = null)
    {
        if ($poctDeviceHasDisease instanceof \Propel\PoctDeviceHasDisease) {
            return $this
                ->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDeviceHasDisease->getPoctDeviceId(), $comparison);
        } elseif ($poctDeviceHasDisease instanceof ObjectCollection) {
            return $this
                ->usePoctDeviceHasDiseaseQuery()
                ->filterByPrimaryKeys($poctDeviceHasDisease->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPoctDeviceHasDisease() only accepts arguments of type \Propel\PoctDeviceHasDisease or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PoctDeviceHasDisease relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function joinPoctDeviceHasDisease($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PoctDeviceHasDisease');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PoctDeviceHasDisease');
        }

        return $this;
    }

    /**
     * Use the PoctDeviceHasDisease relation PoctDeviceHasDisease object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\PoctDeviceHasDiseaseQuery A secondary query class using the current class as primary query
     */
    public function usePoctDeviceHasDiseaseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoctDeviceHasDisease($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PoctDeviceHasDisease', '\Propel\PoctDeviceHasDiseaseQuery');
    }

    /**
     * Use the PoctDeviceHasDisease relation PoctDeviceHasDisease object
     *
     * @param callable(\Propel\PoctDeviceHasDiseaseQuery):\Propel\PoctDeviceHasDiseaseQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPoctDeviceHasDiseaseQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePoctDeviceHasDiseaseQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PoctDeviceHasDisease table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\PoctDeviceHasDiseaseQuery The inner query object of the EXISTS statement
     */
    public function usePoctDeviceHasDiseaseExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PoctDeviceHasDisease', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PoctDeviceHasDisease table for a NOT EXISTS query.
     *
     * @see usePoctDeviceHasDiseaseExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\PoctDeviceHasDiseaseQuery The inner query object of the NOT EXISTS statement
     */
    public function usePoctDeviceHasDiseaseNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PoctDeviceHasDisease', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildPoctDevice $poctDevice Object to remove from the list of results
     *
     * @return $this|ChildPoctDeviceQuery The current query, for fluid interface
     */
    public function prune($poctDevice = null)
    {
        if ($poctDevice) {
            $this->addUsingAlias(PoctDeviceTableMap::COL_POCT_DEVICE_ID, $poctDevice->getPoctDeviceId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the poct_device table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PoctDeviceTableMap::clearInstancePool();
            PoctDeviceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PoctDeviceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PoctDeviceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PoctDeviceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PoctDeviceQuery
