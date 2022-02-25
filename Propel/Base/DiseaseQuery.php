<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\Disease as ChildDisease;
use Propel\DiseaseQuery as ChildDiseaseQuery;
use Propel\Map\DiseaseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'disease' table.
 *
 *
 *
 * @method     ChildDiseaseQuery orderByDiseaseId($order = Criteria::ASC) Order by the disease_id column
 * @method     ChildDiseaseQuery orderByDiseaseApiKey($order = Criteria::ASC) Order by the disease_api_key column
 * @method     ChildDiseaseQuery orderByDiseaseName($order = Criteria::ASC) Order by the disease_name column
 * @method     ChildDiseaseQuery orderByDiseaseGroup($order = Criteria::ASC) Order by the disease_group column
 *
 * @method     ChildDiseaseQuery groupByDiseaseId() Group by the disease_id column
 * @method     ChildDiseaseQuery groupByDiseaseApiKey() Group by the disease_api_key column
 * @method     ChildDiseaseQuery groupByDiseaseName() Group by the disease_name column
 * @method     ChildDiseaseQuery groupByDiseaseGroup() Group by the disease_group column
 *
 * @method     ChildDiseaseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDiseaseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDiseaseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDiseaseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDiseaseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDiseaseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDiseaseQuery leftJoinPoctDeviceHasDisease($relationAlias = null) Adds a LEFT JOIN clause to the query using the PoctDeviceHasDisease relation
 * @method     ChildDiseaseQuery rightJoinPoctDeviceHasDisease($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PoctDeviceHasDisease relation
 * @method     ChildDiseaseQuery innerJoinPoctDeviceHasDisease($relationAlias = null) Adds a INNER JOIN clause to the query using the PoctDeviceHasDisease relation
 *
 * @method     ChildDiseaseQuery joinWithPoctDeviceHasDisease($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PoctDeviceHasDisease relation
 *
 * @method     ChildDiseaseQuery leftJoinWithPoctDeviceHasDisease() Adds a LEFT JOIN clause and with to the query using the PoctDeviceHasDisease relation
 * @method     ChildDiseaseQuery rightJoinWithPoctDeviceHasDisease() Adds a RIGHT JOIN clause and with to the query using the PoctDeviceHasDisease relation
 * @method     ChildDiseaseQuery innerJoinWithPoctDeviceHasDisease() Adds a INNER JOIN clause and with to the query using the PoctDeviceHasDisease relation
 *
 * @method     \Propel\PoctDeviceHasDiseaseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDisease|null findOne(ConnectionInterface $con = null) Return the first ChildDisease matching the query
 * @method     ChildDisease findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDisease matching the query, or a new ChildDisease object populated from the query conditions when no match is found
 *
 * @method     ChildDisease|null findOneByDiseaseId(int $disease_id) Return the first ChildDisease filtered by the disease_id column
 * @method     ChildDisease|null findOneByDiseaseApiKey(string $disease_api_key) Return the first ChildDisease filtered by the disease_api_key column
 * @method     ChildDisease|null findOneByDiseaseName(string $disease_name) Return the first ChildDisease filtered by the disease_name column
 * @method     ChildDisease|null findOneByDiseaseGroup(string $disease_group) Return the first ChildDisease filtered by the disease_group column *

 * @method     ChildDisease requirePk($key, ConnectionInterface $con = null) Return the ChildDisease by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDisease requireOne(ConnectionInterface $con = null) Return the first ChildDisease matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDisease requireOneByDiseaseId(int $disease_id) Return the first ChildDisease filtered by the disease_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDisease requireOneByDiseaseApiKey(string $disease_api_key) Return the first ChildDisease filtered by the disease_api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDisease requireOneByDiseaseName(string $disease_name) Return the first ChildDisease filtered by the disease_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDisease requireOneByDiseaseGroup(string $disease_group) Return the first ChildDisease filtered by the disease_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDisease[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDisease objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildDisease> find(ConnectionInterface $con = null) Return ChildDisease objects based on current ModelCriteria
 * @method     ChildDisease[]|ObjectCollection findByDiseaseId(int $disease_id) Return ChildDisease objects filtered by the disease_id column
 * @psalm-method ObjectCollection&\Traversable<ChildDisease> findByDiseaseId(int $disease_id) Return ChildDisease objects filtered by the disease_id column
 * @method     ChildDisease[]|ObjectCollection findByDiseaseApiKey(string $disease_api_key) Return ChildDisease objects filtered by the disease_api_key column
 * @psalm-method ObjectCollection&\Traversable<ChildDisease> findByDiseaseApiKey(string $disease_api_key) Return ChildDisease objects filtered by the disease_api_key column
 * @method     ChildDisease[]|ObjectCollection findByDiseaseName(string $disease_name) Return ChildDisease objects filtered by the disease_name column
 * @psalm-method ObjectCollection&\Traversable<ChildDisease> findByDiseaseName(string $disease_name) Return ChildDisease objects filtered by the disease_name column
 * @method     ChildDisease[]|ObjectCollection findByDiseaseGroup(string $disease_group) Return ChildDisease objects filtered by the disease_group column
 * @psalm-method ObjectCollection&\Traversable<ChildDisease> findByDiseaseGroup(string $disease_group) Return ChildDisease objects filtered by the disease_group column
 * @method     ChildDisease[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildDisease> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DiseaseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\DiseaseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Disease', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDiseaseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDiseaseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDiseaseQuery) {
            return $criteria;
        }
        $query = new ChildDiseaseQuery();
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
     * @return ChildDisease|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DiseaseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DiseaseTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDisease A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT disease_id, disease_api_key, disease_name, disease_group FROM disease WHERE disease_id = :p0';
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
            /** @var ChildDisease $obj */
            $obj = new ChildDisease();
            $obj->hydrate($row);
            DiseaseTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDisease|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $keys, Criteria::IN);
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
     * @param     mixed $diseaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByDiseaseId($diseaseId = null, $comparison = null)
    {
        if (is_array($diseaseId)) {
            $useMinMax = false;
            if (isset($diseaseId['min'])) {
                $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $diseaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diseaseId['max'])) {
                $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $diseaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $diseaseId, $comparison);
    }

    /**
     * Filter the query on the disease_api_key column
     *
     * Example usage:
     * <code>
     * $query->filterByDiseaseApiKey('fooValue');   // WHERE disease_api_key = 'fooValue'
     * $query->filterByDiseaseApiKey('%fooValue%', Criteria::LIKE); // WHERE disease_api_key LIKE '%fooValue%'
     * $query->filterByDiseaseApiKey(['foo', 'bar']); // WHERE disease_api_key IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $diseaseApiKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByDiseaseApiKey($diseaseApiKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diseaseApiKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_API_KEY, $diseaseApiKey, $comparison);
    }

    /**
     * Filter the query on the disease_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDiseaseName('fooValue');   // WHERE disease_name = 'fooValue'
     * $query->filterByDiseaseName('%fooValue%', Criteria::LIKE); // WHERE disease_name LIKE '%fooValue%'
     * $query->filterByDiseaseName(['foo', 'bar']); // WHERE disease_name IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $diseaseName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByDiseaseName($diseaseName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diseaseName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_NAME, $diseaseName, $comparison);
    }

    /**
     * Filter the query on the disease_group column
     *
     * Example usage:
     * <code>
     * $query->filterByDiseaseGroup('fooValue');   // WHERE disease_group = 'fooValue'
     * $query->filterByDiseaseGroup('%fooValue%', Criteria::LIKE); // WHERE disease_group LIKE '%fooValue%'
     * $query->filterByDiseaseGroup(['foo', 'bar']); // WHERE disease_group IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $diseaseGroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByDiseaseGroup($diseaseGroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diseaseGroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_GROUP, $diseaseGroup, $comparison);
    }

    /**
     * Filter the query by a related \Propel\PoctDeviceHasDisease object
     *
     * @param \Propel\PoctDeviceHasDisease|ObjectCollection $poctDeviceHasDisease the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDiseaseQuery The current query, for fluid interface
     */
    public function filterByPoctDeviceHasDisease($poctDeviceHasDisease, $comparison = null)
    {
        if ($poctDeviceHasDisease instanceof \Propel\PoctDeviceHasDisease) {
            return $this
                ->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $poctDeviceHasDisease->getDiseaseId(), $comparison);
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
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
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
     * @param   ChildDisease $disease Object to remove from the list of results
     *
     * @return $this|ChildDiseaseQuery The current query, for fluid interface
     */
    public function prune($disease = null)
    {
        if ($disease) {
            $this->addUsingAlias(DiseaseTableMap::COL_DISEASE_ID, $disease->getDiseaseId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the disease table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiseaseTableMap::clearInstancePool();
            DiseaseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DiseaseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DiseaseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DiseaseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DiseaseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DiseaseQuery
