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

class QueryResponse extends \Google\Collection
{
  protected $collection_key = 'rows';
  /**
   * @var bool
   */
  public $cacheHit;
  protected $dmlStatsType = DmlStatistics::class;
  protected $dmlStatsDataType = '';
  protected $errorsType = ErrorProto::class;
  protected $errorsDataType = 'array';
  /**
   * @var bool
   */
  public $jobComplete;
  protected $jobReferenceType = JobReference::class;
  protected $jobReferenceDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $numDmlAffectedRows;
  /**
   * @var string
   */
  public $pageToken;
  protected $rowsType = TableRow::class;
  protected $rowsDataType = 'array';
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  protected $sessionInfoType = SessionInfo::class;
  protected $sessionInfoDataType = '';
  /**
   * @var string
   */
  public $totalBytesProcessed;
  /**
   * @var string
   */
  public $totalRows;

  /**
   * @param bool
   */
  public function setCacheHit($cacheHit)
  {
    $this->cacheHit = $cacheHit;
  }
  /**
   * @return bool
   */
  public function getCacheHit()
  {
    return $this->cacheHit;
  }
  /**
   * @param DmlStatistics
   */
  public function setDmlStats(DmlStatistics $dmlStats)
  {
    $this->dmlStats = $dmlStats;
  }
  /**
   * @return DmlStatistics
   */
  public function getDmlStats()
  {
    return $this->dmlStats;
  }
  /**
   * @param ErrorProto[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ErrorProto[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param bool
   */
  public function setJobComplete($jobComplete)
  {
    $this->jobComplete = $jobComplete;
  }
  /**
   * @return bool
   */
  public function getJobComplete()
  {
    return $this->jobComplete;
  }
  /**
   * @param JobReference
   */
  public function setJobReference(JobReference $jobReference)
  {
    $this->jobReference = $jobReference;
  }
  /**
   * @return JobReference
   */
  public function getJobReference()
  {
    return $this->jobReference;
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
   * @param string
   */
  public function setNumDmlAffectedRows($numDmlAffectedRows)
  {
    $this->numDmlAffectedRows = $numDmlAffectedRows;
  }
  /**
   * @return string
   */
  public function getNumDmlAffectedRows()
  {
    return $this->numDmlAffectedRows;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param TableRow[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return TableRow[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param TableSchema
   */
  public function setSchema(TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return TableSchema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param SessionInfo
   */
  public function setSessionInfo(SessionInfo $sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return SessionInfo
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
  /**
   * @param string
   */
  public function setTotalBytesProcessed($totalBytesProcessed)
  {
    $this->totalBytesProcessed = $totalBytesProcessed;
  }
  /**
   * @return string
   */
  public function getTotalBytesProcessed()
  {
    return $this->totalBytesProcessed;
  }
  /**
   * @param string
   */
  public function setTotalRows($totalRows)
  {
    $this->totalRows = $totalRows;
  }
  /**
   * @return string
   */
  public function getTotalRows()
  {
    return $this->totalRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryResponse::class, 'Google_Service_Bigquery_QueryResponse');
