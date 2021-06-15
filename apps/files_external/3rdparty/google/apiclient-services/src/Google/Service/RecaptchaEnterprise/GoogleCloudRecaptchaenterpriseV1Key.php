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

class Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key extends Google_Model
{
  protected $androidSettingsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AndroidKeySettings';
  protected $androidSettingsDataType = '';
  public $createTime;
  public $displayName;
  protected $iosSettingsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1IOSKeySettings';
  protected $iosSettingsDataType = '';
  public $labels;
  public $name;
  protected $testingOptionsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TestingOptions';
  protected $testingOptionsDataType = '';
  protected $webSettingsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1WebKeySettings';
  protected $webSettingsDataType = '';

  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AndroidKeySettings
   */
  public function setAndroidSettings(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AndroidKeySettings $androidSettings)
  {
    $this->androidSettings = $androidSettings;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AndroidKeySettings
   */
  public function getAndroidSettings()
  {
    return $this->androidSettings;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1IOSKeySettings
   */
  public function setIosSettings(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1IOSKeySettings $iosSettings)
  {
    $this->iosSettings = $iosSettings;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1IOSKeySettings
   */
  public function getIosSettings()
  {
    return $this->iosSettings;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TestingOptions
   */
  public function setTestingOptions(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TestingOptions $testingOptions)
  {
    $this->testingOptions = $testingOptions;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TestingOptions
   */
  public function getTestingOptions()
  {
    return $this->testingOptions;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1WebKeySettings
   */
  public function setWebSettings(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1WebKeySettings $webSettings)
  {
    $this->webSettings = $webSettings;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1WebKeySettings
   */
  public function getWebSettings()
  {
    return $this->webSettings;
  }
}
