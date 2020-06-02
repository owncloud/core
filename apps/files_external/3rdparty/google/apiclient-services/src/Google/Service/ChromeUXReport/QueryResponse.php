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

class Google_Service_ChromeUXReport_QueryResponse extends Google_Model
{
  protected $recordType = 'Google_Service_ChromeUXReport_Record';
  protected $recordDataType = '';
  protected $urlNormalizationDetailsType = 'Google_Service_ChromeUXReport_UrlNormalization';
  protected $urlNormalizationDetailsDataType = '';

  /**
   * @param Google_Service_ChromeUXReport_Record
   */
  public function setRecord(Google_Service_ChromeUXReport_Record $record)
  {
    $this->record = $record;
  }
  /**
   * @return Google_Service_ChromeUXReport_Record
   */
  public function getRecord()
  {
    return $this->record;
  }
  /**
   * @param Google_Service_ChromeUXReport_UrlNormalization
   */
  public function setUrlNormalizationDetails(Google_Service_ChromeUXReport_UrlNormalization $urlNormalizationDetails)
  {
    $this->urlNormalizationDetails = $urlNormalizationDetails;
  }
  /**
   * @return Google_Service_ChromeUXReport_UrlNormalization
   */
  public function getUrlNormalizationDetails()
  {
    return $this->urlNormalizationDetails;
  }
}
