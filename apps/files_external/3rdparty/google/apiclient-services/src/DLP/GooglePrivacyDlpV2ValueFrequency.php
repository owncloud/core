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

class GooglePrivacyDlpV2ValueFrequency extends \Google\Model
{
  public $count;
  protected $valueType = GooglePrivacyDlpV2Value::class;
  protected $valueDataType = '';

  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setValue(GooglePrivacyDlpV2Value $value)
  {
    $this->value = $value;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ValueFrequency::class, 'Google_Service_DLP_GooglePrivacyDlpV2ValueFrequency');
