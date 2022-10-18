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

namespace Google\Service\Contentwarehouse;

class ResearchScamQueryResponse extends \Google\Collection
{
  protected $collection_key = 'results';
  protected $latencyType = ResearchScamOnlineSearchLatencyStats::class;
  protected $latencyDataType = 'array';
  /**
   * @var string
   */
  public $numDeadlineExceededMachines;
  /**
   * @var string
   */
  public $numOkMachines;
  /**
   * @var string
   */
  public $numTotalMachines;
  /**
   * @var string
   */
  public $numUnreachableMachines;
  protected $restrictStatsType = ResearchScamRestrictStats::class;
  protected $restrictStatsDataType = 'array';
  protected $resultsType = ResearchScamNearestNeighbors::class;
  protected $resultsDataType = 'array';
  protected $statusType = UtilStatusProto::class;
  protected $statusDataType = '';

  /**
   * @param ResearchScamOnlineSearchLatencyStats[]
   */
  public function setLatency($latency)
  {
    $this->latency = $latency;
  }
  /**
   * @return ResearchScamOnlineSearchLatencyStats[]
   */
  public function getLatency()
  {
    return $this->latency;
  }
  /**
   * @param string
   */
  public function setNumDeadlineExceededMachines($numDeadlineExceededMachines)
  {
    $this->numDeadlineExceededMachines = $numDeadlineExceededMachines;
  }
  /**
   * @return string
   */
  public function getNumDeadlineExceededMachines()
  {
    return $this->numDeadlineExceededMachines;
  }
  /**
   * @param string
   */
  public function setNumOkMachines($numOkMachines)
  {
    $this->numOkMachines = $numOkMachines;
  }
  /**
   * @return string
   */
  public function getNumOkMachines()
  {
    return $this->numOkMachines;
  }
  /**
   * @param string
   */
  public function setNumTotalMachines($numTotalMachines)
  {
    $this->numTotalMachines = $numTotalMachines;
  }
  /**
   * @return string
   */
  public function getNumTotalMachines()
  {
    return $this->numTotalMachines;
  }
  /**
   * @param string
   */
  public function setNumUnreachableMachines($numUnreachableMachines)
  {
    $this->numUnreachableMachines = $numUnreachableMachines;
  }
  /**
   * @return string
   */
  public function getNumUnreachableMachines()
  {
    return $this->numUnreachableMachines;
  }
  /**
   * @param ResearchScamRestrictStats[]
   */
  public function setRestrictStats($restrictStats)
  {
    $this->restrictStats = $restrictStats;
  }
  /**
   * @return ResearchScamRestrictStats[]
   */
  public function getRestrictStats()
  {
    return $this->restrictStats;
  }
  /**
   * @param ResearchScamNearestNeighbors[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return ResearchScamNearestNeighbors[]
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param UtilStatusProto
   */
  public function setStatus(UtilStatusProto $status)
  {
    $this->status = $status;
  }
  /**
   * @return UtilStatusProto
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamQueryResponse::class, 'Google_Service_Contentwarehouse_ResearchScamQueryResponse');
