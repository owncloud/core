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

class Google_Service_Bigquery_JobStatistics extends Google_Collection
{
  protected $collection_key = 'reservationUsage';
  protected $internal_gapi_mappings = array(
        "reservationId" => "reservation_id",
  );
  public $completionRatio;
  public $creationTime;
  public $endTime;
  protected $extractType = 'Google_Service_Bigquery_JobStatistics4';
  protected $extractDataType = '';
  protected $loadType = 'Google_Service_Bigquery_JobStatistics3';
  protected $loadDataType = '';
  public $numChildJobs;
  public $parentJobId;
  protected $queryType = 'Google_Service_Bigquery_JobStatistics2';
  protected $queryDataType = '';
  public $quotaDeferments;
  protected $reservationUsageType = 'Google_Service_Bigquery_JobStatisticsReservationUsage';
  protected $reservationUsageDataType = 'array';
  public $reservationId;
  protected $rowLevelSecurityStatisticsType = 'Google_Service_Bigquery_RowLevelSecurityStatistics';
  protected $rowLevelSecurityStatisticsDataType = '';
  protected $scriptStatisticsType = 'Google_Service_Bigquery_ScriptStatistics';
  protected $scriptStatisticsDataType = '';
  public $startTime;
  public $totalBytesProcessed;
  public $totalSlotMs;
  protected $transactionInfoTemplateType = 'Google_Service_Bigquery_TransactionInfo';
  protected $transactionInfoTemplateDataType = '';

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
   * @param Google_Service_Bigquery_JobStatistics4
   */
  public function setExtract(Google_Service_Bigquery_JobStatistics4 $extract)
  {
    $this->extract = $extract;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics4
   */
  public function getExtract()
  {
    return $this->extract;
  }
  /**
   * @param Google_Service_Bigquery_JobStatistics3
   */
  public function setLoad(Google_Service_Bigquery_JobStatistics3 $load)
  {
    $this->load = $load;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics3
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
   * @param Google_Service_Bigquery_JobStatistics2
   */
  public function setQuery(Google_Service_Bigquery_JobStatistics2 $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Bigquery_JobStatistics2
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
   * @param Google_Service_Bigquery_JobStatisticsReservationUsage[]
   */
  public function setReservationUsage($reservationUsage)
  {
    $this->reservationUsage = $reservationUsage;
  }
  /**
   * @return Google_Service_Bigquery_JobStatisticsReservationUsage[]
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
   * @param Google_Service_Bigquery_RowLevelSecurityStatistics
   */
  public function setRowLevelSecurityStatistics(Google_Service_Bigquery_RowLevelSecurityStatistics $rowLevelSecurityStatistics)
  {
    $this->rowLevelSecurityStatistics = $rowLevelSecurityStatistics;
  }
  /**
   * @return Google_Service_Bigquery_RowLevelSecurityStatistics
   */
  public function getRowLevelSecurityStatistics()
  {
    return $this->rowLevelSecurityStatistics;
  }
  /**
   * @param Google_Service_Bigquery_ScriptStatistics
   */
  public function setScriptStatistics(Google_Service_Bigquery_ScriptStatistics $scriptStatistics)
  {
    $this->scriptStatistics = $scriptStatistics;
  }
  /**
   * @return Google_Service_Bigquery_ScriptStatistics
   */
  public function getScriptStatistics()
  {
    return $this->scriptStatistics;
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
   * @param Google_Service_Bigquery_TransactionInfo
   */
  public function setTransactionInfoTemplate(Google_Service_Bigquery_TransactionInfo $transactionInfoTemplate)
  {
    $this->transactionInfoTemplate = $transactionInfoTemplate;
  }
  /**
   * @return Google_Service_Bigquery_TransactionInfo
   */
  public function getTransactionInfoTemplate()
  {
    return $this->transactionInfoTemplate;
  }
}
