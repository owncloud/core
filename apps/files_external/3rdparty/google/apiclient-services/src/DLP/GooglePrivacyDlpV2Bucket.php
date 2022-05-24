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

class GooglePrivacyDlpV2Bucket extends \Google\Model
{
  protected $maxType = GooglePrivacyDlpV2Value::class;
  protected $maxDataType = '';
  protected $minType = GooglePrivacyDlpV2Value::class;
  protected $minDataType = '';
  protected $replacementValueType = GooglePrivacyDlpV2Value::class;
  protected $replacementValueDataType = '';

  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setMax(GooglePrivacyDlpV2Value $max)
  {
    $this->max = $max;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getMax()
  {
    return $this->max;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setMin(GooglePrivacyDlpV2Value $min)
  {
    $this->min = $min;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getMin()
  {
    return $this->min;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setReplacementValue(GooglePrivacyDlpV2Value $replacementValue)
  {
    $this->replacementValue = $replacementValue;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getReplacementValue()
  {
    return $this->replacementValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Bucket::class, 'Google_Service_DLP_GooglePrivacyDlpV2Bucket');
