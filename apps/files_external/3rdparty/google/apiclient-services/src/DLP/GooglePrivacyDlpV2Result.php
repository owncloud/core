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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2Result extends \Google\Collection
{
  protected $collection_key = 'infoTypeStats';
  protected $hybridStatsType = GooglePrivacyDlpV2HybridInspectStatistics::class;
  protected $hybridStatsDataType = '';
  protected $infoTypeStatsType = GooglePrivacyDlpV2InfoTypeStats::class;
  protected $infoTypeStatsDataType = 'array';
  public $processedBytes;
  public $totalEstimatedBytes;

  /**
   * @param GooglePrivacyDlpV2HybridInspectStatistics
   */
  public function setHybridStats(GooglePrivacyDlpV2HybridInspectStatistics $hybridStats)
  {
    $this->hybridStats = $hybridStats;
  }
  /**
   * @return GooglePrivacyDlpV2HybridInspectStatistics
   */
  public function getHybridStats()
  {
    return $this->hybridStats;
  }
  /**
   * @param GooglePrivacyDlpV2InfoTypeStats[]
   */
  public function setInfoTypeStats($infoTypeStats)
  {
    $this->infoTypeStats = $infoTypeStats;
  }
  /**
   * @return GooglePrivacyDlpV2InfoTypeStats[]
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Result::class, 'Google_Service_DLP_GooglePrivacyDlpV2Result');
