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

class Google_Service_JobService_ExtendedCompensationInfo extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $annualizedBaseCompensationRangeType = 'Google_Service_JobService_ExtendedCompensationInfoCompensationRange';
  protected $annualizedBaseCompensationRangeDataType = '';
  public $annualizedBaseCompensationUnspecified;
  protected $annualizedTotalCompensationRangeType = 'Google_Service_JobService_ExtendedCompensationInfoCompensationRange';
  protected $annualizedTotalCompensationRangeDataType = '';
  public $annualizedTotalCompensationUnspecified;
  public $currency;
  protected $entriesType = 'Google_Service_JobService_ExtendedCompensationInfoCompensationEntry';
  protected $entriesDataType = 'array';

  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function setAnnualizedBaseCompensationRange(Google_Service_JobService_ExtendedCompensationInfoCompensationRange $annualizedBaseCompensationRange)
  {
    $this->annualizedBaseCompensationRange = $annualizedBaseCompensationRange;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function getAnnualizedBaseCompensationRange()
  {
    return $this->annualizedBaseCompensationRange;
  }
  public function setAnnualizedBaseCompensationUnspecified($annualizedBaseCompensationUnspecified)
  {
    $this->annualizedBaseCompensationUnspecified = $annualizedBaseCompensationUnspecified;
  }
  public function getAnnualizedBaseCompensationUnspecified()
  {
    return $this->annualizedBaseCompensationUnspecified;
  }
  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function setAnnualizedTotalCompensationRange(Google_Service_JobService_ExtendedCompensationInfoCompensationRange $annualizedTotalCompensationRange)
  {
    $this->annualizedTotalCompensationRange = $annualizedTotalCompensationRange;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function getAnnualizedTotalCompensationRange()
  {
    return $this->annualizedTotalCompensationRange;
  }
  public function setAnnualizedTotalCompensationUnspecified($annualizedTotalCompensationUnspecified)
  {
    $this->annualizedTotalCompensationUnspecified = $annualizedTotalCompensationUnspecified;
  }
  public function getAnnualizedTotalCompensationUnspecified()
  {
    return $this->annualizedTotalCompensationUnspecified;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoCompensationEntry
   */
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoCompensationEntry
   */
  public function getEntries()
  {
    return $this->entries;
  }
}
