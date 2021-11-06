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
  public $averageDuration;
  public $averageTurnCount;
  public $conversationCount;
  protected $conversationCountTimeSeriesType = GoogleCloudContactcenterinsightsV1CalculateStatsResponseTimeSeries::class;
  protected $conversationCountTimeSeriesDataType = '';
  public $customHighlighterMatches;
  public $issueMatches;
  public $smartHighlighterMatches;

  public function setAverageDuration($averageDuration)
  {
    $this->averageDuration = $averageDuration;
  }
  public function getAverageDuration()
  {
    return $this->averageDuration;
  }
  public function setAverageTurnCount($averageTurnCount)
  {
    $this->averageTurnCount = $averageTurnCount;
  }
  public function getAverageTurnCount()
  {
    return $this->averageTurnCount;
  }
  public function setConversationCount($conversationCount)
  {
    $this->conversationCount = $conversationCount;
  }
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
  public function setCustomHighlighterMatches($customHighlighterMatches)
  {
    $this->customHighlighterMatches = $customHighlighterMatches;
  }
  public function getCustomHighlighterMatches()
  {
    return $this->customHighlighterMatches;
  }
  public function setIssueMatches($issueMatches)
  {
    $this->issueMatches = $issueMatches;
  }
  public function getIssueMatches()
  {
    return $this->issueMatches;
  }
  public function setSmartHighlighterMatches($smartHighlighterMatches)
  {
    $this->smartHighlighterMatches = $smartHighlighterMatches;
  }
  public function getSmartHighlighterMatches()
  {
    return $this->smartHighlighterMatches;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1CalculateStatsResponse::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1CalculateStatsResponse');
