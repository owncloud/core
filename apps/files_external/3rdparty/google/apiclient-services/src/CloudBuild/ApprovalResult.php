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

namespace Google\Service\CloudBuild;

class ApprovalResult extends \Google\Model
{
  public $approvalTime;
  public $approverAccount;
  public $comment;
  public $decision;
  public $url;

  public function setApprovalTime($approvalTime)
  {
    $this->approvalTime = $approvalTime;
  }
  public function getApprovalTime()
  {
    return $this->approvalTime;
  }
  public function setApproverAccount($approverAccount)
  {
    $this->approverAccount = $approverAccount;
  }
  public function getApproverAccount()
  {
    return $this->approverAccount;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setDecision($decision)
  {
    $this->decision = $decision;
  }
  public function getDecision()
  {
    return $this->decision;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApprovalResult::class, 'Google_Service_CloudBuild_ApprovalResult');
