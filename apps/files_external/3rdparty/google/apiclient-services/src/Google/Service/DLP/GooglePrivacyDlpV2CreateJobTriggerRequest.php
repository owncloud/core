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

class Google_Service_DLP_GooglePrivacyDlpV2CreateJobTriggerRequest extends Google_Model
{
  protected $jobTriggerType = 'Google_Service_DLP_GooglePrivacyDlpV2JobTrigger';
  protected $jobTriggerDataType = '';
  public $locationId;
  public $triggerId;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2JobTrigger
   */
  public function setJobTrigger(Google_Service_DLP_GooglePrivacyDlpV2JobTrigger $jobTrigger)
  {
    $this->jobTrigger = $jobTrigger;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2JobTrigger
   */
  public function getJobTrigger()
  {
    return $this->jobTrigger;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}
