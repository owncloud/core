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

namespace Google\Service\AdExchangeBuyer;

class TargetingValue extends \Google\Model
{
  protected $creativeSizeValueType = TargetingValueCreativeSize::class;
  protected $creativeSizeValueDataType = '';
  protected $dayPartTargetingValueType = TargetingValueDayPartTargeting::class;
  protected $dayPartTargetingValueDataType = '';
  protected $demogAgeCriteriaValueType = TargetingValueDemogAgeCriteria::class;
  protected $demogAgeCriteriaValueDataType = '';
  protected $demogGenderCriteriaValueType = TargetingValueDemogGenderCriteria::class;
  protected $demogGenderCriteriaValueDataType = '';
  public $longValue;
  protected $requestPlatformTargetingValueType = TargetingValueRequestPlatformTargeting::class;
  protected $requestPlatformTargetingValueDataType = '';
  public $stringValue;

  /**
   * @param TargetingValueCreativeSize
   */
  public function setCreativeSizeValue(TargetingValueCreativeSize $creativeSizeValue)
  {
    $this->creativeSizeValue = $creativeSizeValue;
  }
  /**
   * @return TargetingValueCreativeSize
   */
  public function getCreativeSizeValue()
  {
    return $this->creativeSizeValue;
  }
  /**
   * @param TargetingValueDayPartTargeting
   */
  public function setDayPartTargetingValue(TargetingValueDayPartTargeting $dayPartTargetingValue)
  {
    $this->dayPartTargetingValue = $dayPartTargetingValue;
  }
  /**
   * @return TargetingValueDayPartTargeting
   */
  public function getDayPartTargetingValue()
  {
    return $this->dayPartTargetingValue;
  }
  /**
   * @param TargetingValueDemogAgeCriteria
   */
  public function setDemogAgeCriteriaValue(TargetingValueDemogAgeCriteria $demogAgeCriteriaValue)
  {
    $this->demogAgeCriteriaValue = $demogAgeCriteriaValue;
  }
  /**
   * @return TargetingValueDemogAgeCriteria
   */
  public function getDemogAgeCriteriaValue()
  {
    return $this->demogAgeCriteriaValue;
  }
  /**
   * @param TargetingValueDemogGenderCriteria
   */
  public function setDemogGenderCriteriaValue(TargetingValueDemogGenderCriteria $demogGenderCriteriaValue)
  {
    $this->demogGenderCriteriaValue = $demogGenderCriteriaValue;
  }
  /**
   * @return TargetingValueDemogGenderCriteria
   */
  public function getDemogGenderCriteriaValue()
  {
    return $this->demogGenderCriteriaValue;
  }
  public function setLongValue($longValue)
  {
    $this->longValue = $longValue;
  }
  public function getLongValue()
  {
    return $this->longValue;
  }
  /**
   * @param TargetingValueRequestPlatformTargeting
   */
  public function setRequestPlatformTargetingValue(TargetingValueRequestPlatformTargeting $requestPlatformTargetingValue)
  {
    $this->requestPlatformTargetingValue = $requestPlatformTargetingValue;
  }
  /**
   * @return TargetingValueRequestPlatformTargeting
   */
  public function getRequestPlatformTargetingValue()
  {
    return $this->requestPlatformTargetingValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetingValue::class, 'Google_Service_AdExchangeBuyer_TargetingValue');
