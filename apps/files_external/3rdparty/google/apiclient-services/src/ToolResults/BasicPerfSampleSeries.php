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

class BasicPerfSampleSeries extends \Google\Model
{
  /**
   * @var string
   */
  public $perfMetricType;
  /**
   * @var string
   */
  public $perfUnit;
  /**
   * @var string
   */
  public $sampleSeriesLabel;

  /**
   * @param string
   */
  public function setPerfMetricType($perfMetricType)
  {
    $this->perfMetricType = $perfMetricType;
  }
  /**
   * @return string
   */
  public function getPerfMetricType()
  {
    return $this->perfMetricType;
  }
  /**
   * @param string
   */
  public function setPerfUnit($perfUnit)
  {
    $this->perfUnit = $perfUnit;
  }
  /**
   * @return string
   */
  public function getPerfUnit()
  {
    return $this->perfUnit;
  }
  /**
   * @param string
   */
  public function setSampleSeriesLabel($sampleSeriesLabel)
  {
    $this->sampleSeriesLabel = $sampleSeriesLabel;
  }
  /**
   * @return string
   */
  public function getSampleSeriesLabel()
  {
    return $this->sampleSeriesLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicPerfSampleSeries::class, 'Google_Service_ToolResults_BasicPerfSampleSeries');
