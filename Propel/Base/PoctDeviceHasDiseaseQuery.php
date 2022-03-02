<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\PoctDeviceHasDisease as ChildPoctDeviceHasDisease;
use Propel\PoctDeviceHasDiseaseQuery as ChildPoctDeviceHasDiseaseQuery;
use Propel\Map\PoctDeviceHasDiseaseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'poct_device_has_disease' table.
 *
 *
 *
 * @method     ChildPoctDeviceHasDiseaseQuery orderByPoctDeviceHasDiseaseId($order = Criteria::ASC) Order by the poct_device_has_disease_id column
 * @method     ChildPoctDeviceHasDiseaseQuery orderByPoctDeviceId($order = Criteria::ASC) Order by the poct_device_id column
 * @method     ChildPoctDeviceHasDiseaseQuery orderByDiseaseId($order = Criteria::ASC) Order by the disease_id column
 *
 * @method     ChildPoctDeviceHasDiseaseQuery groupByPoctDeviceHasDiseaseId() Group by the poct_device_has_disease_id column
 * @method     ChildPoctDeviceHasDiseaseQuery groupByPoctDeviceId() Group by the poct_device_id column
 * @method     ChildPoctDeviceHasDiseaseQuery groupByDiseaseId() Group by the disease_id column
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoinDisease($relationAlias = null) Adds a LEFT JOIN clause to the query using the Disease relation
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoinDisease($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Disease relation
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoinDisease($relationAlias = null) Adds a INNER JOIN clause to the query using the Disease relation
 *
 * @method     ChildPoctDeviceHasDiseaseQuery joinWithDisease($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Disease relation
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoinWithDisease() Adds a LEFT JOIN clause and with to the query using the Disease relation
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoinWithDisease() Adds a RIGHT JOIN clause and with to the query using the Disease relation
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoinWithDisease() Adds a INNER JOIN clause and with to the query using the Disease relation
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoinPoctDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoinPoctDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDevice relation
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoinPoctDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceHasDiseaseQuery joinWithPoctDevice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDevice relation
 *
 * @method     ChildPoctDeviceHasDiseaseQuery leftJoinWithPoctDevice() Adds a LEFT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceHasDiseaseQuery rightJoinWithPoctDevice() Adds a RIGHT JOIN clause and with to the query using the PoctDevice relation
 * @method     ChildPoctDeviceHasDiseaseQuery innerJoinWithPoctDevice() Adds a INNER JOIN clause and with to the query using the PoctDevice relation
 *
 * @method     \Propel\DiseaseQuery|\Propel\PoctDeviceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPoctDeviceHasDisease|null findOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceHasDisease matching the query
 * @method     ChildPoctDeviceHasDisease findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPoctDeviceHasDisease matching the query, or a new ChildPoctDeviceHasDisease object populated from the query conditions when no match is found
 *
 * @method     ChildPoctDeviceHasDisease|null findOneByPoctDeviceHasDiseaseId(int $poct_device_has_disease_id) Return the first ChildPoctDeviceHasDisease filtered by the poct_device_has_disease_id column
 * @method     ChildPoctDeviceHasDisease|null findOneByPoctDeviceId(int $poct_device_id) Return the first ChildPoctDeviceHasDisease filtered by the poct_device_id column
 * @method     ChildPoctDeviceHasDisease|null findOneByDiseaseId(int $disease_id) Return the first ChildPoctDeviceHasDisease filtered by the disease_id column *

 * @method     ChildPoctDeviceHasDisease requirePk($key, ConnectionInterface $con = null) Return the ChildPoctDeviceHasDisease by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceHasDisease requireOne(ConnectionInterface $con = null) Return the first ChildPoctDeviceHasDisease matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceHasDisease requireOneByPoctDeviceHasDiseaseId(int $poct_device_has_disease_id) Return the first ChildPoctDeviceHasDisease filtered by the poct_device_has_disease_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceHasDisease requireOneByPoctDeviceId(int $poct_device_id) Return the first ChildPoctDeviceHasDisease filtered by the poct_device_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPoctDeviceHasDisease requireOneByDiseaseId(int $disease_id) Return the first ChildPoctDeviceHasDisease filtered by the disease_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPoctDeviceHasDisease[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPoctDeviceHasDisease objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> find(ConnectionInterface $con = null) Return ChildPoctDeviceHasDisease objects based on current ModelCriteria
 * @method     ChildPoctDeviceHasDisease[]|ObjectCollection findByPoctDeviceHasDiseaseId(int $poct_device_has_disease_id) Return ChildPoctDeviceHasDisease objects filtered by the poct_device_has_disease_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> findByPoctDeviceHasDiseaseId(int $poct_device_has_disease_id) Return ChildPoctDeviceHasDisease objects filtered by the poct_device_has_disease_id column
 * @method     ChildPoctDeviceHasDisease[]|ObjectCollection findByPoctDeviceId(int $poct_device_id) Return ChildPoctDeviceHasDisease objects filtered by the poct_device_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> findByPoctDeviceId(int $poct_device_id) Return ChildPoctDeviceHasDisease objects filtered by the poct_device_id column
 * @method     ChildPoctDeviceHasDisease[]|ObjectCollection findByDiseaseId(int $disease_id) Return ChildPoctDeviceHasDisease objects filtered by the disease_id column
 * @psalm-method ObjectCollection&\Traversable<ChildPoctDeviceHasDisease> findByDiseaseId(int $disease_id) Return ChildPoctDeviceHasDisease objects filtered by the disease_id column
 * @method     ChildPoctDeviceHasDisease[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPoctDeviceHasDisease> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PoctDeviceHasDiseaseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\PoctDeviceHasDiseaseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\PoctDeviceHasDisease', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPoctDeviceHasDiseaseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPoctDeviceHasDiseaseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPoctDeviceHasDiseaseQuery) {
            return $criteria;
        }
        $query = new ChildPoctDeviceHasDiseaseQuery();
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
     * @return ChildPoctDeviceHasDisease|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PoctDeviceHasDiseaseTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPoctDeviceHasDisease A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT poct_device_has_disease_id, poct_device_id, disease_id FROM poct_device_has_disease WHERE poct_device_has_disease_id = :p0';
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
            /** @var ChildPoctDeviceHasDisease $obj */
            $obj = new ChildPoctDeviceHasDisease();
            $obj->hydrate($row);
            PoctDeviceHasDiseaseTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPoctDeviceHasDisease|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the poct_device_has_disease_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPoctDeviceHasDiseaseId(1234); // WHERE poct_device_has_disease_id = 1234
     * $query->filterByPoctDeviceHasDiseaseId(array(12, 34)); // WHERE poct_device_has_disease_id IN (12, 34)
     * $query->filterByPoctDeviceHasDiseaseId(array('min' => 12)); // WHERE poct_device_has_disease_id > 12
     * </code>
     *
     * @param     mixed $poctDeviceHasDiseaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceHasDiseaseId($poctDeviceHasDiseaseId = null, $comparison = null)
    {
        if (is_array($poctDeviceHasDiseaseId)) {
            $useMinMax = false;
            if (isset($poctDeviceHasDiseaseId['min'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $poctDeviceHasDiseaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDeviceHasDiseaseId['max'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $poctDeviceHasDiseaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $poctDeviceHasDiseaseId, $comparison);
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
     * @see       filterByPoctDevice()
     *
     * @param     mixed $poctDeviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceId($poctDeviceId = null, $comparison = null)
    {
        if (is_array($poctDeviceId)) {
            $useMinMax = false;
            if (isset($poctDeviceId['min'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, $poctDeviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($poctDeviceId['max'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, $poctDeviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, $poctDeviceId, $comparison);
    }

    /**
     * Filter the query on the disease_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiseaseId(1234); // WHERE disease_id = 1234
     * $query->filterByDiseaseId(array(12, 34)); // WHERE disease_id IN (12, 34)
     * $query->filterByDiseaseId(array('min' => 12)); // WHERE disease_id > 12
     * </code>
     *
     * @see       filterByDisease()
     *
     * @param     mixed $diseaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByDiseaseId($diseaseId = null, $comparison = null)
    {
        if (is_array($diseaseId)) {
            $useMinMax = false;
            if (isset($diseaseId['min'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, $diseaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diseaseId['max'])) {
                $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, $diseaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, $diseaseId, $comparison);
    }

    /**
     * Filter the query by a related \Propel\Disease object
     *
     * @param \Propel\Disease|ObjectCollection $disease The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByDisease($disease, $comparison = null)
    {
        if ($disease instanceof \Propel\Disease) {
            return $this
                ->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, $disease->getDiseaseId(), $comparison);
        } elseif ($disease instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_DISEASE_ID, $disease->toKeyValue('PrimaryKey', 'DiseaseId'), $comparison);
        } else {
            throw new PropelException('filterByDisease() only accepts arguments of type \Propel\Disease or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Disease relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function joinDisease($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Disease');

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
            $this->addJoinObject($join, 'Disease');
        }

        return $this;
    }

    /**
     * Use the Disease relation Disease object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\DiseaseQuery A secondary query class using the current class as primary query
     */
    public function useDiseaseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDisease($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Disease', '\Propel\DiseaseQuery');
    }

    /**
     * Use the Disease relation Disease object
     *
     * @param callable(\Propel\DiseaseQuery):\Propel\DiseaseQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withDiseaseQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useDiseaseQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Disease table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Propel\DiseaseQuery The inner query object of the EXISTS statement
     */
    public function useDiseaseExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Disease', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Disease table for a NOT EXISTS query.
     *
     * @see useDiseaseExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Propel\DiseaseQuery The inner query object of the NOT EXISTS statement
     */
    public function useDiseaseNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Disease', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Propel\PoctDevice object
     *
     * @param \Propel\PoctDevice|ObjectCollection $poctDevice The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function filterByPoctDevice($poctDevice, $comparison = null)
    {
        if ($poctDevice instanceof \Propel\PoctDevice) {
            return $this
                ->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, $poctDevice->getPoctDeviceId(), $comparison);
        } elseif ($poctDevice instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_ID, $poctDevice->toKeyValue('PrimaryKey', 'PoctDeviceId'), $comparison);
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
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildPoctDeviceHasDisease $poctDeviceHasDisease Object to remove from the list of results
     *
     * @return $this|ChildPoctDeviceHasDiseaseQuery The current query, for fluid interface
     */
    public function prune($poctDeviceHasDisease = null)
    {
        if ($poctDeviceHasDisease) {
            $this->addUsingAlias(PoctDeviceHasDiseaseTableMap::COL_POCT_DEVICE_HAS_DISEASE_ID, $poctDeviceHasDisease->getPoctDeviceHasDiseaseId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the poct_device_has_disease table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PoctDeviceHasDiseaseTableMap::clearInstancePool();
            PoctDeviceHasDiseaseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PoctDeviceHasDiseaseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PoctDeviceHasDiseaseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PoctDeviceHasDiseaseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PoctDeviceHasDiseaseQuery
