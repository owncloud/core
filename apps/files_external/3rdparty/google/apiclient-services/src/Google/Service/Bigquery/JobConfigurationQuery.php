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

class Google_Service_Bigquery_JobConfigurationQuery extends Google_Collection
{
  protected $collection_key = 'userDefinedFunctionResources';
  public $allowLargeResults;
  protected $clusteringType = 'Google_Service_Bigquery_Clustering';
  protected $clusteringDataType = '';
  protected $connectionPropertiesType = 'Google_Service_Bigquery_ConnectionProperty';
  protected $connectionPropertiesDataType = 'array';
  public $createDisposition;
  protected $defaultDatasetType = 'Google_Service_Bigquery_DatasetReference';
  protected $defaultDatasetDataType = '';
  protected $destinationEncryptionConfigurationType = 'Google_Service_Bigquery_EncryptionConfiguration';
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
  protected $destinationTableDataType = '';
  public $flattenResults;
  public $maximumBillingTier;
  public $maximumBytesBilled;
  public $parameterMode;
  public $preserveNulls;
  public $priority;
  public $query;
  protected $queryParametersType = 'Google_Service_Bigquery_QueryParameter';
  protected $queryParametersDataType = 'array';
  protected $rangePartitioningType = 'Google_Service_Bigquery_RangePartitioning';
  protected $rangePartitioningDataType = '';
  public $schemaUpdateOptions;
  protected $tableDefinitionsType = 'Google_Service_Bigquery_ExternalDataConfiguration';
  protected $tableDefinitionsDataType = 'map';
  protected $timePartitioningType = 'Google_Service_Bigquery_TimePartitioning';
  protected $timePartitioningDataType = '';
  public $useLegacySql;
  public $useQueryCache;
  protected $userDefinedFunctionResourcesType = 'Google_Service_Bigquery_UserDefinedFunctionResource';
  protected $userDefinedFunctionResourcesDataType = 'array';
  public $writeDisposition;

  public function setAllowLargeResults($allowLargeResults)
  {
    $this->allowLargeResults = $allowLargeResults;
  }
  public function getAllowLargeResults()
  {
    return $this->allowLargeResults;
  }
  /**
   * @param Google_Service_Bigquery_Clustering
   */
  public function setClustering(Google_Service_Bigquery_Clustering $clustering)
  {
    $this->clustering = $clustering;
  }
  /**
   * @return Google_Service_Bigquery_Clustering
   */
  public function getClustering()
  {
    return $this->clustering;
  }
  /**
   * @param Google_Service_Bigquery_ConnectionProperty
   */
  public function setConnectionProperties($connectionProperties)
  {
    $this->connectionProperties = $connectionProperties;
  }
  /**
   * @return Google_Service_Bigquery_ConnectionProperty
   */
  public function getConnectionProperties()
  {
    return $this->connectionProperties;
  }
  public function setCreateDisposition($createDisposition)
  {
    $this->createDisposition = $createDisposition;
  }
  public function getCreateDisposition()
  {
    return $this->createDisposition;
  }
  /**
   * @param Google_Service_Bigquery_DatasetReference
   */
  public function setDefaultDataset(Google_Service_Bigquery_DatasetReference $defaultDataset)
  {
    $this->defaultDataset = $defaultDataset;
  }
  /**
   * @return Google_Service_Bigquery_DatasetReference
   */
  public function getDefaultDataset()
  {
    return $this->defaultDataset;
  }
  /**
   * @param Google_Service_Bigquery_EncryptionConfiguration
   */
  public function setDestinationEncryptionConfiguration(Google_Service_Bigquery_EncryptionConfiguration $destinationEncryptionConfiguration)
  {
    $this->destinationEncryptionConfiguration = $destinationEncryptionConfiguration;
  }
  /**
   * @return Google_Service_Bigquery_EncryptionConfiguration
   */
  public function getDestinationEncryptionConfiguration()
  {
    return $this->destinationEncryptionConfiguration;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
  {
    $this->destinationTable = $destinationTable;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getDestinationTable()
  {
    return $this->destinationTable;
  }
  public function setFlattenResults($flattenResults)
  {
    $this->flattenResults = $flattenResults;
  }
  public function getFlattenResults()
  {
    return $this->flattenResults;
  }
  public function setMaximumBillingTier($maximumBillingTier)
  {
    $this->maximumBillingTier = $maximumBillingTier;
  }
  public function getMaximumBillingTier()
  {
    return $this->maximumBillingTier;
  }
  public function setMaximumBytesBilled($maximumBytesBilled)
  {
    $this->maximumBytesBilled = $maximumBytesBilled;
  }
  public function getMaximumBytesBilled()
  {
    return $this->maximumBytesBilled;
  }
  public function setParameterMode($parameterMode)
  {
    $this->parameterMode = $parameterMode;
  }
  public function getParameterMode()
  {
    return $this->parameterMode;
  }
  public function setPreserveNulls($preserveNulls)
  {
    $this->preserveNulls = $preserveNulls;
  }
  public function getPreserveNulls()
  {
    return $this->preserveNulls;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_Bigquery_QueryParameter
   */
  public function setQueryParameters($queryParameters)
  {
    $this->queryParameters = $queryParameters;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameter
   */
  public function getQueryParameters()
  {
    return $this->queryParameters;
  }
  /**
   * @param Google_Service_Bigquery_RangePartitioning
   */
  public function setRangePartitioning(Google_Service_Bigquery_RangePartitioning $rangePartitioning)
  {
    $this->rangePartitioning = $rangePartitioning;
  }
  /**
   * @return Google_Service_Bigquery_RangePartitioning
   */
  public function getRangePartitioning()
  {
    return $this->rangePartitioning;
  }
  public function setSchemaUpdateOptions($schemaUpdateOptions)
  {
    $this->schemaUpdateOptions = $schemaUpdateOptions;
  }
  public function getSchemaUpdateOptions()
  {
    return $this->schemaUpdateOptions;
  }
  /**
   * @param Google_Service_Bigquery_ExternalDataConfiguration
   */
  public function setTableDefinitions($tableDefinitions)
  {
    $this->tableDefinitions = $tableDefinitions;
  }
  /**
   * @return Google_Service_Bigquery_ExternalDataConfiguration
   */
  public function getTableDefinitions()
  {
    return $this->tableDefinitions;
  }
  /**
   * @param Google_Service_Bigquery_TimePartitioning
   */
  public function setTimePartitioning(Google_Service_Bigquery_TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return Google_Service_Bigquery_TimePartitioning
   */
  public function getTimePartitioning()
  {
    return $this->timePartitioning;
  }
  public function setUseLegacySql($useLegacySql)
  {
    $this->useLegacySql = $useLegacySql;
  }
  public function getUseLegacySql()
  {
    return $this->useLegacySql;
  }
  public function setUseQueryCache($useQueryCache)
  {
    $this->useQueryCache = $useQueryCache;
  }
  public function getUseQueryCache()
  {
    return $this->useQueryCache;
  }
  /**
   * @param Google_Service_Bigquery_UserDefinedFunctionResource
   */
  public function setUserDefinedFunctionResources($userDefinedFunctionResources)
  {
    $this->userDefinedFunctionResources = $userDefinedFunctionResources;
  }
  /**
   * @return Google_Service_Bigquery_UserDefinedFunctionResource
   */
  public function getUserDefinedFunctionResources()
  {
    return $this->userDefinedFunctionResources;
  }
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}
