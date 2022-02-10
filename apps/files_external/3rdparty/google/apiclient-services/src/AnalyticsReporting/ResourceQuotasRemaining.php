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

namespace Google\Service\AnalyticsReporting;

class ResourceQuotasRemaining extends \Google\Model
{
  /**
   * @var int
   */
  public $dailyQuotaTokensRemaining;
  /**
   * @var int
   */
  public $hourlyQuotaTokensRemaining;

  /**
   * @param int
   */
  public function setDailyQuotaTokensRemaining($dailyQuotaTokensRemaining)
  {
    $this->dailyQuotaTokensRemaining = $dailyQuotaTokensRemaining;
  }
  /**
   * @return int
   */
  public function getDailyQuotaTokensRemaining()
  {
    return $this->dailyQuotaTokensRemaining;
  }
  /**
   * @param int
   */
  public function setHourlyQuotaTokensRemaining($hourlyQuotaTokensRemaining)
  {
    $this->hourlyQuotaTokensRemaining = $hourlyQuotaTokensRemaining;
  }
  /**
   * @return int
   */
  public function getHourlyQuotaTokensRemaining()
  {
    return $this->hourlyQuotaTokensRemaining;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceQuotasRemaining::class, 'Google_Service_AnalyticsReporting_ResourceQuotasRemaining');
