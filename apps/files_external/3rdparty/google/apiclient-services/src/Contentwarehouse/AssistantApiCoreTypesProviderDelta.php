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

class AssistantApiCoreTypesProviderDelta extends \Google\Model
{
  protected $androidAppInfoDeltaType = AssistantApiCoreTypesAndroidAppInfoDelta::class;
  protected $androidAppInfoDeltaDataType = '';
  /**
   * @var string
   */
  public $fallbackUrl;
  /**
   * @var string
   */
  public $iconImageUrl;

  /**
   * @param AssistantApiCoreTypesAndroidAppInfoDelta
   */
  public function setAndroidAppInfoDelta(AssistantApiCoreTypesAndroidAppInfoDelta $androidAppInfoDelta)
  {
    $this->androidAppInfoDelta = $androidAppInfoDelta;
  }
  /**
   * @return AssistantApiCoreTypesAndroidAppInfoDelta
   */
  public function getAndroidAppInfoDelta()
  {
    return $this->androidAppInfoDelta;
  }
  /**
   * @param string
   */
  public function setFallbackUrl($fallbackUrl)
  {
    $this->fallbackUrl = $fallbackUrl;
  }
  /**
   * @return string
   */
  public function getFallbackUrl()
  {
    return $this->fallbackUrl;
  }
  /**
   * @param string
   */
  public function setIconImageUrl($iconImageUrl)
  {
    $this->iconImageUrl = $iconImageUrl;
  }
  /**
   * @return string
   */
  public function getIconImageUrl()
  {
    return $this->iconImageUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesProviderDelta::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesProviderDelta');
