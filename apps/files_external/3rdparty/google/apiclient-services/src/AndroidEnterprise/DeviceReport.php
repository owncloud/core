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

namespace Google\Service\AndroidEnterprise;

class DeviceReport extends \Google\Collection
{
  protected $collection_key = 'appState';
  protected $appStateType = AppState::class;
  protected $appStateDataType = 'array';
  public $lastUpdatedTimestampMillis;

  /**
   * @param AppState[]
   */
  public function setAppState($appState)
  {
    $this->appState = $appState;
  }
  /**
   * @return AppState[]
   */
  public function getAppState()
  {
    return $this->appState;
  }
  public function setLastUpdatedTimestampMillis($lastUpdatedTimestampMillis)
  {
    $this->lastUpdatedTimestampMillis = $lastUpdatedTimestampMillis;
  }
  public function getLastUpdatedTimestampMillis()
  {
    return $this->lastUpdatedTimestampMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceReport::class, 'Google_Service_AndroidEnterprise_DeviceReport');
