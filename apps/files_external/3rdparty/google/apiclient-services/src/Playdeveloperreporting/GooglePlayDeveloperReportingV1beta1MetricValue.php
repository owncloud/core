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

namespace Google\Service\Playdeveloperreporting;

class GooglePlayDeveloperReportingV1beta1MetricValue extends \Google\Model
{
  protected $decimalValueType = GoogleTypeDecimal::class;
  protected $decimalValueDataType = '';
  /**
   * @var string
   */
  public $metric;

  /**
   * @param GoogleTypeDecimal
   */
  public function setDecimalValue(GoogleTypeDecimal $decimalValue)
  {
    $this->decimalValue = $decimalValue;
  }
  /**
   * @return GoogleTypeDecimal
   */
  public function getDecimalValue()
  {
    return $this->decimalValue;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePlayDeveloperReportingV1beta1MetricValue::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1MetricValue');
