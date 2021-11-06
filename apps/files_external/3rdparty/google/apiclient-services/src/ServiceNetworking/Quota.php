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

namespace Google\Service\ServiceNetworking;

class Quota extends \Google\Collection
{
  protected $collection_key = 'metricRules';
  protected $limitsType = QuotaLimit::class;
  protected $limitsDataType = 'array';
  protected $metricRulesType = MetricRule::class;
  protected $metricRulesDataType = 'array';

  /**
   * @param QuotaLimit[]
   */
  public function setLimits($limits)
  {
    $this->limits = $limits;
  }
  /**
   * @return QuotaLimit[]
   */
  public function getLimits()
  {
    return $this->limits;
  }
  /**
   * @param MetricRule[]
   */
  public function setMetricRules($metricRules)
  {
    $this->metricRules = $metricRules;
  }
  /**
   * @return MetricRule[]
   */
  public function getMetricRules()
  {
    return $this->metricRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Quota::class, 'Google_Service_ServiceNetworking_Quota');
