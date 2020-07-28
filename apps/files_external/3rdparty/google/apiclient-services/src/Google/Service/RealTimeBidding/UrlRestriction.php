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

class Google_Service_RealTimeBidding_UrlRestriction extends Google_Model
{
  protected $endDateType = 'Google_Service_RealTimeBidding_Date';
  protected $endDateDataType = '';
  public $restrictionType;
  protected $startDateType = 'Google_Service_RealTimeBidding_Date';
  protected $startDateDataType = '';
  public $url;

  /**
   * @param Google_Service_RealTimeBidding_Date
   */
  public function setEndDate(Google_Service_RealTimeBidding_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Google_Service_RealTimeBidding_Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setRestrictionType($restrictionType)
  {
    $this->restrictionType = $restrictionType;
  }
  public function getRestrictionType()
  {
    return $this->restrictionType;
  }
  /**
   * @param Google_Service_RealTimeBidding_Date
   */
  public function setStartDate(Google_Service_RealTimeBidding_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Google_Service_RealTimeBidding_Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
