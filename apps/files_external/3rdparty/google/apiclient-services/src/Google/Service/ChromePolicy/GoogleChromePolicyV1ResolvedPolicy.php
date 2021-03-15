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

class Google_Service_ChromePolicy_GoogleChromePolicyV1ResolvedPolicy extends Google_Model
{
  protected $sourceKeyType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey';
  protected $sourceKeyDataType = '';
  protected $targetKeyType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey';
  protected $targetKeyDataType = '';
  protected $valueType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyValue';
  protected $valueDataType = '';

  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function setSourceKey(Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey $sourceKey)
  {
    $this->sourceKey = $sourceKey;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function getSourceKey()
  {
    return $this->sourceKey;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function setTargetKey(Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey $targetKey)
  {
    $this->targetKey = $targetKey;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function getTargetKey()
  {
    return $this->targetKey;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyValue
   */
  public function setValue(Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyValue
   */
  public function getValue()
  {
    return $this->value;
  }
}
