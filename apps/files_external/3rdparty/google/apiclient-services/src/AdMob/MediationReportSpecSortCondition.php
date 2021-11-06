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

namespace Google\Service\AdMob;

class MediationReportSpecSortCondition extends \Google\Model
{
  public $dimension;
  public $metric;
  public $order;

  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  public function getDimension()
  {
    return $this->dimension;
  }
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
  public function setOrder($order)
  {
    $this->order = $order;
  }
  public function getOrder()
  {
    return $this->order;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediationReportSpecSortCondition::class, 'Google_Service_AdMob_MediationReportSpecSortCondition');
