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

namespace Google\Service\ContainerAnalysis;

class ContaineranalysisGoogleDevtoolsCloudbuildV1ApprovalResult extends \Google\Model
{
  /**
   * @var string
   */
  public $approvalTime;
  /**
   * @var string
   */
  public $approverAccount;
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $decision;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setApprovalTime($approvalTime)
  {
    $this->approvalTime = $approvalTime;
  }
  /**
   * @return string
   */
  public function getApprovalTime()
  {
    return $this->approvalTime;
  }
  /**
   * @param string
   */
  public function setApproverAccount($approverAccount)
  {
    $this->approverAccount = $approverAccount;
  }
  /**
   * @return string
   */
  public function getApproverAccount()
  {
    return $this->approverAccount;
  }
  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param string
   */
  public function setDecision($decision)
  {
    $this->decision = $decision;
  }
  /**
   * @return string
   */
  public function getDecision()
  {
    return $this->decision;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1ApprovalResult::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1ApprovalResult');
