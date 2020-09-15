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

class Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1SearchAccountReportsResponse extends Google_Collection
{
  protected $collection_key = 'accountReports';
  protected $accountReportsType = 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AccountReport';
  protected $accountReportsDataType = 'array';
  public $nextPageToken;

  /**
   * @param Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AccountReport
   */
  public function setAccountReports($accountReports)
  {
    $this->accountReports = $accountReports;
  }
  /**
   * @return Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AccountReport
   */
  public function getAccountReports()
  {
    return $this->accountReports;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}
