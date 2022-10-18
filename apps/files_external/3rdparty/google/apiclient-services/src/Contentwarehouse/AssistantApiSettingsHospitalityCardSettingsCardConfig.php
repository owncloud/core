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

namespace Google\Service\Contentwarehouse;

class AssistantApiSettingsHospitalityCardSettingsCardConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $activeActionRequired;
  /**
   * @var bool
   */
  public $dismissable;
  protected $effectiveTimeType = AssistantApiTimestamp::class;
  protected $effectiveTimeDataType = '';
  protected $expiryTimeType = AssistantApiTimestamp::class;
  protected $expiryTimeDataType = '';
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string
   */
  public $moduleId;
  /**
   * @var string
   */
  public $payloadQuery;
  /**
   * @var string
   */
  public $title;

  /**
   * @param bool
   */
  public function setActiveActionRequired($activeActionRequired)
  {
    $this->activeActionRequired = $activeActionRequired;
  }
  /**
   * @return bool
   */
  public function getActiveActionRequired()
  {
    return $this->activeActionRequired;
  }
  /**
   * @param bool
   */
  public function setDismissable($dismissable)
  {
    $this->dismissable = $dismissable;
  }
  /**
   * @return bool
   */
  public function getDismissable()
  {
    return $this->dismissable;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setEffectiveTime(AssistantApiTimestamp $effectiveTime)
  {
    $this->effectiveTime = $effectiveTime;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getEffectiveTime()
  {
    return $this->effectiveTime;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setExpiryTime(AssistantApiTimestamp $expiryTime)
  {
    $this->expiryTime = $expiryTime;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getExpiryTime()
  {
    return $this->expiryTime;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param string
   */
  public function setModuleId($moduleId)
  {
    $this->moduleId = $moduleId;
  }
  /**
   * @return string
   */
  public function getModuleId()
  {
    return $this->moduleId;
  }
  /**
   * @param string
   */
  public function setPayloadQuery($payloadQuery)
  {
    $this->payloadQuery = $payloadQuery;
  }
  /**
   * @return string
   */
  public function getPayloadQuery()
  {
    return $this->payloadQuery;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsHospitalityCardSettingsCardConfig::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsHospitalityCardSettingsCardConfig');
