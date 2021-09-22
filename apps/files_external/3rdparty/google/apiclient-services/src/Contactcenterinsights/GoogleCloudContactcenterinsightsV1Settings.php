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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1Settings extends \Google\Model
{
  protected $analysisConfigType = GoogleCloudContactcenterinsightsV1SettingsAnalysisConfig::class;
  protected $analysisConfigDataType = '';
  public $conversationTtl;
  public $createTime;
  public $languageCode;
  public $name;
  public $pubsubNotificationSettings;
  public $updateTime;

  /**
   * @param GoogleCloudContactcenterinsightsV1SettingsAnalysisConfig
   */
  public function setAnalysisConfig(GoogleCloudContactcenterinsightsV1SettingsAnalysisConfig $analysisConfig)
  {
    $this->analysisConfig = $analysisConfig;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SettingsAnalysisConfig
   */
  public function getAnalysisConfig()
  {
    return $this->analysisConfig;
  }
  public function setConversationTtl($conversationTtl)
  {
    $this->conversationTtl = $conversationTtl;
  }
  public function getConversationTtl()
  {
    return $this->conversationTtl;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPubsubNotificationSettings($pubsubNotificationSettings)
  {
    $this->pubsubNotificationSettings = $pubsubNotificationSettings;
  }
  public function getPubsubNotificationSettings()
  {
    return $this->pubsubNotificationSettings;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1Settings::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1Settings');
