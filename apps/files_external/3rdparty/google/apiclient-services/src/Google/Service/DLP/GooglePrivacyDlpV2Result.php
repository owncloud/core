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

class Google_Service_DLP_GooglePrivacyDlpV2Result extends Google_Collection
{
  protected $collection_key = 'infoTypeStats';
  protected $hybridStatsType = 'Google_Service_DLP_GooglePrivacyDlpV2HybridInspectStatistics';
  protected $hybridStatsDataType = '';
  protected $infoTypeStatsType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoTypeStats';
  protected $infoTypeStatsDataType = 'array';
  public $processedBytes;
  public $totalEstimatedBytes;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2HybridInspectStatistics
   */
  public function setHybridStats(Google_Service_DLP_GooglePrivacyDlpV2HybridInspectStatistics $hybridStats)
  {
    $this->hybridStats = $hybridStats;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2HybridInspectStatistics
   */
  public function getHybridStats()
  {
    return $this->hybridStats;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InfoTypeStats[]
   */
  public function setInfoTypeStats($infoTypeStats)
  {
    $this->infoTypeStats = $infoTypeStats;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InfoTypeStats[]
   */
  public function getInfoTypeStats()
  {
    return $this->infoTypeStats;
  }
  public function setProcessedBytes($processedBytes)
  {
    $this->processedBytes = $processedBytes;
  }
  public function getProcessedBytes()
  {
    return $this->processedBytes;
  }
  public function setTotalEstimatedBytes($totalEstimatedBytes)
  {
    $this->totalEstimatedBytes = $totalEstimatedBytes;
  }
  public function getTotalEstimatedBytes()
  {
    return $this->totalEstimatedBytes;
  }
}
