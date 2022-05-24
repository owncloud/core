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

namespace Google\Service\Script;

class Metrics extends \Google\Collection
{
  protected $collection_key = 'totalExecutions';
  protected $activeUsersType = MetricsValue::class;
  protected $activeUsersDataType = 'array';
  protected $failedExecutionsType = MetricsValue::class;
  protected $failedExecutionsDataType = 'array';
  protected $totalExecutionsType = MetricsValue::class;
  protected $totalExecutionsDataType = 'array';

  /**
   * @param MetricsValue[]
   */
  public function setActiveUsers($activeUsers)
  {
    $this->activeUsers = $activeUsers;
  }
  /**
   * @return MetricsValue[]
   */
  public function getActiveUsers()
  {
    return $this->activeUsers;
  }
  /**
   * @param MetricsValue[]
   */
  public function setFailedExecutions($failedExecutions)
  {
    $this->failedExecutions = $failedExecutions;
  }
  /**
   * @return MetricsValue[]
   */
  public function getFailedExecutions()
  {
    return $this->failedExecutions;
  }
  /**
   * @param MetricsValue[]
   */
  public function setTotalExecutions($totalExecutions)
  {
    $this->totalExecutions = $totalExecutions;
  }
  /**
   * @return MetricsValue[]
   */
  public function getTotalExecutions()
  {
    return $this->totalExecutions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metrics::class, 'Google_Service_Script_Metrics');
