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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2NumericalStatsResult extends \Google\Collection
{
  protected $collection_key = 'quantileValues';
  protected $maxValueType = GooglePrivacyDlpV2Value::class;
  protected $maxValueDataType = '';
  protected $minValueType = GooglePrivacyDlpV2Value::class;
  protected $minValueDataType = '';
  protected $quantileValuesType = GooglePrivacyDlpV2Value::class;
  protected $quantileValuesDataType = 'array';

  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setMaxValue(GooglePrivacyDlpV2Value $maxValue)
  {
    $this->maxValue = $maxValue;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setMinValue(GooglePrivacyDlpV2Value $minValue)
  {
    $this->minValue = $minValue;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getMinValue()
  {
    return $this->minValue;
  }
  /**
   * @param GooglePrivacyDlpV2Value[]
   */
  public function setQuantileValues($quantileValues)
  {
    $this->quantileValues = $quantileValues;
  }
  /**
   * @return GooglePrivacyDlpV2Value[]
   */
  public function getQuantileValues()
  {
    return $this->quantileValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2NumericalStatsResult::class, 'Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsResult');
