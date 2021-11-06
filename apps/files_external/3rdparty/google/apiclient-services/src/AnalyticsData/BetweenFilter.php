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

namespace Google\Service\AnalyticsData;

class BetweenFilter extends \Google\Model
{
  protected $fromValueType = NumericValue::class;
  protected $fromValueDataType = '';
  protected $toValueType = NumericValue::class;
  protected $toValueDataType = '';

  /**
   * @param NumericValue
   */
  public function setFromValue(NumericValue $fromValue)
  {
    $this->fromValue = $fromValue;
  }
  /**
   * @return NumericValue
   */
  public function getFromValue()
  {
    return $this->fromValue;
  }
  /**
   * @param NumericValue
   */
  public function setToValue(NumericValue $toValue)
  {
    $this->toValue = $toValue;
  }
  /**
   * @return NumericValue
   */
  public function getToValue()
  {
    return $this->toValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BetweenFilter::class, 'Google_Service_AnalyticsData_BetweenFilter');
