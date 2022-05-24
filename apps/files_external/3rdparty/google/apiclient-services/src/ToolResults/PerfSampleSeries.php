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

namespace Google\Service\ToolResults;

class PerfSampleSeries extends \Google\Model
{
  protected $basicPerfSampleSeriesType = BasicPerfSampleSeries::class;
  protected $basicPerfSampleSeriesDataType = '';
  /**
   * @var string
   */
  public $executionId;
  /**
   * @var string
   */
  public $historyId;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $sampleSeriesId;
  /**
   * @var string
   */
  public $stepId;

  /**
   * @param BasicPerfSampleSeries
   */
  public function setBasicPerfSampleSeries(BasicPerfSampleSeries $basicPerfSampleSeries)
  {
    $this->basicPerfSampleSeries = $basicPerfSampleSeries;
  }
  /**
   * @return BasicPerfSampleSeries
   */
  public function getBasicPerfSampleSeries()
  {
    return $this->basicPerfSampleSeries;
  }
  /**
   * @param string
   */
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  /**
   * @return string
   */
  public function getExecutionId()
  {
    return $this->executionId;
  }
  /**
   * @param string
   */
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  /**
   * @return string
   */
  public function getHistoryId()
  {
    return $this->historyId;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setSampleSeriesId($sampleSeriesId)
  {
    $this->sampleSeriesId = $sampleSeriesId;
  }
  /**
   * @return string
   */
  public function getSampleSeriesId()
  {
    return $this->sampleSeriesId;
  }
  /**
   * @param string
   */
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  /**
   * @return string
   */
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerfSampleSeries::class, 'Google_Service_ToolResults_PerfSampleSeries');
