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

class Google_Service_DLP_GooglePrivacyDlpV2Trigger extends Google_Model
{
  protected $manualType = 'Google_Service_DLP_GooglePrivacyDlpV2Manual';
  protected $manualDataType = '';
  protected $scheduleType = 'Google_Service_DLP_GooglePrivacyDlpV2Schedule';
  protected $scheduleDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Manual
   */
  public function setManual(Google_Service_DLP_GooglePrivacyDlpV2Manual $manual)
  {
    $this->manual = $manual;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Manual
   */
  public function getManual()
  {
    return $this->manual;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Schedule
   */
  public function setSchedule(Google_Service_DLP_GooglePrivacyDlpV2Schedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Schedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
}
