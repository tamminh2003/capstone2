<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDeviceAditionalInfo as ChildPoctDeviceAditionalInfo;
use Propel\PoctDeviceAditionalInfoQuery as ChildPoctDeviceAditionalInfoQuery;
use Propel\Map\PoctDeviceAditionalInfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'poct_device_aditional_info' table.
 *
 *
 *
 * @method     ChildPoctDeviceAditionalInfoQuery orderByPoctDeviceAditionalInfoId($order = Criteria::ASC) Order by the poct_device_aditional_info_id column
 * @method     ChildPoctDeviceAditionalInfoQuery orderByIdpoctDevice($order = Criteria::ASC) Order by the idpoct_device column
 * @method     ChildPoctDeviceAditionalInfoQuery orderByUserUserId($order = Criteria::ASC) Order by the user_user_id column
 * @method     ChildPoctDeviceAditionalInfoQuery orderByPoctDeviceAditionalInfoLabel($order = Criteria::ASC) Order by the poct_device_aditional_info_label column
 * @method     ChildPoctDeviceAditionalInfoQuery orderByPoctDeviceAditionalInfoType($order = Criteria::ASC) Order by the poct_device_aditional_info_type column
 * @method     ChildPoctDeviceAditionalInfoQuery orderByPoctDeviceAditionalInfoDetails($order = Criteria::ASC) Order by the poct_device_aditional_info_details column
 *
 * @method     ChildPoctDeviceAditionalInfoQuery groupByPoctDeviceAditionalInfoId() Group by the poct_device_aditional_info_id column
 * @method     ChildPoctDeviceAditionalInfoQuery groupByIdpoctDevice() Group by the idpoct_device column
 * @method     ChildPoctDeviceAditionalInfoQuery groupByUserUserId() Group by the user_user_id column
 * @method     ChildPoctDeviceAditionalInfoQuery groupByPoctDeviceAditionalInfoLabel() Group by the poct_device_aditional_info_label column
 * @method     ChildPoctDeviceAditionalInfoQuery groupByPoctDeviceAditionalInfoType() Group by the poct_device_aditional_info_type column
 * @method     ChildPoctDeviceAditionalInfoQuery groupByPoctDeviceAditionalInfoDetails() Group by the poct_device_aditional_info_details column
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoinPoctDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoinPoctDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoinPoctDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceAditionalInfoQuery joinWithPoctDevice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoinWithPoctDevice() Adds a LEFT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoinWithPoctDevice() Adds a RIGHT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoinWithPoctDevice() Adds a INNER JOIN clause and with to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildPoctDeviceAditionalInfoQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildPoctDeviceAditionalInfoQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceAditionalInfoQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildPoctDeviceAditionalInfoQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \Propel\PoctDeviceQuery|\Propel\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPoctDeviceAditionalInfo|null findOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceAditionalInfo matching the query
 * @method     ChildPoctDeviceAditionalInfo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPoctDeviceAditionalInfo matching the query, or a new ChildPoctDeviceAditionalInfo object populated from the query conditions when no match is found
 *
 * @method     ChildPoctDeviceAditionalInfo|null findOneByPoctDeviceAditionalInfoId(int $poct_device_aditional_info_id) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_id column
 * @method     ChildPoctDeviceAditionalInfo|null findOneByIdpoctDevice(int $idpoct_device) Return the first ChildPoctDeviceAditionalInfo filtered by the idpoct_device column
 * @method     ChildPoctDeviceAditionalInfo|null findOneByUserUserId(int $user_user_id) Return the first ChildPoctDeviceAditionalInfo filtered by the user_user_id column
 * @method     ChildPoctDeviceAditionalInfo|null findOneByPoctDeviceAditionalInfoLabel(string $poct_device_aditional_info_label) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_label column
 * @method     ChildPoctDeviceAditionalInfo|null findOneByPoctDeviceAditionalInfoType(string $poct_device_aditional_info_type) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_type column
 * @method     ChildPoctDeviceAditionalInfo|null findOneByPoctDeviceAditionalInfoDetails(string $poct_device_aditional_info_details) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_details column *

 * @method     ChildPoctDeviceAditionalInfo requirePk($key, ConnectionInterface $con = null) Return the ChildPoctDeviceAditionalInfo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceAditionalInfo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceAditionalInfo requireOneByPoctDeviceAditionalInfoId(int $poct_device_aditional_info_id) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOneByIdpoctDevice(int $idpoct_device) Return the first ChildPoctDeviceAditionalInfo filtered by the idpoct_device column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOneByUserUserId(int $user_user_id) Return the first ChildPoctDeviceAditionalInfo filtered by the user_user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOneByPoctDeviceAditionalInfoLabel(string $poct_device_aditional_info_label) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_label column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOneByPoctDeviceAditionalInfoType(string $poct_device_aditional_info_type) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceAditionalInfo requireOneByPoctDeviceAditionalInfoDetails(string $poct_device_aditional_info_details) Return the first ChildPoctDeviceAditionalInfo filtered by the poct_device_aditional_info_details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPoctDeviceAditionalInfo objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> find(ConnectionInterface $con = null) Return ChildPoctDeviceAditionalInfo objects based on current ModelCriteria
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByPoctDeviceAditionalInfoId(int $poct_device_aditional_info_id) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByPoctDeviceAditionalInfoId(int $poct_device_aditional_info_id) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_id column
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByIdpoctDevice(int $idpoct_device) Return ChildPoctDeviceAditionalInfo objects filtered by the idpoct_device column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByIdpoctDevice(int $idpoct_device) Return ChildPoctDeviceAditionalInfo objects filtered by the idpoct_device column
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByUserUserId(int $user_user_id) Return ChildPoctDeviceAditionalInfo objects filtered by the user_user_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByUserUserId(int $user_user_id) Return ChildPoctDeviceAditionalInfo objects filtered by the user_user_id column
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByPoctDeviceAditionalInfoLabel(string $poct_device_aditional_info_label) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_label column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByPoctDeviceAditionalInfoLabel(string $poct_device_aditional_info_label) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_label column
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByPoctDeviceAditionalInfoType(string $poct_device_aditional_info_type) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_type column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByPoctDeviceAditionalInfoType(string $poct_device_aditional_info_type) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_type column
 * @method     ChildPoctDeviceAditionalInfo[]|ObjectCollection findByPoctDeviceAditionalInfoDetails(string $poct_device_aditional_info_details) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_details column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceAditionalInfo> findByPoctDeviceAditionalInfoDetails(string $poct_device_aditional_info_details) Return ChildPoctDeviceAditionalInfo objects filtered by the poct_device_aditional_info_details column
 * @method     ChildPoctDeviceAditionalInfo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPoctDeviceAditionalInfo> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PoctDeviceAditionalInfoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\PoctDeviceAditionalInfoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\PoctDeviceAditionalInfo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPoctDeviceAditionalInfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPoctDeviceAditionalInfoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPoctDeviceAditionalInfoQuery) {
            return $criteria;
        }
        $query = new ChildPoctDeviceAditionalInfoQuery();
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
     * @return ChildPoctDeviceAditionalInfo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PoctDeviceAditionalInfoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPoctDeviceAditionalInfo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT poct_device_aditional_info_id, idpoct_device, user_user_id, poct_device_aditional_info_label, poct_device_aditional_info_type, poct_device_aditional_info_details FROM poct_device_aditional_info WHERE poct_device_aditional_info_id = :p0';
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
            /** @var ChildPoctDeviceAditionalInfo $obj */
            $obj = new ChildPoctDeviceAditionalInfo();
            $obj->hydrate($row);
            PoctDeviceAditionalInfoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPoctDeviceAditionalInfo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the poct_device_aditional_info_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceAditionalInfoId(1234); // WHERE poct_device_aditional_info_id = 1234
     * $query->filterByPoctDeviceAditionalInfoId(array(12, 34)); // WHERE poct_device_aditional_info_id IN (12, 34)
     * $query->filterByPoctDeviceAditionalInfoId(array('min' => 12)); // WHERE poct_device_aditional_info_id > 12
     * </code>
     *
     * @param     mixed $poctDeviceAditionalInfoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfoId($poctDeviceAditionalInfoId = null, $comparison = null)
    {
        if (is_array($poctDeviceAditionalInfoId)) {
            $useMinMax = false;
            if (isset($poctDeviceAditionalInfoId['min'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $poctDeviceAditionalInfoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDeviceAditionalInfoId['max'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $poctDeviceAditionalInfoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $poctDeviceAditionalInfoId, $comparison);
    }

    /**
     * Filter the query on the idpoct_device column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpoctDevice(1234); // WHERE idpoct_device = 1234
     * $query->filterByIdpoctDevice(array(12, 34)); // WHERE idpoct_device IN (12, 34)
     * $query->filterByIdpoctDevice(array('min' => 12)); // WHERE idpoct_device > 12
     * </code>
     *
     * @see       filterByPoctDevice()
     *
     * @param     mixed $idpoctDevice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByIdpoctDevice($idpoctDevice = null, $comparison = null)
    {
        if (is_array($idpoctDevice)) {
            $useMinMax = false;
            if (isset($idpoctDevice['min'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $idpoctDevice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpoctDevice['max'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $idpoctDevice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $idpoctDevice, $comparison);
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
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByUserUserId($userUserId = null, $comparison = null)
    {
        if (is_array($userUserId)) {
            $useMinMax = false;
            if (isset($userUserId['min'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $userUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userUserId['max'])) {
                $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $userUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $userUserId, $comparison);
    }

    /**
     * Filter the query on the poct_device_aditional_info_label column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceAditionalInfoLabel('fooValue');   // WHERE poct_device_aditional_info_label = 'fooValue'
     * $query->filterByPoctDeviceAditionalInfoLabel('%fooValue%', Criteria::LIKE); // WHERE poct_device_aditional_info_label LIKE '%fooValue%'
     * $query->filterByPoctDeviceAditionalInfoLabel(['foo', 'bar']); // WHERE poct_device_aditional_info_label IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $poctDeviceAditionalInfoLabel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfoLabel($poctDeviceAditionalInfoLabel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poctDeviceAditionalInfoLabel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_LABEL, $poctDeviceAditionalInfoLabel, $comparison);
    }

    /**
     * Filter the query on the poct_device_aditional_info_type column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceAditionalInfoType('fooValue');   // WHERE poct_device_aditional_info_type = 'fooValue'
     * $query->filterByPoctDeviceAditionalInfoType('%fooValue%', Criteria::LIKE); // WHERE poct_device_aditional_info_type LIKE '%fooValue%'
     * $query->filterByPoctDeviceAditionalInfoType(['foo', 'bar']); // WHERE poct_device_aditional_info_type IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $poctDeviceAditionalInfoType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfoType($poctDeviceAditionalInfoType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poctDeviceAditionalInfoType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_TYPE, $poctDeviceAditionalInfoType, $comparison);
    }

    /**
     * Filter the query on the poct_device_aditional_info_details column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceAditionalInfoDetails('fooValue');   // WHERE poct_device_aditional_info_details = 'fooValue'
     * $query->filterByPoctDeviceAditionalInfoDetails('%fooValue%', Criteria::LIKE); // WHERE poct_device_aditional_info_details LIKE '%fooValue%'
     * $query->filterByPoctDeviceAditionalInfoDetails(['foo', 'bar']); // WHERE poct_device_aditional_info_details IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $poctDeviceAditionalInfoDetails The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfoDetails($poctDeviceAditionalInfoDetails = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poctDeviceAditionalInfoDetails)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_DETAILS, $poctDeviceAditionalInfoDetails, $comparison);
    }

    /**
     * Filter the query by a related \Propel\PoctDevice object
     *
     * @param \Propel\PoctDevice|ObjectCollection $poctDevice The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByPoctDevice($poctDevice, $comparison = null)
    {
        if ($poctDevice instanceof \Propel\PoctDevice) {
            return $this
                ->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $poctDevice->getPoctDeviceId(), $comparison);
        } elseif ($poctDevice instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_IDPOCT_DEVICE, $poctDevice->toKeyValue('PrimaryKey', 'PoctDeviceId'), $comparison);
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
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
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
     * @return ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \Propel\User) {
            return $this
                ->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_USER_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
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
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
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
     * @param   ChildPoctDeviceAditionalInfo $poctDeviceAditionalInfo Object to remove from the list of results
     *
     * @return $this|ChildPoctDeviceAditionalInfoQuery The current query, for fluid interface
     */
    public function prune($poctDeviceAditionalInfo = null)
    {
        if ($poctDeviceAditionalInfo) {
            $this->addUsingAlias(PoctDeviceAditionalInfoTableMap::COL_POCT_DEVICE_ADITIONAL_INFO_ID, $poctDeviceAditionalInfo->getPoctDeviceAditionalInfoId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the poct_device_aditional_info table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PoctDeviceAditionalInfoTableMap::clearInstancePool();
            PoctDeviceAditionalInfoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PoctDeviceAditionalInfoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PoctDeviceAditionalInfoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PoctDeviceAditionalInfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PoctDeviceAditionalInfoQuery
