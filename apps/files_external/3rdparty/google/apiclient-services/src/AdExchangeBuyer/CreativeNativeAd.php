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

namespace Google\Service\AdExchangeBuyer;

class CreativeNativeAd extends \Google\Collection
{
  protected $collection_key = 'impressionTrackingUrl';
  public $advertiser;
  protected $appIconType = CreativeNativeAdAppIcon::class;
  protected $appIconDataType = '';
  public $body;
  public $callToAction;
  public $clickLinkUrl;
  public $clickTrackingUrl;
  public $headline;
  protected $imageType = CreativeNativeAdImage::class;
  protected $imageDataType = '';
  public $impressionTrackingUrl;
  protected $logoType = CreativeNativeAdLogo::class;
  protected $logoDataType = '';
  public $price;
  public $starRating;
  public $videoURL;

  public function setAdvertiser($advertiser)
  {
    $this->advertiser = $advertiser;
  }
  public function getAdvertiser()
  {
    return $this->advertiser;
  }
  /**
   * @param CreativeNativeAdAppIcon
   */
  public function setAppIcon(CreativeNativeAdAppIcon $appIcon)
  {
    $this->appIcon = $appIcon;
  }
  /**
   * @return CreativeNativeAdAppIcon
   */
  public function getAppIcon()
  {
    return $this->appIcon;
  }
  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setCallToAction($callToAction)
  {
    $this->callToAction = $callToAction;
  }
  public function getCallToAction()
  {
    return $this->callToAction;
  }
  public function setClickLinkUrl($clickLinkUrl)
  {
    $this->clickLinkUrl = $clickLinkUrl;
  }
  public function getClickLinkUrl()
  {
    return $this->clickLinkUrl;
  }
  public function setClickTrackingUrl($clickTrackingUrl)
  {
    $this->clickTrackingUrl = $clickTrackingUrl;
  }
  public function getClickTrackingUrl()
  {
    return $this->clickTrackingUrl;
  }
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param CreativeNativeAdImage
   */
  public function setImage(CreativeNativeAdImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return CreativeNativeAdImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setImpressionTrackingUrl($impressionTrackingUrl)
  {
    $this->impressionTrackingUrl = $impressionTrackingUrl;
  }
  public function getImpressionTrackingUrl()
  {
    return $this->impressionTrackingUrl;
  }
  /**
   * @param CreativeNativeAdLogo
   */
  public function setLogo(CreativeNativeAdLogo $logo)
  {
    $this->logo = $logo;
  }
  /**
   * @return CreativeNativeAdLogo
   */
  public function getLogo()
  {
    return $this->logo;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setStarRating($starRating)
  {
    $this->starRating = $starRating;
  }
  public function getStarRating()
  {
    return $this->starRating;
  }
  public function setVideoURL($videoURL)
  {
    $this->videoURL = $videoURL;
  }
  public function getVideoURL()
  {
    return $this->videoURL;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeNativeAd::class, 'Google_Service_AdExchangeBuyer_CreativeNativeAd');
