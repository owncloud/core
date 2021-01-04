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

class Google_Service_RealTimeBidding_DownloadSizeEvidence extends Google_Collection
{
  protected $collection_key = 'topUrlDownloadSizeBreakdowns';
  protected $topUrlDownloadSizeBreakdownsType = 'Google_Service_RealTimeBidding_UrlDownloadSize';
  protected $topUrlDownloadSizeBreakdownsDataType = 'array';
  public $totalDownloadSizeKb;

  /**
   * @param Google_Service_RealTimeBidding_UrlDownloadSize[]
   */
  public function setTopUrlDownloadSizeBreakdowns($topUrlDownloadSizeBreakdowns)
  {
    $this->topUrlDownloadSizeBreakdowns = $topUrlDownloadSizeBreakdowns;
  }
  /**
   * @return Google_Service_RealTimeBidding_UrlDownloadSize[]
   */
  public function getTopUrlDownloadSizeBreakdowns()
  {
    return $this->topUrlDownloadSizeBreakdowns;
  }
  public function setTotalDownloadSizeKb($totalDownloadSizeKb)
  {
    $this->totalDownloadSizeKb = $totalDownloadSizeKb;
  }
  public function getTotalDownloadSizeKb()
  {
    return $this->totalDownloadSizeKb;
  }
}
