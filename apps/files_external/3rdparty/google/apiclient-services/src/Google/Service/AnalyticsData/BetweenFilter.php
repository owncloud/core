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

class Google_Service_AnalyticsData_BetweenFilter extends Google_Model
{
  protected $fromValueType = 'Google_Service_AnalyticsData_NumericValue';
  protected $fromValueDataType = '';
  protected $toValueType = 'Google_Service_AnalyticsData_NumericValue';
  protected $toValueDataType = '';

  /**
   * @param Google_Service_AnalyticsData_NumericValue
   */
  public function setFromValue(Google_Service_AnalyticsData_NumericValue $fromValue)
  {
    $this->fromValue = $fromValue;
  }
  /**
   * @return Google_Service_AnalyticsData_NumericValue
   */
  public function getFromValue()
  {
    return $this->fromValue;
  }
  /**
   * @param Google_Service_AnalyticsData_NumericValue
   */
  public function setToValue(Google_Service_AnalyticsData_NumericValue $toValue)
  {
    $this->toValue = $toValue;
  }
  /**
   * @return Google_Service_AnalyticsData_NumericValue
   */
  public function getToValue()
  {
    return $this->toValue;
  }
}
