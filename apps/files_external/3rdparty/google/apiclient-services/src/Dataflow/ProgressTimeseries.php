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

namespace Google\Service\Dataflow;

class ProgressTimeseries extends \Google\Collection
{
  protected $collection_key = 'dataPoints';
  public $currentProgress;
  protected $dataPointsType = Point::class;
  protected $dataPointsDataType = 'array';

  public function setCurrentProgress($currentProgress)
  {
    $this->currentProgress = $currentProgress;
  }
  public function getCurrentProgress()
  {
    return $this->currentProgress;
  }
  /**
   * @param Point[]
   */
  public function setDataPoints($dataPoints)
  {
    $this->dataPoints = $dataPoints;
  }
  /**
   * @return Point[]
   */
  public function getDataPoints()
  {
    return $this->dataPoints;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProgressTimeseries::class, 'Google_Service_Dataflow_ProgressTimeseries');
