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

namespace Google\Service\AnalyticsData;

class QuotaStatus extends \Google\Model
{
  /**
   * @var int
   */
  public $consumed;
  /**
   * @var int
   */
  public $remaining;

  /**
   * @param int
   */
  public function setConsumed($consumed)
  {
    $this->consumed = $consumed;
  }
  /**
   * @return int
   */
  public function getConsumed()
  {
    return $this->consumed;
  }
  /**
   * @param int
   */
  public function setRemaining($remaining)
  {
    $this->remaining = $remaining;
  }
  /**
   * @return int
   */
  public function getRemaining()
  {
    return $this->remaining;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuotaStatus::class, 'Google_Service_AnalyticsData_QuotaStatus');
