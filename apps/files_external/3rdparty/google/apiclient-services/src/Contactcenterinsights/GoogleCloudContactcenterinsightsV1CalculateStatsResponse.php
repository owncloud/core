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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1CalculateStatsResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $averageDuration;
  /**
   * @var int
   */
  public $averageTurnCount;
  /**
   * @var int
   */
  public $conversationCount;
  protected $conversationCountTimeSeriesType = GoogleCloudContactcenterinsightsV1CalculateStatsResponseTimeSeries::class;
  protected $conversationCountTimeSeriesDataType = '';
  /**
   * @var int[]
   */
  public $customHighlighterMatches;
  /**
   * @var int[]
   */
  public $issueMatches;
  protected $issueMatchesStatsType = GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats::class;
  protected $issueMatchesStatsDataType = 'map';
  /**
   * @var int[]
   */
  public $smartHighlighterMatches;

  /**
   * @param string
   */
  public function setAverageDuration($averageDuration)
  {
    $this->averageDuration = $averageDuration;
  }
  /**
   * @return string
   */
  public function getAverageDuration()
  {
    return $this->averageDuration;
  }
  /**
   * @param int
   */
  public function setAverageTurnCount($averageTurnCount)
  {
    $this->averageTurnCount = $averageTurnCount;
  }
  /**
   * @return int
   */
  public function getAverageTurnCount()
  {
    return $this->averageTurnCount;
  }
  /**
   * @param int
   */
  public function setConversationCount($conversationCount)
  {
    $this->conversationCount = $conversationCount;
  }
  /**
   * @return int
   */
  public function getConversationCount()
  {
    return $this->conversationCount;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1CalculateStatsResponseTimeSeries
   */
  public function setConversationCountTimeSeries(GoogleCloudContactcenterinsightsV1CalculateStatsResponseTimeSeries $conversationCountTimeSeries)
  {
    $this->conversationCountTimeSeries = $conversationCountTimeSeries;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1CalculateStatsResponseTimeSeries
   */
  public function getConversationCountTimeSeries()
  {
    return $this->conversationCountTimeSeries;
  }
  /**
   * @param int[]
   */
  public function setCustomHighlighterMatches($customHighlighterMatches)
  {
    $this->customHighlighterMatches = $customHighlighterMatches;
  }
  /**
   * @return int[]
   */
  public function getCustomHighlighterMatches()
  {
    return $this->customHighlighterMatches;
  }
  /**
   * @param int[]
   */
  public function setIssueMatches($issueMatches)
  {
    $this->issueMatches = $issueMatches;
  }
  /**
   * @return int[]
   */
  public function getIssueMatches()
  {
    return $this->issueMatches;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats[]
   */
  public function setIssueMatchesStats($issueMatchesStats)
  {
    $this->issueMatchesStats = $issueMatchesStats;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats[]
   */
  public function getIssueMatchesStats()
  {
    return $this->issueMatchesStats;
  }
  /**
   * @param int[]
   */
  public function setSmartHighlighterMatches($smartHighlighterMatches)
  {
    $this->smartHighlighterMatches = $smartHighlighterMatches;
  }
  /**
   * @return int[]
   */
  public function getSmartHighlighterMatches()
  {
    return $this->smartHighlighterMatches;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1CalculateStatsResponse::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1CalculateStatsResponse');
