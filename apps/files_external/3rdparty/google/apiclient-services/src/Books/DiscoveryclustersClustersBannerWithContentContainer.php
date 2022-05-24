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

namespace Google\Service\Books;

class DiscoveryclustersClustersBannerWithContentContainer extends \Google\Model
{
  /**
   * @var string
   */
  public $fillColorArgb;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string
   */
  public $maskColorArgb;
  /**
   * @var string
   */
  public $moreButtonText;
  /**
   * @var string
   */
  public $moreButtonUrl;
  /**
   * @var string
   */
  public $textColorArgb;

  /**
   * @param string
   */
  public function setFillColorArgb($fillColorArgb)
  {
    $this->fillColorArgb = $fillColorArgb;
  }
  /**
   * @return string
   */
  public function getFillColorArgb()
  {
    return $this->fillColorArgb;
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
  public function setMaskColorArgb($maskColorArgb)
  {
    $this->maskColorArgb = $maskColorArgb;
  }
  /**
   * @return string
   */
  public function getMaskColorArgb()
  {
    return $this->maskColorArgb;
  }
  /**
   * @param string
   */
  public function setMoreButtonText($moreButtonText)
  {
    $this->moreButtonText = $moreButtonText;
  }
  /**
   * @return string
   */
  public function getMoreButtonText()
  {
    return $this->moreButtonText;
  }
  /**
   * @param string
   */
  public function setMoreButtonUrl($moreButtonUrl)
  {
    $this->moreButtonUrl = $moreButtonUrl;
  }
  /**
   * @return string
   */
  public function getMoreButtonUrl()
  {
    return $this->moreButtonUrl;
  }
  /**
   * @param string
   */
  public function setTextColorArgb($textColorArgb)
  {
    $this->textColorArgb = $textColorArgb;
  }
  /**
   * @return string
   */
  public function getTextColorArgb()
  {
    return $this->textColorArgb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiscoveryclustersClustersBannerWithContentContainer::class, 'Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer');
