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

class Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsResult extends Google_Collection
{
  protected $collection_key = 'quantileValues';
  protected $maxValueType = 'Google_Service_DLP_GooglePrivacyDlpV2Value';
  protected $maxValueDataType = '';
  protected $minValueType = 'Google_Service_DLP_GooglePrivacyDlpV2Value';
  protected $minValueDataType = '';
  protected $quantileValuesType = 'Google_Service_DLP_GooglePrivacyDlpV2Value';
  protected $quantileValuesDataType = 'array';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Value
   */
  public function setMaxValue(Google_Service_DLP_GooglePrivacyDlpV2Value $maxValue)
  {
    $this->maxValue = $maxValue;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Value
   */
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Value
   */
  public function setMinValue(Google_Service_DLP_GooglePrivacyDlpV2Value $minValue)
  {
    $this->minValue = $minValue;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Value
   */
  public function getMinValue()
  {
    return $this->minValue;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Value[]
   */
  public function setQuantileValues($quantileValues)
  {
    $this->quantileValues = $quantileValues;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Value[]
   */
  public function getQuantileValues()
  {
    return $this->quantileValues;
  }
}
