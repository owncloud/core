<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Bigquery;

class JobConfigurationQuery extends \Google\Collection
{
  protected $collection_key = 'userDefinedFunctionResources';
  /**
   * @var bool
   */
  public $allowLargeResults;
  protected $clusteringType = Clustering::class;
  protected $clusteringDataType = '';
  protected $connectionPropertiesType = ConnectionProperty::class;
  protected $connectionPropertiesDataType = 'array';
  /**
   * @var string
   */
  public $createDisposition;
  /**
   * @var bool
   */
  public $createSession;
  protected $defaultDatasetType = DatasetReference::class;
  protected $defaultDatasetDataType = '';
  protected $destinationEncryptionConfigurationType = EncryptionConfiguration::class;
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = TableReference::class;
  protected $destinationTableDataType = '';
  /**
   * @var bool
   */
  public $flattenResults;
  /**
   * @var int
   */
  public $maximumBillingTier;
  /**
   * @var string
   */
  public $maximumBytesBilled;
  /**
   * @var string
   */
  public $parameterMode;
  /**
   * @var bool
   */
  public $preserveNulls;
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $query;
  protected $queryParametersType = QueryParameter::class;
  protected $queryParametersDataType = 'array';
  protected $rangePartitioningType = RangePartitioning::class;
  protected $rangePartitioningDataType = '';
  /**
   * @var string[]
   */
  public $schemaUpdateOptions;
  protected $tableDefinitionsType = ExternalDataConfiguration::class;
  protected $tableDefinitionsDataType = 'map';
  protected $timePartitioningType = TimePartitioning::class;
  protected $timePartitioningDataType = '';
  /**
   * @var bool
   */
  public $useLegacySql;
  /**
   * @var bool
   */
  public $useQueryCache;
  protected $userDefinedFunctionResourcesType = UserDefinedFunctionResource::class;
  protected $userDefinedFunctionResourcesDataType = 'array';
  /**
   * @var string
   */
  public $writeDisposition;

  /**
   * @param bool
   */
  public function setAllowLargeResults($allowLargeResults)
  {
    $this->allowLargeResults = $allowLargeResults;
  }
  /**
   * @return bool
   */
  public function getAllowLargeResults()
  {
    return $this->allowLargeResults;
  }
  /**
   * @param Clustering
   */
  public function setClustering(Clustering $clustering)
  {
    $this->clustering = $clustering;
  }
  /**
   * @return Clustering
   */
  public function getClustering()
  {
    return $this->clustering;
  }
  /**
   * @param ConnectionProperty[]
   */
  public function setConnectionProperties($connectionProperties)
  {
    $this->connectionProperties = $connectionProperties;
  }
  /**
   * @return ConnectionProperty[]
   */
  public function getConnectionProperties()
  {
    return $this->connectionProperties;
  }
  /**
   * @param string
   */
  public function setCreateDisposition($createDisposition)
  {
    $this->createDisposition = $createDisposition;
  }
  /**
   * @return string
   */
  public function getCreateDisposition()
  {
    return $this->createDisposition;
  }
  /**
   * @param bool
   */
  public function setCreateSession($createSession)
  {
    $this->createSession = $createSession;
  }
  /**
   * @return bool
   */
  public function getCreateSession()
  {
    return $this->createSession;
  }
  /**
   * @param DatasetReference
   */
  public function setDefaultDataset(DatasetReference $defaultDataset)
  {
    $this->defaultDataset = $defaultDataset;
  }
  /**
   * @return DatasetReference
   */
  public function getDefaultDataset()
  {
    return $this->defaultDataset;
  }
  /**
   * @param EncryptionConfiguration
   */
  public function setDestinationEncryptionConfiguration(EncryptionConfiguration $destinationEncryptionConfiguration)
  {
    $this->destinationEncryptionConfiguration = $destinationEncryptionConfiguration;
  }
  /**
   * @return EncryptionConfiguration
   */
  public function getDestinationEncryptionConfiguration()
  {
    return $this->destinationEncryptionConfiguration;
  }
  /**
   * @param TableReference
   */
  public function setDestinationTable(TableReference $destinationTable)
  {
    $this->destinationTable = $destinationTable;
  }
  /**
   * @return TableReference
   */
  public function getDestinationTable()
  {
    return $this->destinationTable;
  }
  /**
   * @param bool
   */
  public function setFlattenResults($flattenResults)
  {
    $this->flattenResults = $flattenResults;
  }
  /**
   * @return bool
   */
  public function getFlattenResults()
  {
    return $this->flattenResults;
  }
  /**
   * @param int
   */
  public function setMaximumBillingTier($maximumBillingTier)
  {
    $this->maximumBillingTier = $maximumBillingTier;
  }
  /**
   * @return int
   */
  public function getMaximumBillingTier()
  {
    return $this->maximumBillingTier;
  }
  /**
   * @param string
   */
  public function setMaximumBytesBilled($maximumBytesBilled)
  {
    $this->maximumBytesBilled = $maximumBytesBilled;
  }
  /**
   * @return string
   */
  public function getMaximumBytesBilled()
  {
    return $this->maximumBytesBilled;
  }
  /**
   * @param string
   */
  public function setParameterMode($parameterMode)
  {
    $this->parameterMode = $parameterMode;
  }
  /**
   * @return string
   */
  public function getParameterMode()
  {
    return $this->parameterMode;
  }
  /**
   * @param bool
   */
  public function setPreserveNulls($preserveNulls)
  {
    $this->preserveNulls = $preserveNulls;
  }
  /**
   * @return bool
   */
  public function getPreserveNulls()
  {
    return $this->preserveNulls;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param QueryParameter[]
   */
  public function setQueryParameters($queryParameters)
  {
    $this->queryParameters = $queryParameters;
  }
  /**
   * @return QueryParameter[]
   */
  public function getQueryParameters()
  {
    return $this->queryParameters;
  }
  /**
   * @param RangePartitioning
   */
  public function setRangePartitioning(RangePartitioning $rangePartitioning)
  {
    $this->rangePartitioning = $rangePartitioning;
  }
  /**
   * @return RangePartitioning
   */
  public function getRangePartitioning()
  {
    return $this->rangePartitioning;
  }
  /**
   * @param string[]
   */
  public function setSchemaUpdateOptions($schemaUpdateOptions)
  {
    $this->schemaUpdateOptions = $schemaUpdateOptions;
  }
  /**
   * @return string[]
   */
  public function getSchemaUpdateOptions()
  {
    return $this->schemaUpdateOptions;
  }
  /**
   * @param ExternalDataConfiguration[]
   */
  public function setTableDefinitions($tableDefinitions)
  {
    $this->tableDefinitions = $tableDefinitions;
  }
  /**
   * @return ExternalDataConfiguration[]
   */
  public function getTableDefinitions()
  {
    return $this->tableDefinitions;
  }
  /**
   * @param TimePartitioning
   */
  public function setTimePartitioning(TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return TimePartitioning
   */
  public function getTimePartitioning()
  {
    return $this->timePartitioning;
  }
  /**
   * @param bool
   */
  public function setUseLegacySql($useLegacySql)
  {
    $this->useLegacySql = $useLegacySql;
  }
  /**
   * @return bool
   */
  public function getUseLegacySql()
  {
    return $this->useLegacySql;
  }
  /**
   * @param bool
   */
  public function setUseQueryCache($useQueryCache)
  {
    $this->useQueryCache = $useQueryCache;
  }
  /**
   * @return bool
   */
  public function getUseQueryCache()
  {
    return $this->useQueryCache;
  }
  /**
   * @param UserDefinedFunctionResource[]
   */
  public function setUserDefinedFunctionResources($userDefinedFunctionResources)
  {
    $this->userDefinedFunctionResources = $userDefinedFunctionResources;
  }
  /**
   * @return UserDefinedFunctionResource[]
   */
  public function getUserDefinedFunctionResources()
  {
    return $this->userDefinedFunctionResources;
  }
  /**
   * @param string
   */
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  /**
   * @return string
   */
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfigurationQuery::class, 'Google_Service_Bigquery_JobConfigurationQuery');
