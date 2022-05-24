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

namespace Google\Service\AdExchangeBuyerII;

class NativeContent extends \Google\Model
{
  /**
   * @var string
   */
  public $advertiserName;
  protected $appIconType = Image::class;
  protected $appIconDataType = '';
  /**
   * @var string
   */
  public $body;
  /**
   * @var string
   */
  public $callToAction;
  /**
   * @var string
   */
  public $clickLinkUrl;
  /**
   * @var string
   */
  public $clickTrackingUrl;
  /**
   * @var string
   */
  public $headline;
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $logoType = Image::class;
  protected $logoDataType = '';
  /**
   * @var string
   */
  public $priceDisplayText;
  public $starRating;
  /**
   * @var string
   */
  public $storeUrl;
  /**
   * @var string
   */
  public $videoUrl;

  /**
   * @param string
   */
  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }
  /**
   * @return string
   */
  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }
  /**
   * @param Image
   */
  public function setAppIcon(Image $appIcon)
  {
    $this->appIcon = $appIcon;
  }
  /**
   * @return Image
   */
  public function getAppIcon()
  {
    return $this->appIcon;
  }
  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string
   */
  public function setCallToAction($callToAction)
  {
    $this->callToAction = $callToAction;
  }
  /**
   * @return string
   */
  public function getCallToAction()
  {
    return $this->callToAction;
  }
  /**
   * @param string
   */
  public function setClickLinkUrl($clickLinkUrl)
  {
    $this->clickLinkUrl = $clickLinkUrl;
  }
  /**
   * @return string
   */
  public function getClickLinkUrl()
  {
    return $this->clickLinkUrl;
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
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  /**
   * @return string
   */
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Image
   */
  public function setLogo(Image $logo)
  {
    $this->logo = $logo;
  }
  /**
   * @return Image
   */
  public function getLogo()
  {
    return $this->logo;
  }
  /**
   * @param string
   */
  public function setPriceDisplayText($priceDisplayText)
  {
    $this->priceDisplayText = $priceDisplayText;
  }
  /**
   * @return string
   */
  public function getPriceDisplayText()
  {
    return $this->priceDisplayText;
  }
  public function setStarRating($starRating)
  {
    $this->starRating = $starRating;
  }
  public function getStarRating()
  {
    return $this->starRating;
  }
  /**
   * @param string
   */
  public function setStoreUrl($storeUrl)
  {
    $this->storeUrl = $storeUrl;
  }
  /**
   * @return string
   */
  public function getStoreUrl()
  {
    return $this->storeUrl;
  }
  /**
   * @param string
   */
  public function setVideoUrl($videoUrl)
  {
    $this->videoUrl = $videoUrl;
  }
  /**
   * @return string
   */
  public function getVideoUrl()
  {
    return $this->videoUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NativeContent::class, 'Google_Service_AdExchangeBuyerII_NativeContent');
