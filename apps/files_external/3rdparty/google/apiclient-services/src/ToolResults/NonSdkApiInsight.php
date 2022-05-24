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

namespace Google\Service\ToolResults;

class NonSdkApiInsight extends \Google\Collection
{
  protected $collection_key = 'exampleTraceMessages';
  /**
   * @var string[]
   */
  public $exampleTraceMessages;
  /**
   * @var string
   */
  public $matcherId;
  protected $pendingGoogleUpdateInsightType = PendingGoogleUpdateInsight::class;
  protected $pendingGoogleUpdateInsightDataType = '';
  protected $upgradeInsightType = UpgradeInsight::class;
  protected $upgradeInsightDataType = '';

  /**
   * @param string[]
   */
  public function setExampleTraceMessages($exampleTraceMessages)
  {
    $this->exampleTraceMessages = $exampleTraceMessages;
  }
  /**
   * @return string[]
   */
  public function getExampleTraceMessages()
  {
    return $this->exampleTraceMessages;
  }
  /**
   * @param string
   */
  public function setMatcherId($matcherId)
  {
    $this->matcherId = $matcherId;
  }
  /**
   * @return string
   */
  public function getMatcherId()
  {
    return $this->matcherId;
  }
  /**
   * @param PendingGoogleUpdateInsight
   */
  public function setPendingGoogleUpdateInsight(PendingGoogleUpdateInsight $pendingGoogleUpdateInsight)
  {
    $this->pendingGoogleUpdateInsight = $pendingGoogleUpdateInsight;
  }
  /**
   * @return PendingGoogleUpdateInsight
   */
  public function getPendingGoogleUpdateInsight()
  {
    return $this->pendingGoogleUpdateInsight;
  }
  /**
   * @param UpgradeInsight
   */
  public function setUpgradeInsight(UpgradeInsight $upgradeInsight)
  {
    $this->upgradeInsight = $upgradeInsight;
  }
  /**
   * @return UpgradeInsight
   */
  public function getUpgradeInsight()
  {
    return $this->upgradeInsight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NonSdkApiInsight::class, 'Google_Service_ToolResults_NonSdkApiInsight');
