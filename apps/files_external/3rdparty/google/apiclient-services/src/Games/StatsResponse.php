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

namespace Google\Service\Games;

class StatsResponse extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "avgSessionLengthMinutes" => "avg_session_length_minutes",
        "churnProbability" => "churn_probability",
        "daysSinceLastPlayed" => "days_since_last_played",
        "highSpenderProbability" => "high_spender_probability",
        "numPurchases" => "num_purchases",
        "numSessions" => "num_sessions",
        "numSessionsPercentile" => "num_sessions_percentile",
        "spendPercentile" => "spend_percentile",
        "spendProbability" => "spend_probability",
        "totalSpendNext28Days" => "total_spend_next_28_days",
  ];
  /**
   * @var float
   */
  public $avgSessionLengthMinutes;
  /**
   * @var float
   */
  public $churnProbability;
  /**
   * @var int
   */
  public $daysSinceLastPlayed;
  /**
   * @var float
   */
  public $highSpenderProbability;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $numPurchases;
  /**
   * @var int
   */
  public $numSessions;
  /**
   * @var float
   */
  public $numSessionsPercentile;
  /**
   * @var float
   */
  public $spendPercentile;
  /**
   * @var float
   */
  public $spendProbability;
  /**
   * @var float
   */
  public $totalSpendNext28Days;

  /**
   * @param float
   */
  public function setAvgSessionLengthMinutes($avgSessionLengthMinutes)
  {
    $this->avgSessionLengthMinutes = $avgSessionLengthMinutes;
  }
  /**
   * @return float
   */
  public function getAvgSessionLengthMinutes()
  {
    return $this->avgSessionLengthMinutes;
  }
  /**
   * @param float
   */
  public function setChurnProbability($churnProbability)
  {
    $this->churnProbability = $churnProbability;
  }
  /**
   * @return float
   */
  public function getChurnProbability()
  {
    return $this->churnProbability;
  }
  /**
   * @param int
   */
  public function setDaysSinceLastPlayed($daysSinceLastPlayed)
  {
    $this->daysSinceLastPlayed = $daysSinceLastPlayed;
  }
  /**
   * @return int
   */
  public function getDaysSinceLastPlayed()
  {
    return $this->daysSinceLastPlayed;
  }
  /**
   * @param float
   */
  public function setHighSpenderProbability($highSpenderProbability)
  {
    $this->highSpenderProbability = $highSpenderProbability;
  }
  /**
   * @return float
   */
  public function getHighSpenderProbability()
  {
    return $this->highSpenderProbability;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setNumPurchases($numPurchases)
  {
    $this->numPurchases = $numPurchases;
  }
  /**
   * @return int
   */
  public function getNumPurchases()
  {
    return $this->numPurchases;
  }
  /**
   * @param int
   */
  public function setNumSessions($numSessions)
  {
    $this->numSessions = $numSessions;
  }
  /**
   * @return int
   */
  public function getNumSessions()
  {
    return $this->numSessions;
  }
  /**
   * @param float
   */
  public function setNumSessionsPercentile($numSessionsPercentile)
  {
    $this->numSessionsPercentile = $numSessionsPercentile;
  }
  /**
   * @return float
   */
  public function getNumSessionsPercentile()
  {
    return $this->numSessionsPercentile;
  }
  /**
   * @param float
   */
  public function setSpendPercentile($spendPercentile)
  {
    $this->spendPercentile = $spendPercentile;
  }
  /**
   * @return float
   */
  public function getSpendPercentile()
  {
    return $this->spendPercentile;
  }
  /**
   * @param float
   */
  public function setSpendProbability($spendProbability)
  {
    $this->spendProbability = $spendProbability;
  }
  /**
   * @return float
   */
  public function getSpendProbability()
  {
    return $this->spendProbability;
  }
  /**
   * @param float
   */
  public function setTotalSpendNext28Days($totalSpendNext28Days)
  {
    $this->totalSpendNext28Days = $totalSpendNext28Days;
  }
  /**
   * @return float
   */
  public function getTotalSpendNext28Days()
  {
    return $this->totalSpendNext28Days;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StatsResponse::class, 'Google_Service_Games_StatsResponse');
