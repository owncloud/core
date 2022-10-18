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

class CardHeader extends \Google\Model
{
  /**
   * @var string
   */
  public $imageAltText;
  /**
   * @var string
   */
  public $imageStyle;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string
   */
  public $subtitle;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setImageAltText($imageAltText)
  {
    $this->imageAltText = $imageAltText;
  }
  /**
   * @return string
   */
  public function getImageAltText()
  {
    return $this->imageAltText;
  }
  /**
   * @param string
   */
  public function setImageStyle($imageStyle)
  {
    $this->imageStyle = $imageStyle;
  }
  /**
   * @return string
   */
  public function getImageStyle()
  {
    return $this->imageStyle;
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
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  /**
   * @return string
   */
  public function getSubtitle()
  {
    return $this->subtitle;
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
class_alias(CardHeader::class, 'Google_Service_CloudSearch_CardHeader');
