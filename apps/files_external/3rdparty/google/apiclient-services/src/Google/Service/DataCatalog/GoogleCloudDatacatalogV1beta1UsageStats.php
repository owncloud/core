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

class Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1UsageStats extends Google_Model
{
  public $totalCancellations;
  public $totalCompletions;
  public $totalExecutionTimeForCompletionsMillis;
  public $totalFailures;

  public function setTotalCancellations($totalCancellations)
  {
    $this->totalCancellations = $totalCancellations;
  }
  public function getTotalCancellations()
  {
    return $this->totalCancellations;
  }
  public function setTotalCompletions($totalCompletions)
  {
    $this->totalCompletions = $totalCompletions;
  }
  public function getTotalCompletions()
  {
    return $this->totalCompletions;
  }
  public function setTotalExecutionTimeForCompletionsMillis($totalExecutionTimeForCompletionsMillis)
  {
    $this->totalExecutionTimeForCompletionsMillis = $totalExecutionTimeForCompletionsMillis;
  }
  public function getTotalExecutionTimeForCompletionsMillis()
  {
    return $this->totalExecutionTimeForCompletionsMillis;
  }
  public function setTotalFailures($totalFailures)
  {
    $this->totalFailures = $totalFailures;
  }
  public function getTotalFailures()
  {
    return $this->totalFailures;
  }
}
