<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\Users as ChildUsers;
use Propel\UsersQuery as ChildUsersQuery;
use Propel\Map\UsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users' table.
 *
 *
 *
 * @method     ChildUsersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildUsersQuery orderByUserFirstname($order = Criteria::ASC) Order by the user_firstname column
 * @method     ChildUsersQuery orderByUserLastname($order = Criteria::ASC) Order by the user_lastname column
 * @method     ChildUsersQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     ChildUsersQuery orderByUserType($order = Criteria::ASC) Order by the user_type column
 * @method     ChildUsersQuery orderByUserUsername($order = Criteria::ASC) Order by the user_username column
 * @method     ChildUsersQuery orderByUserPassword($order = Criteria::ASC) Order by the user_password column
 *
 * @method     ChildUsersQuery groupByUserId() Group by the user_id column
 * @method     ChildUsersQuery groupByUserFirstname() Group by the user_firstname column
 * @method     ChildUsersQuery groupByUserLastname() Group by the user_lastname column
 * @method     ChildUsersQuery groupByUserEmail() Group by the user_email column
 * @method     ChildUsersQuery groupByUserType() Group by the user_type column
 * @method     ChildUsersQuery groupByUserUsername() Group by the user_username column
 * @method     ChildUsersQuery groupByUserPassword() Group by the user_password column
 *
 * @method     ChildUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsersQuery leftJoinPoctDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDevice relation
 * @method     ChildUsersQuery rightJoinPoctDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDevice relation
 * @method     ChildUsersQuery innerJoinPoctDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDevice relation
 *
 * @method     ChildUsersQuery joinWithPoctDevice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDevice relation
 *
 * @method     ChildUsersQuery leftJoinWithPoctDevice() Adds a LEFT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildUsersQuery rightJoinWithPoctDevice() Adds a RIGHT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildUsersQuery innerJoinWithPoctDevice() Adds a INNER JOIN clause and with to the query using the PoctDevice relation
 *
 * @method     ChildUsersQuery leftJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildUsersQuery rightJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildUsersQuery innerJoinPoctDeviceAditionalInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildUsersQuery joinWithPoctDeviceAditionalInfo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildUsersQuery leftJoinWithPoctDeviceAditionalInfo() Adds a LEFT JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildUsersQuery rightJoinWithPoctDeviceAditionalInfo() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 * @method     ChildUsersQuery innerJoinWithPoctDeviceAditionalInfo() Adds a INNER JOIN clause and with to the query using the PoctDeviceAditionalInfo relation
 *
 * @method     ChildUsersQuery leftJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildUsersQuery rightJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildUsersQuery innerJoinPoctDeviceDetailsTimestamps($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     ChildUsersQuery joinWithPoctDeviceDetailsTimestamps($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     ChildUsersQuery leftJoinWithPoctDeviceDetailsTimestamps() Adds a LEFT JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildUsersQuery rightJoinWithPoctDeviceDetailsTimestamps() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 * @method     ChildUsersQuery innerJoinWithPoctDeviceDetailsTimestamps() Adds a INNER JOIN clause and with to the query using the PoctDeviceDetailsTimestamps relation
 *
 * @method     \Propel\PoctDeviceQuery|\Propel\PoctDeviceAditionalInfoQuery|\Propel\PoctDeviceDetailsTimestampsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUsers|null findOne(ConnectionInterface $con = null) Return the first ChildUsers matching the query
 * @method     ChildUsers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsers matching the query, or a new ChildUsers object populated from the query conditions when no match is found
 *
 * @method     ChildUsers|null findOneByUserId(int $user_id) Return the first ChildUsers filtered by the user_id column
 * @method     ChildUsers|null findOneByUserFirstname(string $user_firstname) Return the first ChildUsers filtered by the user_firstname column
 * @method     ChildUsers|null findOneByUserLastname(string $user_lastname) Return the first ChildUsers filtered by the user_lastname column
 * @method     ChildUsers|null findOneByUserEmail(string $user_email) Return the first ChildUsers filtered by the user_email column
 * @method     ChildUsers|null findOneByUserType(string $user_type) Return the first ChildUsers filtered by the user_type column
 * @method     ChildUsers|null findOneByUserUsername(string $user_username) Return the first ChildUsers filtered by the user_username column
 * @method     ChildUsers|null findOneByUserPassword(string $user_password) Return the first ChildUsers filtered by the user_password column *

 * @method     ChildUsers requirePk($key, ConnectionInterface $con = null) Return the ChildUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOne(ConnectionInterface $con = null) Return the first ChildUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers requireOneByUserId(int $user_id) Return the first ChildUsers filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserFirstname(string $user_firstname) Return the first ChildUsers filtered by the user_firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserLastname(string $user_lastname) Return the first ChildUsers filtered by the user_lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserEmail(string $user_email) Return the first ChildUsers filtered by the user_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserType(string $user_type) Return the first ChildUsers filtered by the user_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserUsername(string $user_username) Return the first ChildUsers filtered by the user_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUserPassword(string $user_password) Return the first ChildUsers filtered by the user_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> find(ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @method     ChildUsers[]|ObjectCollection findByUserId(int $user_id) Return ChildUsers objects filtered by the user_id column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserId(int $user_id) Return ChildUsers objects filtered by the user_id column
 * @method     ChildUsers[]|ObjectCollection findByUserFirstname(string $user_firstname) Return ChildUsers objects filtered by the user_firstname column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserFirstname(string $user_firstname) Return ChildUsers objects filtered by the user_firstname column
 * @method     ChildUsers[]|ObjectCollection findByUserLastname(string $user_lastname) Return ChildUsers objects filtered by the user_lastname column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserLastname(string $user_lastname) Return ChildUsers objects filtered by the user_lastname column
 * @method     ChildUsers[]|ObjectCollection findByUserEmail(string $user_email) Return ChildUsers objects filtered by the user_email column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserEmail(string $user_email) Return ChildUsers objects filtered by the user_email column
 * @method     ChildUsers[]|ObjectCollection findByUserType(string $user_type) Return ChildUsers objects filtered by the user_type column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserType(string $user_type) Return ChildUsers objects filtered by the user_type column
 * @method     ChildUsers[]|ObjectCollection findByUserUsername(string $user_username) Return ChildUsers objects filtered by the user_username column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserUsername(string $user_username) Return ChildUsers objects filtered by the user_username column
 * @method     ChildUsers[]|ObjectCollection findByUserPassword(string $user_password) Return ChildUsers objects filtered by the user_password column
 * @psalm-method ObjectCollection&\Traversable<ChildUsers> findByUserPassword(string $user_password) Return ChildUsers objects filtered by the user_password column
 * @method     ChildUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildUsers> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\UsersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Users', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsersQuery) {
            return $criteria;
        }
        $query = new ChildUsersQuery();
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, user_firstname, user_lastname, user_email, user_type, user_username, user_password FROM users WHERE user_id = :p0';
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
            /** @var ChildUsers $obj */
            $obj = new ChildUsers();
            $obj->hydrate($row);
            UsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsersTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsersTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the user_firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByUserFirstname('fooValue');   // WHERE user_firstname = 'fooValue'
     * $query->filterByUserFirstname('%fooValue%', Criteria::LIKE); // WHERE user_firstname LIKE '%fooValue%'
     * $query->filterByUserFirstname(['foo', 'bar']); // WHERE user_firstname IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userFirstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserFirstname($userFirstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userFirstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_FIRSTNAME, $userFirstname, $comparison);
    }

    /**
     * Filter the query on the user_lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByUserLastname('fooValue');   // WHERE user_lastname = 'fooValue'
     * $query->filterByUserLastname('%fooValue%', Criteria::LIKE); // WHERE user_lastname LIKE '%fooValue%'
     * $query->filterByUserLastname(['foo', 'bar']); // WHERE user_lastname IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userLastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserLastname($userLastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userLastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_LASTNAME, $userLastname, $comparison);
    }

    /**
     * Filter the query on the user_email column
     *
     * Example usage:
     * <code>
     * $query->filterByUserEmail('fooValue');   // WHERE user_email = 'fooValue'
     * $query->filterByUserEmail('%fooValue%', Criteria::LIKE); // WHERE user_email LIKE '%fooValue%'
     * $query->filterByUserEmail(['foo', 'bar']); // WHERE user_email IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserEmail($userEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_EMAIL, $userEmail, $comparison);
    }

    /**
     * Filter the query on the user_type column
     *
     * Example usage:
     * <code>
     * $query->filterByUserType('fooValue');   // WHERE user_type = 'fooValue'
     * $query->filterByUserType('%fooValue%', Criteria::LIKE); // WHERE user_type LIKE '%fooValue%'
     * $query->filterByUserType(['foo', 'bar']); // WHERE user_type IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserType($userType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_TYPE, $userType, $comparison);
    }

    /**
     * Filter the query on the user_username column
     *
     * Example usage:
     * <code>
     * $query->filterByUserUsername('fooValue');   // WHERE user_username = 'fooValue'
     * $query->filterByUserUsername('%fooValue%', Criteria::LIKE); // WHERE user_username LIKE '%fooValue%'
     * $query->filterByUserUsername(['foo', 'bar']); // WHERE user_username IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userUsername The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserUsername($userUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userUsername)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_USERNAME, $userUsername, $comparison);
    }

    /**
     * Filter the query on the user_password column
     *
     * Example usage:
     * <code>
     * $query->filterByUserPassword('fooValue');   // WHERE user_password = 'fooValue'
     * $query->filterByUserPassword('%fooValue%', Criteria::LIKE); // WHERE user_password LIKE '%fooValue%'
     * $query->filterByUserPassword(['foo', 'bar']); // WHERE user_password IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $userPassword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUserPassword($userPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userPassword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_USER_PASSWORD, $userPassword, $comparison);
    }

    /**
     * Filter the query by a related \Propel\PoctDevice object
     *
     * @param \Propel\PoctDevice|ObjectCollection $poctDevice the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPoctDevice($poctDevice, $comparison = null)
    {
        if ($poctDevice instanceof \Propel\PoctDevice) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_USER_ID, $poctDevice->getUserUserId(), $comparison);
        } elseif ($poctDevice instanceof ObjectCollection) {
            return $this
                ->usePoctDeviceQuery()
                ->filterByPrimaryKeys($poctDevice->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\PoctDeviceAditionalInfo object
     *
     * @param \Propel\PoctDeviceAditionalInfo|ObjectCollection $poctDeviceAditionalInfo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceAditionalInfo($poctDeviceAditionalInfo, $comparison = null)
    {
        if ($poctDeviceAditionalInfo instanceof \Propel\PoctDeviceAditionalInfo) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_USER_ID, $poctDeviceAditionalInfo->getUserUserId(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceDetailsTimestamps($poctDeviceDetailsTimestamps, $comparison = null)
    {
        if ($poctDeviceDetailsTimestamps instanceof \Propel\PoctDeviceDetailsTimestamps) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_USER_ID, $poctDeviceDetailsTimestamps->getUserUserId(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildUsers $users Object to remove from the list of results
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function prune($users = null)
    {
        if ($users) {
            $this->addUsingAlias(UsersTableMap::COL_USER_ID, $users->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersTableMap::clearInstancePool();
            UsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsersQuery
