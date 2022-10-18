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

class AssistantApiCoreTypesImage extends \Google\Model
{
  /**
   * @var string
   */
  public $accessibilityText;
  /**
   * @var string
   */
  public $appIconIdentifier;
  protected $badgeImageType = AssistantApiCoreTypesImage::class;
  protected $badgeImageDataType = '';
  /**
   * @var string
   */
  public $content;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $imageSource;
  /**
   * @var string
   */
  public $jsonContent;
  /**
   * @var string
   */
  public $letterDrawableText;
  /**
   * @var string
   */
  public $providerUrl;
  /**
   * @var string
   */
  public $sourceUrl;
  /**
   * @var string
   */
  public $sourceUrlType;
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setAccessibilityText($accessibilityText)
  {
    $this->accessibilityText = $accessibilityText;
  }
  /**
   * @return string
   */
  public function getAccessibilityText()
  {
    return $this->accessibilityText;
  }
  /**
   * @param string
   */
  public function setAppIconIdentifier($appIconIdentifier)
  {
    $this->appIconIdentifier = $appIconIdentifier;
  }
  /**
   * @return string
   */
  public function getAppIconIdentifier()
  {
    return $this->appIconIdentifier;
  }
  /**
   * @param AssistantApiCoreTypesImage
   */
  public function setBadgeImage(AssistantApiCoreTypesImage $badgeImage)
  {
    $this->badgeImage = $badgeImage;
  }
  /**
   * @return AssistantApiCoreTypesImage
   */
  public function getBadgeImage()
  {
    return $this->badgeImage;
  }
  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setImageSource($imageSource)
  {
    $this->imageSource = $imageSource;
  }
  /**
   * @return string
   */
  public function getImageSource()
  {
    return $this->imageSource;
  }
  /**
   * @param string
   */
  public function setJsonContent($jsonContent)
  {
    $this->jsonContent = $jsonContent;
  }
  /**
   * @return string
   */
  public function getJsonContent()
  {
    return $this->jsonContent;
  }
  /**
   * @param string
   */
  public function setLetterDrawableText($letterDrawableText)
  {
    $this->letterDrawableText = $letterDrawableText;
  }
  /**
   * @return string
   */
  public function getLetterDrawableText()
  {
    return $this->letterDrawableText;
  }
  /**
   * @param string
   */
  public function setProviderUrl($providerUrl)
  {
    $this->providerUrl = $providerUrl;
  }
  /**
   * @return string
   */
  public function getProviderUrl()
  {
    return $this->providerUrl;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  /**
   * @param string
   */
  public function setSourceUrlType($sourceUrlType)
  {
    $this->sourceUrlType = $sourceUrlType;
  }
  /**
   * @return string
   */
  public function getSourceUrlType()
  {
    return $this->sourceUrlType;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesImage::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesImage');
