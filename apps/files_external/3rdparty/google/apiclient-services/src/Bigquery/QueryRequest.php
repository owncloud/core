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

class QueryRequest extends \Google\Collection
{
  protected $collection_key = 'queryParameters';
  protected $connectionPropertiesType = ConnectionProperty::class;
  protected $connectionPropertiesDataType = 'array';
  /**
   * @var bool
   */
  public $createSession;
  protected $defaultDatasetType = DatasetReference::class;
  protected $defaultDatasetDataType = '';
  /**
   * @var bool
   */
  public $dryRun;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $maxResults;
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
  public $query;
  protected $queryParametersType = QueryParameter::class;
  protected $queryParametersDataType = 'array';
  /**
   * @var string
   */
  public $requestId;
  /**
   * @var string
   */
  public $timeoutMs;
  /**
   * @var bool
   */
  public $useLegacySql;
  /**
   * @var bool
   */
  public $useQueryCache;

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
   * @param bool
   */
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  /**
   * @return bool
   */
  public function getDryRun()
  {
    return $this->dryRun;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }
  /**
   * @return string
   */
  public function getMaxResults()
  {
    return $this->maxResults;
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
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param string
   */
  public function setTimeoutMs($timeoutMs)
  {
    $this->timeoutMs = $timeoutMs;
  }
  /**
   * @return string
   */
  public function getTimeoutMs()
  {
    return $this->timeoutMs;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryRequest::class, 'Google_Service_Bigquery_QueryRequest');
