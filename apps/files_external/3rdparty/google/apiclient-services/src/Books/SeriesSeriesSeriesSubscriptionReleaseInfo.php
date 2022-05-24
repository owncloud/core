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

class SeriesSeriesSeriesSubscriptionReleaseInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $cancelTime;
  protected $currentReleaseInfoType = SeriesSeriesSeriesSubscriptionReleaseInfoCurrentReleaseInfo::class;
  protected $currentReleaseInfoDataType = '';
  protected $nextReleaseInfoType = SeriesSeriesSeriesSubscriptionReleaseInfoNextReleaseInfo::class;
  protected $nextReleaseInfoDataType = '';
  /**
   * @var string
   */
  public $seriesSubscriptionType;

  /**
   * @param string
   */
  public function setCancelTime($cancelTime)
  {
    $this->cancelTime = $cancelTime;
  }
  /**
   * @return string
   */
  public function getCancelTime()
  {
    return $this->cancelTime;
  }
  /**
   * @param SeriesSeriesSeriesSubscriptionReleaseInfoCurrentReleaseInfo
   */
  public function setCurrentReleaseInfo(SeriesSeriesSeriesSubscriptionReleaseInfoCurrentReleaseInfo $currentReleaseInfo)
  {
    $this->currentReleaseInfo = $currentReleaseInfo;
  }
  /**
   * @return SeriesSeriesSeriesSubscriptionReleaseInfoCurrentReleaseInfo
   */
  public function getCurrentReleaseInfo()
  {
    return $this->currentReleaseInfo;
  }
  /**
   * @param SeriesSeriesSeriesSubscriptionReleaseInfoNextReleaseInfo
   */
  public function setNextReleaseInfo(SeriesSeriesSeriesSubscriptionReleaseInfoNextReleaseInfo $nextReleaseInfo)
  {
    $this->nextReleaseInfo = $nextReleaseInfo;
  }
  /**
   * @return SeriesSeriesSeriesSubscriptionReleaseInfoNextReleaseInfo
   */
  public function getNextReleaseInfo()
  {
    return $this->nextReleaseInfo;
  }
  /**
   * @param string
   */
  public function setSeriesSubscriptionType($seriesSubscriptionType)
  {
    $this->seriesSubscriptionType = $seriesSubscriptionType;
  }
  /**
   * @return string
   */
  public function getSeriesSubscriptionType()
  {
    return $this->seriesSubscriptionType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SeriesSeriesSeriesSubscriptionReleaseInfo::class, 'Google_Service_Books_SeriesSeriesSeriesSubscriptionReleaseInfo');
