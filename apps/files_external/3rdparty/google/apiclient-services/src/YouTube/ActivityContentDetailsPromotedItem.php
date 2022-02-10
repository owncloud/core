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

namespace Google\Service\YouTube;

class ActivityContentDetailsPromotedItem extends \Google\Collection
{
  protected $collection_key = 'impressionUrl';
  /**
   * @var string
   */
  public $adTag;
  /**
   * @var string
   */
  public $clickTrackingUrl;
  /**
   * @var string
   */
  public $creativeViewUrl;
  /**
   * @var string
   */
  public $ctaType;
  /**
   * @var string
   */
  public $customCtaButtonText;
  /**
   * @var string
   */
  public $descriptionText;
  /**
   * @var string
   */
  public $destinationUrl;
  /**
   * @var string[]
   */
  public $forecastingUrl;
  /**
   * @var string[]
   */
  public $impressionUrl;
  /**
   * @var string
   */
  public $videoId;

  /**
   * @param string
   */
  public function setAdTag($adTag)
  {
    $this->adTag = $adTag;
  }
  /**
   * @return string
   */
  public function getAdTag()
  {
    return $this->adTag;
  }
  /**
   * @param string
   */
  public function setClickTrackingUrl($clickTrackingUrl)
  {
    $this->clickTrackingUrl = $clickTrackingUrl;
  }
  /**
   * @return string
   */
  public function getClickTrackingUrl()
  {
    return $this->clickTrackingUrl;
  }
  /**
   * @param string
   */
  public function setCreativeViewUrl($creativeViewUrl)
  {
    $this->creativeViewUrl = $creativeViewUrl;
  }
  /**
   * @return string
   */
  public function getCreativeViewUrl()
  {
    return $this->creativeViewUrl;
  }
  /**
   * @param string
   */
  public function setCtaType($ctaType)
  {
    $this->ctaType = $ctaType;
  }
  /**
   * @return string
   */
  public function getCtaType()
  {
    return $this->ctaType;
  }
  /**
   * @param string
   */
  public function setCustomCtaButtonText($customCtaButtonText)
  {
    $this->customCtaButtonText = $customCtaButtonText;
  }
  /**
   * @return string
   */
  public function getCustomCtaButtonText()
  {
    return $this->customCtaButtonText;
  }
  /**
   * @param string
   */
  public function setDescriptionText($descriptionText)
  {
    $this->descriptionText = $descriptionText;
  }
  /**
   * @return string
   */
  public function getDescriptionText()
  {
    return $this->descriptionText;
  }
  /**
   * @param string
   */
  public function setDestinationUrl($destinationUrl)
  {
    $this->destinationUrl = $destinationUrl;
  }
  /**
   * @return string
   */
  public function getDestinationUrl()
  {
    return $this->destinationUrl;
  }
  /**
   * @param string[]
   */
  public function setForecastingUrl($forecastingUrl)
  {
    $this->forecastingUrl = $forecastingUrl;
  }
  /**
   * @return string[]
   */
  public function getForecastingUrl()
  {
    return $this->forecastingUrl;
  }
  /**
   * @param string[]
   */
  public function setImpressionUrl($impressionUrl)
  {
    $this->impressionUrl = $impressionUrl;
  }
  /**
   * @return string[]
   */
  public function getImpressionUrl()
  {
    return $this->impressionUrl;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActivityContentDetailsPromotedItem::class, 'Google_Service_YouTube_ActivityContentDetailsPromotedItem');
