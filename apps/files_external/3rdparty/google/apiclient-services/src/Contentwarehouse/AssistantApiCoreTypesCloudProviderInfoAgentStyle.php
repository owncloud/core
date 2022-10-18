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

class AssistantApiCoreTypesCloudProviderInfoAgentStyle extends \Google\Model
{
  protected $backgroundColorType = AssistantApiCoreTypesGovernedColor::class;
  protected $backgroundColorDataType = '';
  /**
   * @var string
   */
  public $headerTheme;
  /**
   * @var string
   */
  public $landscapeBackgroundImageUrl;
  /**
   * @var string
   */
  public $logoUrl;
  protected $maskColorType = AssistantApiCoreTypesGovernedColor::class;
  protected $maskColorDataType = '';
  /**
   * @var string
   */
  public $portraitBackgroundImageUrl;
  protected $primaryColorType = AssistantApiCoreTypesGovernedColor::class;
  protected $primaryColorDataType = '';

  /**
   * @param AssistantApiCoreTypesGovernedColor
   */
  public function setBackgroundColor(AssistantApiCoreTypesGovernedColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return AssistantApiCoreTypesGovernedColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param string
   */
  public function setHeaderTheme($headerTheme)
  {
    $this->headerTheme = $headerTheme;
  }
  /**
   * @return string
   */
  public function getHeaderTheme()
  {
    return $this->headerTheme;
  }
  /**
   * @param string
   */
  public function setLandscapeBackgroundImageUrl($landscapeBackgroundImageUrl)
  {
    $this->landscapeBackgroundImageUrl = $landscapeBackgroundImageUrl;
  }
  /**
   * @return string
   */
  public function getLandscapeBackgroundImageUrl()
  {
    return $this->landscapeBackgroundImageUrl;
  }
  /**
   * @param string
   */
  public function setLogoUrl($logoUrl)
  {
    $this->logoUrl = $logoUrl;
  }
  /**
   * @return string
   */
  public function getLogoUrl()
  {
    return $this->logoUrl;
  }
  /**
   * @param AssistantApiCoreTypesGovernedColor
   */
  public function setMaskColor(AssistantApiCoreTypesGovernedColor $maskColor)
  {
    $this->maskColor = $maskColor;
  }
  /**
   * @return AssistantApiCoreTypesGovernedColor
   */
  public function getMaskColor()
  {
    return $this->maskColor;
  }
  /**
   * @param string
   */
  public function setPortraitBackgroundImageUrl($portraitBackgroundImageUrl)
  {
    $this->portraitBackgroundImageUrl = $portraitBackgroundImageUrl;
  }
  /**
   * @return string
   */
  public function getPortraitBackgroundImageUrl()
  {
    return $this->portraitBackgroundImageUrl;
  }
  /**
   * @param AssistantApiCoreTypesGovernedColor
   */
  public function setPrimaryColor(AssistantApiCoreTypesGovernedColor $primaryColor)
  {
    $this->primaryColor = $primaryColor;
  }
  /**
   * @return AssistantApiCoreTypesGovernedColor
   */
  public function getPrimaryColor()
  {
    return $this->primaryColor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesCloudProviderInfoAgentStyle::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesCloudProviderInfoAgentStyle');
