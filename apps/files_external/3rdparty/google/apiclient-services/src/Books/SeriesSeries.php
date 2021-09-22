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
  public $bannerImageUrl;
  public $eligibleForSubscription;
  public $imageUrl;
  public $isComplete;
  public $seriesFormatType;
  public $seriesId;
  protected $seriesSubscriptionReleaseInfoType = SeriesSeriesSeriesSubscriptionReleaseInfo::class;
  protected $seriesSubscriptionReleaseInfoDataType = '';
  public $seriesType;
  public $subscriptionId;
  public $title;

  public function setBannerImageUrl($bannerImageUrl)
  {
    $this->bannerImageUrl = $bannerImageUrl;
  }
  public function getBannerImageUrl()
  {
    return $this->bannerImageUrl;
  }
  public function setEligibleForSubscription($eligibleForSubscription)
  {
    $this->eligibleForSubscription = $eligibleForSubscription;
  }
  public function getEligibleForSubscription()
  {
    return $this->eligibleForSubscription;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setIsComplete($isComplete)
  {
    $this->isComplete = $isComplete;
  }
  public function getIsComplete()
  {
    return $this->isComplete;
  }
  public function setSeriesFormatType($seriesFormatType)
  {
    $this->seriesFormatType = $seriesFormatType;
  }
  public function getSeriesFormatType()
  {
    return $this->seriesFormatType;
  }
  public function setSeriesId($seriesId)
  {
    $this->seriesId = $seriesId;
  }
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
  public function setSeriesType($seriesType)
  {
    $this->seriesType = $seriesType;
  }
  public function getSeriesType()
  {
    return $this->seriesType;
  }
  public function setSubscriptionId($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }
  public function getSubscriptionId()
  {
    return $this->subscriptionId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SeriesSeries::class, 'Google_Service_Books_SeriesSeries');
