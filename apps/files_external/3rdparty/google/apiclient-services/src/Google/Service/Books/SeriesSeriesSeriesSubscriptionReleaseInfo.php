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

class Google_Service_Books_SeriesSeriesSeriesSubscriptionReleaseInfo extends Google_Model
{
  public $cancellationTimestampUs;
  protected $currentReleaseInfoType = 'Google_Service_Books_BooksSubscriptionReleaseInfo';
  protected $currentReleaseInfoDataType = '';
  protected $nextReleaseInfoType = 'Google_Service_Books_BooksSubscriptionReleaseInfo';
  protected $nextReleaseInfoDataType = '';
  public $seriesSubscriptionType;

  public function setCancellationTimestampUs($cancellationTimestampUs)
  {
    $this->cancellationTimestampUs = $cancellationTimestampUs;
  }
  public function getCancellationTimestampUs()
  {
    return $this->cancellationTimestampUs;
  }
  /**
   * @param Google_Service_Books_BooksSubscriptionReleaseInfo
   */
  public function setCurrentReleaseInfo(Google_Service_Books_BooksSubscriptionReleaseInfo $currentReleaseInfo)
  {
    $this->currentReleaseInfo = $currentReleaseInfo;
  }
  /**
   * @return Google_Service_Books_BooksSubscriptionReleaseInfo
   */
  public function getCurrentReleaseInfo()
  {
    return $this->currentReleaseInfo;
  }
  /**
   * @param Google_Service_Books_BooksSubscriptionReleaseInfo
   */
  public function setNextReleaseInfo(Google_Service_Books_BooksSubscriptionReleaseInfo $nextReleaseInfo)
  {
    $this->nextReleaseInfo = $nextReleaseInfo;
  }
  /**
   * @return Google_Service_Books_BooksSubscriptionReleaseInfo
   */
  public function getNextReleaseInfo()
  {
    return $this->nextReleaseInfo;
  }
  public function setSeriesSubscriptionType($seriesSubscriptionType)
  {
    $this->seriesSubscriptionType = $seriesSubscriptionType;
  }
  public function getSeriesSubscriptionType()
  {
    return $this->seriesSubscriptionType;
  }
}
