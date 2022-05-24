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

namespace Google\Service\RealTimeBidding;

class PolicyTopicEntry extends \Google\Collection
{
  protected $collection_key = 'evidences';
  protected $evidencesType = PolicyTopicEvidence::class;
  protected $evidencesDataType = 'array';
  /**
   * @var string
   */
  public $helpCenterUrl;
  /**
   * @var string
   */
  public $policyTopic;

  /**
   * @param PolicyTopicEvidence[]
   */
  public function setEvidences($evidences)
  {
    $this->evidences = $evidences;
  }
  /**
   * @return PolicyTopicEvidence[]
   */
  public function getEvidences()
  {
    return $this->evidences;
  }
  /**
   * @param string
   */
  public function setHelpCenterUrl($helpCenterUrl)
  {
    $this->helpCenterUrl = $helpCenterUrl;
  }
  /**
   * @return string
   */
  public function getHelpCenterUrl()
  {
    return $this->helpCenterUrl;
  }
  /**
   * @param string
   */
  public function setPolicyTopic($policyTopic)
  {
    $this->policyTopic = $policyTopic;
  }
  /**
   * @return string
   */
  public function getPolicyTopic()
  {
    return $this->policyTopic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyTopicEntry::class, 'Google_Service_RealTimeBidding_PolicyTopicEntry');
