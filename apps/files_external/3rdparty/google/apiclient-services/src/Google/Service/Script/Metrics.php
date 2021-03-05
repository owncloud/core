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

class Google_Service_Script_Metrics extends Google_Collection
{
  protected $collection_key = 'totalExecutions';
  protected $activeUsersType = 'Google_Service_Script_MetricsValue';
  protected $activeUsersDataType = 'array';
  protected $failedExecutionsType = 'Google_Service_Script_MetricsValue';
  protected $failedExecutionsDataType = 'array';
  protected $totalExecutionsType = 'Google_Service_Script_MetricsValue';
  protected $totalExecutionsDataType = 'array';

  /**
   * @param Google_Service_Script_MetricsValue[]
   */
  public function setActiveUsers($activeUsers)
  {
    $this->activeUsers = $activeUsers;
  }
  /**
   * @return Google_Service_Script_MetricsValue[]
   */
  public function getActiveUsers()
  {
    return $this->activeUsers;
  }
  /**
   * @param Google_Service_Script_MetricsValue[]
   */
  public function setFailedExecutions($failedExecutions)
  {
    $this->failedExecutions = $failedExecutions;
  }
  /**
   * @return Google_Service_Script_MetricsValue[]
   */
  public function getFailedExecutions()
  {
    return $this->failedExecutions;
  }
  /**
   * @param Google_Service_Script_MetricsValue[]
   */
  public function setTotalExecutions($totalExecutions)
  {
    $this->totalExecutions = $totalExecutions;
  }
  /**
   * @return Google_Service_Script_MetricsValue[]
   */
  public function getTotalExecutions()
  {
    return $this->totalExecutions;
  }
}
