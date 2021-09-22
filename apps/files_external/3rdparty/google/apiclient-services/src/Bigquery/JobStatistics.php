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

class JobStatistics extends \Google\Collection
{
  protected $collection_key = 'reservationUsage';
  protected $internal_gapi_mappings = [
        "reservationId" => "reservation_id",
  ];
  public $completionRatio;
  public $creationTime;
  public $endTime;
  protected $extractType = JobStatistics4::class;
  protected $extractDataType = '';
  protected $loadType = JobStatistics3::class;
  protected $loadDataType = '';
  public $numChildJobs;
  public $parentJobId;
  protected $queryType = JobStatistics2::class;
  protected $queryDataType = '';
  public $quotaDeferments;
  protected $reservationUsageType = JobStatisticsReservationUsage::class;
  protected $reservationUsageDataType = 'array';
  public $reservationId;
  protected $rowLevelSecurityStatisticsType = RowLevelSecurityStatistics::class;
  protected $rowLevelSecurityStatisticsDataType = '';
  protected $scriptStatisticsType = ScriptStatistics::class;
  protected $scriptStatisticsDataType = '';
  protected $sessionInfoType = SessionInfo::class;
  protected $sessionInfoDataType = '';
  public $startTime;
  public $totalBytesProcessed;
  public $totalSlotMs;
  protected $transactionInfoType = TransactionInfo::class;
  protected $transactionInfoDataType = '';

  public function setCompletionRatio($completionRatio)
  {
    $this->completionRatio = $completionRatio;
  }
  public function getCompletionRatio()
  {
    return $this->completionRatio;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param JobStatistics4
   */
  public function setExtract(JobStatistics4 $extract)
  {
    $this->extract = $extract;
  }
  /**
   * @return JobStatistics4
   */
  public function getExtract()
  {
    return $this->extract;
  }
  /**
   * @param JobStatistics3
   */
  public function setLoad(JobStatistics3 $load)
  {
    $this->load = $load;
  }
  /**
   * @return JobStatistics3
   */
  public function getLoad()
  {
    return $this->load;
  }
  public function setNumChildJobs($numChildJobs)
  {
    $this->numChildJobs = $numChildJobs;
  }
  public function getNumChildJobs()
  {
    return $this->numChildJobs;
  }
  public function setParentJobId($parentJobId)
  {
    $this->parentJobId = $parentJobId;
  }
  public function getParentJobId()
  {
    return $this->parentJobId;
  }
  /**
   * @param JobStatistics2
   */
  public function setQuery(JobStatistics2 $query)
  {
    $this->query = $query;
  }
  /**
   * @return JobStatistics2
   */
  public function getQuery()
  {
    return $this->query;
  }
  public function setQuotaDeferments($quotaDeferments)
  {
    $this->quotaDeferments = $quotaDeferments;
  }
  public function getQuotaDeferments()
  {
    return $this->quotaDeferments;
  }
  /**
   * @param JobStatisticsReservationUsage[]
   */
  public function setReservationUsage($reservationUsage)
  {
    $this->reservationUsage = $reservationUsage;
  }
  /**
   * @return JobStatisticsReservationUsage[]
   */
  public function getReservationUsage()
  {
    return $this->reservationUsage;
  }
  public function setReservationId($reservationId)
  {
    $this->reservationId = $reservationId;
  }
  public function getReservationId()
  {
    return $this->reservationId;
  }
  /**
   * @param RowLevelSecurityStatistics
   */
  public function setRowLevelSecurityStatistics(RowLevelSecurityStatistics $rowLevelSecurityStatistics)
  {
    $this->rowLevelSecurityStatistics = $rowLevelSecurityStatistics;
  }
  /**
   * @return RowLevelSecurityStatistics
   */
  public function getRowLevelSecurityStatistics()
  {
    return $this->rowLevelSecurityStatistics;
  }
  /**
   * @param ScriptStatistics
   */
  public function setScriptStatistics(ScriptStatistics $scriptStatistics)
  {
    $this->scriptStatistics = $scriptStatistics;
  }
  /**
   * @return ScriptStatistics
   */
  public function getScriptStatistics()
  {
    return $this->scriptStatistics;
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setTotalBytesProcessed($totalBytesProcessed)
  {
    $this->totalBytesProcessed = $totalBytesProcessed;
  }
  public function getTotalBytesProcessed()
  {
    return $this->totalBytesProcessed;
  }
  public function setTotalSlotMs($totalSlotMs)
  {
    $this->totalSlotMs = $totalSlotMs;
  }
  public function getTotalSlotMs()
  {
    return $this->totalSlotMs;
  }
  /**
   * @param TransactionInfo
   */
  public function setTransactionInfo(TransactionInfo $transactionInfo)
  {
    $this->transactionInfo = $transactionInfo;
  }
  /**
   * @return TransactionInfo
   */
  public function getTransactionInfo()
  {
    return $this->transactionInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobStatistics::class, 'Google_Service_Bigquery_JobStatistics');
