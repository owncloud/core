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

class NetworkReportSpecSortCondition extends \Google\Model
{
  /**
   * @var string
   */
  public $dimension;
  /**
   * @var string
   */
  public $metric;
  /**
   * @var string
   */
  public $order;

  /**
   * @param string
   */
  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return string
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param string
   */
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return string
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param string
   */
  public function setOrder($order)
  {
    $this->order = $order;
  }
  /**
   * @return string
   */
  public function getOrder()
  {
    return $this->order;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkReportSpecSortCondition::class, 'Google_Service_AdMob_NetworkReportSpecSortCondition');
