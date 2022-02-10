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

class SeriesSeries extends \Google\Model
{
  /**
   * @var string
   */
  public $bannerImageUrl;
  /**
   * @var bool
   */
  public $eligibleForSubscription;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var bool
   */
  public $isComplete;
  /**
   * @var string
   */
  public $seriesFormatType;
  /**
   * @var string
   */
  public $seriesId;
  protected $seriesSubscriptionReleaseInfoType = SeriesSeriesSeriesSubscriptionReleaseInfo::class;
  protected $seriesSubscriptionReleaseInfoDataType = '';
  /**
   * @var string
   */
  public $seriesType;
  /**
   * @var string
   */
  public $subscriptionId;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setBannerImageUrl($bannerImageUrl)
  {
    $this->bannerImageUrl = $bannerImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerImageUrl()
  {
    return $this->bannerImageUrl;
  }
  /**
   * @param bool
   */
  public function setEligibleForSubscription($eligibleForSubscription)
  {
    $this->eligibleForSubscription = $eligibleForSubscription;
  }
  /**
   * @return bool
   */
  public function getEligibleForSubscription()
  {
    return $this->eligibleForSubscription;
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
   * @param bool
   */
  public function setIsComplete($isComplete)
  {
    $this->isComplete = $isComplete;
  }
  /**
   * @return bool
   */
  public function getIsComplete()
  {
    return $this->isComplete;
  }
  /**
   * @param string
   */
  public function setSeriesFormatType($seriesFormatType)
  {
    $this->seriesFormatType = $seriesFormatType;
  }
  /**
   * @return string
   */
  public function getSeriesFormatType()
  {
    return $this->seriesFormatType;
  }
  /**
   * @param string
   */
  public function setSeriesId($seriesId)
  {
    $this->seriesId = $seriesId;
  }
  /**
   * @return string
   */
  public function getSeriesId()
  {
    return $this->seriesId;
  }
  /**
   * @param SeriesSeriesSeriesSubscriptionReleaseInfo
   */
  public function setSeriesSubscriptionReleaseInfo(SeriesSeriesSeriesSubscriptionReleaseInfo $seriesSubscriptionReleaseInfo)
  {
    $this->seriesSubscriptionReleaseInfo = $seriesSubscriptionReleaseInfo;
  }
  /**
   * @return SeriesSeriesSeriesSubscriptionReleaseInfo
   */
  public function getSeriesSubscriptionReleaseInfo()
  {
    return $this->seriesSubscriptionReleaseInfo;
  }
  /**
   * @param string
   */
  public function setSeriesType($seriesType)
  {
    $this->seriesType = $seriesType;
  }
  /**
   * @return string
   */
  public function getSeriesType()
  {
    return $this->seriesType;
  }
  /**
   * @param string
   */
  public function setSubscriptionId($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }
  /**
   * @return string
   */
  public function getSubscriptionId()
  {
    return $this->subscriptionId;
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
class_alias(SeriesSeries::class, 'Google_Service_Books_SeriesSeries');
