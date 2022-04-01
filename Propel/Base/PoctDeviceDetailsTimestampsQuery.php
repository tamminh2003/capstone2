<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDeviceDetailsTimestamps as ChildPoctDeviceDetailsTimestamps;
use Propel\PoctDeviceDetailsTimestampsQuery as ChildPoctDeviceDetailsTimestampsQuery;
use Propel\Map\PoctDeviceDetailsTimestampsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'poct_device_details_timestamps' table.
 *
 *
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByPoctDeviceDetailsTimestampsId($order = Criteria::ASC) Order by the poct_device_details_timestamps_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByPoctDevicePoctDeviceId($order = Criteria::ASC) Order by the poct_device_poct_device_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByUserUserId($order = Criteria::ASC) Order by the user_user_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByCreateTime($order = Criteria::ASC) Order by the create_time column
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildPoctDeviceDetailsTimestampsQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByPoctDeviceDetailsTimestampsId() Group by the poct_device_details_timestamps_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByPoctDevicePoctDeviceId() Group by the poct_device_poct_device_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByUserUserId() Group by the user_user_id column
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByCreateTime() Group by the create_time column
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildPoctDeviceDetailsTimestampsQuery groupByComment() Group by the comment column
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoinPoctDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoinPoctDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoinPoctDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery joinWithPoctDevice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoinWithPoctDevice() Adds a LEFT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoinWithPoctDevice() Adds a RIGHT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoinWithPoctDevice() Adds a INNER JOIN clause and with to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildPoctDeviceDetailsTimestampsQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceDetailsTimestampsQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \Propel\PoctDeviceQuery|\Propel\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPoctDeviceDetailsTimestamps|null findOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceDetailsTimestamps matching the query
 * @method     ChildPoctDeviceDetailsTimestamps findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPoctDeviceDetailsTimestamps matching the query, or a new ChildPoctDeviceDetailsTimestamps object populated from the query conditions when no match is found
 *
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByPoctDeviceDetailsTimestampsId(int $poct_device_details_timestamps_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the poct_device_details_timestamps_id column
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByPoctDevicePoctDeviceId(int $poct_device_poct_device_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the poct_device_poct_device_id column
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByUserUserId(int $user_user_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the user_user_id column
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByCreateTime(string $create_time) Return the first ChildPoctDeviceDetailsTimestamps filtered by the create_time column
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByUpdateTime(string $update_time) Return the first ChildPoctDeviceDetailsTimestamps filtered by the update_time column
 * @method     ChildPoctDeviceDetailsTimestamps|null findOneByComment(string $comment) Return the first ChildPoctDeviceDetailsTimestamps filtered by the comment column *

 * @method     ChildPoctDeviceDetailsTimestamps requirePk($key, ConnectionInterface $con = null) Return the ChildPoctDeviceDetailsTimestamps by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceDetailsTimestamps matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByPoctDeviceDetailsTimestampsId(int $poct_device_details_timestamps_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the poct_device_details_timestamps_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByPoctDevicePoctDeviceId(int $poct_device_poct_device_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the poct_device_poct_device_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByUserUserId(int $user_user_id) Return the first ChildPoctDeviceDetailsTimestamps filtered by the user_user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByCreateTime(string $create_time) Return the first ChildPoctDeviceDetailsTimestamps filtered by the create_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByUpdateTime(string $update_time) Return the first ChildPoctDeviceDetailsTimestamps filtered by the update_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceDetailsTimestamps requireOneByComment(string $comment) Return the first ChildPoctDeviceDetailsTimestamps filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPoctDeviceDetailsTimestamps objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> find(ConnectionInterface $con = null) Return ChildPoctDeviceDetailsTimestamps objects based on current ModelCriteria
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByPoctDeviceDetailsTimestampsId(int $poct_device_details_timestamps_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the poct_device_details_timestamps_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByPoctDeviceDetailsTimestampsId(int $poct_device_details_timestamps_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the poct_device_details_timestamps_id column
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByPoctDevicePoctDeviceId(int $poct_device_poct_device_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the poct_device_poct_device_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByPoctDevicePoctDeviceId(int $poct_device_poct_device_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the poct_device_poct_device_id column
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByUserUserId(int $user_user_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the user_user_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByUserUserId(int $user_user_id) Return ChildPoctDeviceDetailsTimestamps objects filtered by the user_user_id column
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByCreateTime(string $create_time) Return ChildPoctDeviceDetailsTimestamps objects filtered by the create_time column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByCreateTime(string $create_time) Return ChildPoctDeviceDetailsTimestamps objects filtered by the create_time column
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildPoctDeviceDetailsTimestamps objects filtered by the update_time column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByUpdateTime(string $update_time) Return ChildPoctDeviceDetailsTimestamps objects filtered by the update_time column
 * @method     ChildPoctDeviceDetailsTimestamps[]|ObjectCollection findByComment(string $comment) Return ChildPoctDeviceDetailsTimestamps objects filtered by the comment column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceDetailsTimestamps> findByComment(string $comment) Return ChildPoctDeviceDetailsTimestamps objects filtered by the comment column
 * @method     ChildPoctDeviceDetailsTimestamps[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPoctDeviceDetailsTimestamps> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PoctDeviceDetailsTimestampsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\PoctDeviceDetailsTimestampsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\PoctDeviceDetailsTimestamps', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPoctDeviceDetailsTimestampsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPoctDeviceDetailsTimestampsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPoctDeviceDetailsTimestampsQuery) {
            return $criteria;
        }
        $query = new ChildPoctDeviceDetailsTimestampsQuery();
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
     * @return ChildPoctDeviceDetailsTimestamps|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PoctDeviceDetailsTimestampsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPoctDeviceDetailsTimestamps A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT poct_device_details_timestamps_id, poct_device_poct_device_id, user_user_id, create_time, update_time, comment FROM poct_device_details_timestamps WHERE poct_device_details_timestamps_id = :p0';
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
            /** @var ChildPoctDeviceDetailsTimestamps $obj */
            $obj = new ChildPoctDeviceDetailsTimestamps();
            $obj->hydrate($row);
            PoctDeviceDetailsTimestampsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPoctDeviceDetailsTimestamps|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the poct_device_details_timestamps_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceDetailsTimestampsId(1234); // WHERE poct_device_details_timestamps_id = 1234
     * $query->filterByPoctDeviceDetailsTimestampsId(array(12, 34)); // WHERE poct_device_details_timestamps_id IN (12, 34)
     * $query->filterByPoctDeviceDetailsTimestampsId(array('min' => 12)); // WHERE poct_device_details_timestamps_id > 12
     * </code>
     *
     * @param     mixed $poctDeviceDetailsTimestampsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceDetailsTimestampsId($poctDeviceDetailsTimestampsId = null, $comparison = null)
    {
        if (is_array($poctDeviceDetailsTimestampsId)) {
            $useMinMax = false;
            if (isset($poctDeviceDetailsTimestampsId['min'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $poctDeviceDetailsTimestampsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDeviceDetailsTimestampsId['max'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $poctDeviceDetailsTimestampsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $poctDeviceDetailsTimestampsId, $comparison);
    }

    /**
     * Filter the query on the poct_device_poct_device_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDevicePoctDeviceId(1234); // WHERE poct_device_poct_device_id = 1234
     * $query->filterByPoctDevicePoctDeviceId(array(12, 34)); // WHERE poct_device_poct_device_id IN (12, 34)
     * $query->filterByPoctDevicePoctDeviceId(array('min' => 12)); // WHERE poct_device_poct_device_id > 12
     * </code>
     *
     * @see       filterByPoctDevice()
     *
     * @param     mixed $poctDevicePoctDeviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByPoctDevicePoctDeviceId($poctDevicePoctDeviceId = null, $comparison = null)
    {
        if (is_array($poctDevicePoctDeviceId)) {
            $useMinMax = false;
            if (isset($poctDevicePoctDeviceId['min'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, $poctDevicePoctDeviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDevicePoctDeviceId['max'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, $poctDevicePoctDeviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, $poctDevicePoctDeviceId, $comparison);
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
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByUserUserId($userUserId = null, $comparison = null)
    {
        if (is_array($userUserId)) {
            $useMinMax = false;
            if (isset($userUserId['min'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, $userUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userUserId['max'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, $userUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, $userUserId, $comparison);
    }

    /**
     * Filter the query on the create_time column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateTime('2011-03-14'); // WHERE create_time = '2011-03-14'
     * $query->filterByCreateTime('now'); // WHERE create_time = '2011-03-14'
     * $query->filterByCreateTime(array('max' => 'yesterday')); // WHERE create_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $createTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByCreateTime($createTime = null, $comparison = null)
    {
        if (is_array($createTime)) {
            $useMinMax = false;
            if (isset($createTime['min'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME, $createTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createTime['max'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME, $createTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_CREATE_TIME, $createTime, $comparison);
    }

    /**
     * Filter the query on the update_time column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateTime('2011-03-14'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime('now'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime(array('max' => 'yesterday')); // WHERE update_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * $query->filterByComment(['foo', 'bar']); // WHERE comment IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query by a related \Propel\PoctDevice object
     *
     * @param \Propel\PoctDevice|ObjectCollection $poctDevice The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByPoctDevice($poctDevice, $comparison = null)
    {
        if ($poctDevice instanceof \Propel\PoctDevice) {
            return $this
                ->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, $poctDevice->getPoctDeviceId(), $comparison);
        } elseif ($poctDevice instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_POCT_DEVICE_ID, $poctDevice->toKeyValue('PrimaryKey', 'PoctDeviceId'), $comparison);
        } else {
            throw new PropelException('filterByPoctDevice() only accepts arguments of type \Propel\PoctDevice or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PoctDevice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function joinPoctDevice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PoctDevice');

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
            $this->addJoinObject($join, 'PoctDevice');
        }

        return $this;
    }

    /**
     * Use the PoctDevice relation PoctDevice object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\PoctDeviceQuery A secondary query class using the current class as primary query
     */
    public function usePoctDeviceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoctDevice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PoctDevice', '\Propel\PoctDeviceQuery');
    }

    /**
     * Use the PoctDevice relation PoctDevice object
     *
     * @param callable(\Propel\PoctDeviceQuery):\Propel\PoctDeviceQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPoctDeviceQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePoctDeviceQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PoctDevice table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\PoctDeviceQuery The inner query object of the EXISTS statement
     */
    public function usePoctDeviceExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PoctDevice', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PoctDevice table for a NOT EXISTS query.
     *
     * @see usePoctDeviceExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\PoctDeviceQuery The inner query object of the NOT EXISTS statement
     */
    public function usePoctDeviceNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PoctDevice', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Propel\User object
     *
     * @param \Propel\User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \Propel\User) {
            return $this
                ->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_USER_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
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
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildPoctDeviceDetailsTimestamps $poctDeviceDetailsTimestamps Object to remove from the list of results
     *
     * @return $this|ChildPoctDeviceDetailsTimestampsQuery The current query, for fluid interface
     */
    public function prune($poctDeviceDetailsTimestamps = null)
    {
        if ($poctDeviceDetailsTimestamps) {
            $this->addUsingAlias(PoctDeviceDetailsTimestampsTableMap::COL_POCT_DEVICE_DETAILS_TIMESTAMPS_ID, $poctDeviceDetailsTimestamps->getPoctDeviceDetailsTimestampsId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the poct_device_details_timestamps table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PoctDeviceDetailsTimestampsTableMap::clearInstancePool();
            PoctDeviceDetailsTimestampsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PoctDeviceDetailsTimestampsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PoctDeviceDetailsTimestampsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PoctDeviceDetailsTimestampsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PoctDeviceDetailsTimestampsQuery
