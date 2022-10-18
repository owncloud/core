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
  protected $copyType = JobStatistics5::class;
  protected $copyDataType = '';
  /**
   * @var string
   */
  public $creationTime;
  protected $dataMaskingStatisticsType = DataMaskingStatistics::class;
  protected $dataMaskingStatisticsDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $extractType = JobStatistics4::class;
  protected $extractDataType = '';
  protected $loadType = JobStatistics3::class;
  protected $loadDataType = '';
  /**
   * @var string
   */
  public $numChildJobs;
  /**
   * @var string
   */
  public $parentJobId;
  protected $queryType = JobStatistics2::class;
  protected $queryDataType = '';
  /**
   * @var string[]
   */
  public $quotaDeferments;
  protected $reservationUsageType = JobStatisticsReservationUsage::class;
  protected $reservationUsageDataType = 'array';
  /**
   * @var string
   */
  public $reservationId;
  protected $rowLevelSecurityStatisticsType = RowLevelSecurityStatistics::class;
  protected $rowLevelSecurityStatisticsDataType = '';
  protected $scriptStatisticsType = ScriptStatistics::class;
  protected $scriptStatisticsDataType = '';
  protected $sessionInfoType = SessionInfo::class;
  protected $sessionInfoDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $totalBytesProcessed;
  /**
   * @var string
   */
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
  /**
   * @param JobStatistics5
   */
  public function setCopy(JobStatistics5 $copy)
  {
    $this->copy = $copy;
  }
  /**
   * @return JobStatistics5
   */
  public function getCopy()
  {
    return $this->copy;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param DataMaskingStatistics
   */
  public function setDataMaskingStatistics(DataMaskingStatistics $dataMaskingStatistics)
  {
    $this->dataMaskingStatistics = $dataMaskingStatistics;
  }
  /**
   * @return DataMaskingStatistics
   */
  public function getDataMaskingStatistics()
  {
    return $this->dataMaskingStatistics;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setNumChildJobs($numChildJobs)
  {
    $this->numChildJobs = $numChildJobs;
  }
  /**
   * @return string
   */
  public function getNumChildJobs()
  {
    return $this->numChildJobs;
  }
  /**
   * @param string
   */
  public function setParentJobId($parentJobId)
  {
    $this->parentJobId = $parentJobId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setQuotaDeferments($quotaDeferments)
  {
    $this->quotaDeferments = $quotaDeferments;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setReservationId($reservationId)
  {
    $this->reservationId = $reservationId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
  public function setTotalSlotMs($totalSlotMs)
  {
    $this->totalSlotMs = $totalSlotMs;
  }
  /**
   * @return string
   */
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
