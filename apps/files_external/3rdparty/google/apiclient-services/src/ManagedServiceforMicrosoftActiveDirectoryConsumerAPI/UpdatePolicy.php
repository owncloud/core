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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI;

class UpdatePolicy extends \Google\Collection
{
  protected $collection_key = 'denyMaintenancePeriods';
  /**
   * @var string
   */
  public $channel;
  protected $denyMaintenancePeriodsType = DenyMaintenancePeriod::class;
  protected $denyMaintenancePeriodsDataType = 'array';
  protected $windowType = MaintenanceWindow::class;
  protected $windowDataType = '';

  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param DenyMaintenancePeriod[]
   */
  public function setDenyMaintenancePeriods($denyMaintenancePeriods)
  {
    $this->denyMaintenancePeriods = $denyMaintenancePeriods;
  }
  /**
   * @return DenyMaintenancePeriod[]
   */
  public function getDenyMaintenancePeriods()
  {
    return $this->denyMaintenancePeriods;
  }
  /**
   * @param MaintenanceWindow
   */
  public function setWindow(MaintenanceWindow $window)
  {
    $this->window = $window;
  }
  /**
   * @return MaintenanceWindow
   */
  public function getWindow()
  {
    return $this->window;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdatePolicy::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_UpdatePolicy');
