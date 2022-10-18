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

namespace Google\Service\CloudSearch;

class ImageComponent extends \Google\Model
{
  /**
   * @var string
   */
  public $altText;
  protected $borderStyleType = BorderStyle::class;
  protected $borderStyleDataType = '';
  protected $cropStyleType = ImageCropStyle::class;
  protected $cropStyleDataType = '';
  /**
   * @var string
   */
  public $imageUrl;

  /**
   * @param string
   */
  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  /**
   * @return string
   */
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param BorderStyle
   */
  public function setBorderStyle(BorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return BorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  /**
   * @param ImageCropStyle
   */
  public function setCropStyle(ImageCropStyle $cropStyle)
  {
    $this->cropStyle = $cropStyle;
  }
  /**
   * @return ImageCropStyle
   */
  public function getCropStyle()
  {
    return $this->cropStyle;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageComponent::class, 'Google_Service_CloudSearch_ImageComponent');
