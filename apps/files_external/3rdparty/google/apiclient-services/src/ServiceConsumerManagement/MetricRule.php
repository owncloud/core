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

namespace Google\Service\ServiceConsumerManagement;

class MetricRule extends \Google\Model
{
  /**
   * @var string[]
   */
  public $dynamicMetricCosts;
  /**
   * @var string[]
   */
  public $metricCosts;
  /**
   * @var string
   */
  public $selector;

  /**
   * @param string[]
   */
  public function setDynamicMetricCosts($dynamicMetricCosts)
  {
    $this->dynamicMetricCosts = $dynamicMetricCosts;
  }
  /**
   * @return string[]
   */
  public function getDynamicMetricCosts()
  {
    return $this->dynamicMetricCosts;
  }
  /**
   * @param string[]
   */
  public function setMetricCosts($metricCosts)
  {
    $this->metricCosts = $metricCosts;
  }
  /**
   * @return string[]
   */
  public function getMetricCosts()
  {
    return $this->metricCosts;
  }
  /**
   * @param string
   */
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return string
   */
  public function getSelector()
  {
    return $this->selector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricRule::class, 'Google_Service_ServiceConsumerManagement_MetricRule');
