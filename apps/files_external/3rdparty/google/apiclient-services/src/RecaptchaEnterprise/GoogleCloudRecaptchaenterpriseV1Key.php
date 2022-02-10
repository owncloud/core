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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1Key extends \Google\Model
{
  protected $androidSettingsType = GoogleCloudRecaptchaenterpriseV1AndroidKeySettings::class;
  protected $androidSettingsDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  protected $iosSettingsType = GoogleCloudRecaptchaenterpriseV1IOSKeySettings::class;
  protected $iosSettingsDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $testingOptionsType = GoogleCloudRecaptchaenterpriseV1TestingOptions::class;
  protected $testingOptionsDataType = '';
  protected $wafSettingsType = GoogleCloudRecaptchaenterpriseV1WafSettings::class;
  protected $wafSettingsDataType = '';
  protected $webSettingsType = GoogleCloudRecaptchaenterpriseV1WebKeySettings::class;
  protected $webSettingsDataType = '';

  /**
   * @param GoogleCloudRecaptchaenterpriseV1AndroidKeySettings
   */
  public function setAndroidSettings(GoogleCloudRecaptchaenterpriseV1AndroidKeySettings $androidSettings)
  {
    $this->androidSettings = $androidSettings;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1AndroidKeySettings
   */
  public function getAndroidSettings()
  {
    return $this->androidSettings;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1IOSKeySettings
   */
  public function setIosSettings(GoogleCloudRecaptchaenterpriseV1IOSKeySettings $iosSettings)
  {
    $this->iosSettings = $iosSettings;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1IOSKeySettings
   */
  public function getIosSettings()
  {
    return $this->iosSettings;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1TestingOptions
   */
  public function setTestingOptions(GoogleCloudRecaptchaenterpriseV1TestingOptions $testingOptions)
  {
    $this->testingOptions = $testingOptions;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1TestingOptions
   */
  public function getTestingOptions()
  {
    return $this->testingOptions;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1WafSettings
   */
  public function setWafSettings(GoogleCloudRecaptchaenterpriseV1WafSettings $wafSettings)
  {
    $this->wafSettings = $wafSettings;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1WafSettings
   */
  public function getWafSettings()
  {
    return $this->wafSettings;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1WebKeySettings
   */
  public function setWebSettings(GoogleCloudRecaptchaenterpriseV1WebKeySettings $webSettings)
  {
    $this->webSettings = $webSettings;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1WebKeySettings
   */
  public function getWebSettings()
  {
    return $this->webSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1Key::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key');
