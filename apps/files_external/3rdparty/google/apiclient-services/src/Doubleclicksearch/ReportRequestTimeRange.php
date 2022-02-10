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

namespace Google\Service\Doubleclicksearch;

class ReportRequestTimeRange extends \Google\Model
{
  /**
   * @var string
   */
  public $changedAttributesSinceTimestamp;
  /**
   * @var string
   */
  public $changedMetricsSinceTimestamp;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var string
   */
  public $startDate;

  /**
   * @param string
   */
  public function setChangedAttributesSinceTimestamp($changedAttributesSinceTimestamp)
  {
    $this->changedAttributesSinceTimestamp = $changedAttributesSinceTimestamp;
  }
  /**
   * @return string
   */
  public function getChangedAttributesSinceTimestamp()
  {
    return $this->changedAttributesSinceTimestamp;
  }
  /**
   * @param string
   */
  public function setChangedMetricsSinceTimestamp($changedMetricsSinceTimestamp)
  {
    $this->changedMetricsSinceTimestamp = $changedMetricsSinceTimestamp;
  }
  /**
   * @return string
   */
  public function getChangedMetricsSinceTimestamp()
  {
    return $this->changedMetricsSinceTimestamp;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRequestTimeRange::class, 'Google_Service_Doubleclicksearch_ReportRequestTimeRange');
