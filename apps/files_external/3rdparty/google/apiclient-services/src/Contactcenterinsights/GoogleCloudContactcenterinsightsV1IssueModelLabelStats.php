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

class GoogleCloudContactcenterinsightsV1IssueModelLabelStats extends \Google\Model
{
  /**
   * @var string
   */
  public $analyzedConversationsCount;
  protected $issueStatsType = GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats::class;
  protected $issueStatsDataType = 'map';
  /**
   * @var string
   */
  public $unclassifiedConversationsCount;

  /**
   * @param string
   */
  public function setAnalyzedConversationsCount($analyzedConversationsCount)
  {
    $this->analyzedConversationsCount = $analyzedConversationsCount;
  }
  /**
   * @return string
   */
  public function getAnalyzedConversationsCount()
  {
    return $this->analyzedConversationsCount;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats[]
   */
  public function setIssueStats($issueStats)
  {
    $this->issueStats = $issueStats;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IssueModelLabelStatsIssueStats[]
   */
  public function getIssueStats()
  {
    return $this->issueStats;
  }
  /**
   * @param string
   */
  public function setUnclassifiedConversationsCount($unclassifiedConversationsCount)
  {
    $this->unclassifiedConversationsCount = $unclassifiedConversationsCount;
  }
  /**
   * @return string
   */
  public function getUnclassifiedConversationsCount()
  {
    return $this->unclassifiedConversationsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1IssueModelLabelStats::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1IssueModelLabelStats');
