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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1UsageStats extends \Google\Model
{
  /**
   * @var float
   */
  public $totalCancellations;
  /**
   * @var float
   */
  public $totalCompletions;
  /**
   * @var float
   */
  public $totalExecutionTimeForCompletionsMillis;
  /**
   * @var float
   */
  public $totalFailures;

  /**
   * @param float
   */
  public function setTotalCancellations($totalCancellations)
  {
    $this->totalCancellations = $totalCancellations;
  }
  /**
   * @return float
   */
  public function getTotalCancellations()
  {
    return $this->totalCancellations;
  }
  /**
   * @param float
   */
  public function setTotalCompletions($totalCompletions)
  {
    $this->totalCompletions = $totalCompletions;
  }
  /**
   * @return float
   */
  public function getTotalCompletions()
  {
    return $this->totalCompletions;
  }
  /**
   * @param float
   */
  public function setTotalExecutionTimeForCompletionsMillis($totalExecutionTimeForCompletionsMillis)
  {
    $this->totalExecutionTimeForCompletionsMillis = $totalExecutionTimeForCompletionsMillis;
  }
  /**
   * @return float
   */
  public function getTotalExecutionTimeForCompletionsMillis()
  {
    return $this->totalExecutionTimeForCompletionsMillis;
  }
  /**
   * @param float
   */
  public function setTotalFailures($totalFailures)
  {
    $this->totalFailures = $totalFailures;
  }
  /**
   * @return float
   */
  public function getTotalFailures()
  {
    return $this->totalFailures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1UsageStats::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1UsageStats');
