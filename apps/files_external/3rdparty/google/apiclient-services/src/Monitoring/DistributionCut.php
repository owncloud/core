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

namespace Google\Service\Monitoring;

class DistributionCut extends \Google\Model
{
  public $distributionFilter;
  protected $rangeType = GoogleMonitoringV3Range::class;
  protected $rangeDataType = '';

  public function setDistributionFilter($distributionFilter)
  {
    $this->distributionFilter = $distributionFilter;
  }
  public function getDistributionFilter()
  {
    return $this->distributionFilter;
  }
  /**
   * @param GoogleMonitoringV3Range
   */
  public function setRange(GoogleMonitoringV3Range $range)
  {
    $this->range = $range;
  }
  /**
   * @return GoogleMonitoringV3Range
   */
  public function getRange()
  {
    return $this->range;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DistributionCut::class, 'Google_Service_Monitoring_DistributionCut');
