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

class Google_Service_CloudFilestore_MaintenanceWindow extends Google_Model
{
  protected $dailyCycleType = 'Google_Service_CloudFilestore_DailyCycle';
  protected $dailyCycleDataType = '';
  protected $weeklyCycleType = 'Google_Service_CloudFilestore_WeeklyCycle';
  protected $weeklyCycleDataType = '';

  /**
   * @param Google_Service_CloudFilestore_DailyCycle
   */
  public function setDailyCycle(Google_Service_CloudFilestore_DailyCycle $dailyCycle)
  {
    $this->dailyCycle = $dailyCycle;
  }
  /**
   * @return Google_Service_CloudFilestore_DailyCycle
   */
  public function getDailyCycle()
  {
    return $this->dailyCycle;
  }
  /**
   * @param Google_Service_CloudFilestore_WeeklyCycle
   */
  public function setWeeklyCycle(Google_Service_CloudFilestore_WeeklyCycle $weeklyCycle)
  {
    $this->weeklyCycle = $weeklyCycle;
  }
  /**
   * @return Google_Service_CloudFilestore_WeeklyCycle
   */
  public function getWeeklyCycle()
  {
    return $this->weeklyCycle;
  }
}
