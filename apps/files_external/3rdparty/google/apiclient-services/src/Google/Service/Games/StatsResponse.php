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

class Google_Service_Games_StatsResponse extends Google_Model
{
  protected $internal_gapi_mappings = array(
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
  );
  public $avgSessionLengthMinutes;
  public $churnProbability;
  public $daysSinceLastPlayed;
  public $highSpenderProbability;
  public $kind;
  public $numPurchases;
  public $numSessions;
  public $numSessionsPercentile;
  public $spendPercentile;
  public $spendProbability;
  public $totalSpendNext28Days;

  public function setAvgSessionLengthMinutes($avgSessionLengthMinutes)
  {
    $this->avgSessionLengthMinutes = $avgSessionLengthMinutes;
  }
  public function getAvgSessionLengthMinutes()
  {
    return $this->avgSessionLengthMinutes;
  }
  public function setChurnProbability($churnProbability)
  {
    $this->churnProbability = $churnProbability;
  }
  public function getChurnProbability()
  {
    return $this->churnProbability;
  }
  public function setDaysSinceLastPlayed($daysSinceLastPlayed)
  {
    $this->daysSinceLastPlayed = $daysSinceLastPlayed;
  }
  public function getDaysSinceLastPlayed()
  {
    return $this->daysSinceLastPlayed;
  }
  public function setHighSpenderProbability($highSpenderProbability)
  {
    $this->highSpenderProbability = $highSpenderProbability;
  }
  public function getHighSpenderProbability()
  {
    return $this->highSpenderProbability;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNumPurchases($numPurchases)
  {
    $this->numPurchases = $numPurchases;
  }
  public function getNumPurchases()
  {
    return $this->numPurchases;
  }
  public function setNumSessions($numSessions)
  {
    $this->numSessions = $numSessions;
  }
  public function getNumSessions()
  {
    return $this->numSessions;
  }
  public function setNumSessionsPercentile($numSessionsPercentile)
  {
    $this->numSessionsPercentile = $numSessionsPercentile;
  }
  public function getNumSessionsPercentile()
  {
    return $this->numSessionsPercentile;
  }
  public function setSpendPercentile($spendPercentile)
  {
    $this->spendPercentile = $spendPercentile;
  }
  public function getSpendPercentile()
  {
    return $this->spendPercentile;
  }
  public function setSpendProbability($spendProbability)
  {
    $this->spendProbability = $spendProbability;
  }
  public function getSpendProbability()
  {
    return $this->spendProbability;
  }
  public function setTotalSpendNext28Days($totalSpendNext28Days)
  {
    $this->totalSpendNext28Days = $totalSpendNext28Days;
  }
  public function getTotalSpendNext28Days()
  {
    return $this->totalSpendNext28Days;
  }
}
