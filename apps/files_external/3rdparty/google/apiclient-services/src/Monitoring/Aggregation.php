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

class Aggregation extends \Google\Collection
{
  protected $collection_key = 'groupByFields';
  public $alignmentPeriod;
  public $crossSeriesReducer;
  public $groupByFields;
  public $perSeriesAligner;

  public function setAlignmentPeriod($alignmentPeriod)
  {
    $this->alignmentPeriod = $alignmentPeriod;
  }
  public function getAlignmentPeriod()
  {
    return $this->alignmentPeriod;
  }
  public function setCrossSeriesReducer($crossSeriesReducer)
  {
    $this->crossSeriesReducer = $crossSeriesReducer;
  }
  public function getCrossSeriesReducer()
  {
    return $this->crossSeriesReducer;
  }
  public function setGroupByFields($groupByFields)
  {
    $this->groupByFields = $groupByFields;
  }
  public function getGroupByFields()
  {
    return $this->groupByFields;
  }
  public function setPerSeriesAligner($perSeriesAligner)
  {
    $this->perSeriesAligner = $perSeriesAligner;
  }
  public function getPerSeriesAligner()
  {
    return $this->perSeriesAligner;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Aggregation::class, 'Google_Service_Monitoring_Aggregation');
