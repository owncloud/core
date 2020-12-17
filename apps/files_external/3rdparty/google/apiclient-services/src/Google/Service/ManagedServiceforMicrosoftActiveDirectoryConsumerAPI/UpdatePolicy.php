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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_UpdatePolicy extends Google_Collection
{
  protected $collection_key = 'denyMaintenancePeriods';
  public $channel;
  protected $denyMaintenancePeriodsType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DenyMaintenancePeriod';
  protected $denyMaintenancePeriodsDataType = 'array';
  protected $windowType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_MaintenanceWindow';
  protected $windowDataType = '';

  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DenyMaintenancePeriod[]
   */
  public function setDenyMaintenancePeriods($denyMaintenancePeriods)
  {
    $this->denyMaintenancePeriods = $denyMaintenancePeriods;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DenyMaintenancePeriod[]
   */
  public function getDenyMaintenancePeriods()
  {
    return $this->denyMaintenancePeriods;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_MaintenanceWindow
   */
  public function setWindow(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_MaintenanceWindow $window)
  {
    $this->window = $window;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_MaintenanceWindow
   */
  public function getWindow()
  {
    return $this->window;
  }
}
