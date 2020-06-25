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

class Google_Service_ToolResults_NonSdkApiInsight extends Google_Collection
{
  protected $collection_key = 'exampleTraceMessages';
  public $exampleTraceMessages;
  public $matcherId;
  protected $pendingGoogleUpdateInsightType = 'Google_Service_ToolResults_PendingGoogleUpdateInsight';
  protected $pendingGoogleUpdateInsightDataType = '';
  protected $upgradeInsightType = 'Google_Service_ToolResults_UpgradeInsight';
  protected $upgradeInsightDataType = '';

  public function setExampleTraceMessages($exampleTraceMessages)
  {
    $this->exampleTraceMessages = $exampleTraceMessages;
  }
  public function getExampleTraceMessages()
  {
    return $this->exampleTraceMessages;
  }
  public function setMatcherId($matcherId)
  {
    $this->matcherId = $matcherId;
  }
  public function getMatcherId()
  {
    return $this->matcherId;
  }
  /**
   * @param Google_Service_ToolResults_PendingGoogleUpdateInsight
   */
  public function setPendingGoogleUpdateInsight(Google_Service_ToolResults_PendingGoogleUpdateInsight $pendingGoogleUpdateInsight)
  {
    $this->pendingGoogleUpdateInsight = $pendingGoogleUpdateInsight;
  }
  /**
   * @return Google_Service_ToolResults_PendingGoogleUpdateInsight
   */
  public function getPendingGoogleUpdateInsight()
  {
    return $this->pendingGoogleUpdateInsight;
  }
  /**
   * @param Google_Service_ToolResults_UpgradeInsight
   */
  public function setUpgradeInsight(Google_Service_ToolResults_UpgradeInsight $upgradeInsight)
  {
    $this->upgradeInsight = $upgradeInsight;
  }
  /**
   * @return Google_Service_ToolResults_UpgradeInsight
   */
  public function getUpgradeInsight()
  {
    return $this->upgradeInsight;
  }
}
