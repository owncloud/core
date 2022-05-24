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

namespace Google\Service\Vault;

class CountArtifactsResponse extends \Google\Model
{
  protected $groupsCountResultType = GroupsCountResult::class;
  protected $groupsCountResultDataType = '';
  protected $mailCountResultType = MailCountResult::class;
  protected $mailCountResultDataType = '';
  /**
   * @var string
   */
  public $totalCount;

  /**
   * @param GroupsCountResult
   */
  public function setGroupsCountResult(GroupsCountResult $groupsCountResult)
  {
    $this->groupsCountResult = $groupsCountResult;
  }
  /**
   * @return GroupsCountResult
   */
  public function getGroupsCountResult()
  {
    return $this->groupsCountResult;
  }
  /**
   * @param MailCountResult
   */
  public function setMailCountResult(MailCountResult $mailCountResult)
  {
    $this->mailCountResult = $mailCountResult;
  }
  /**
   * @return MailCountResult
   */
  public function getMailCountResult()
  {
    return $this->mailCountResult;
  }
  /**
   * @param string
   */
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  /**
   * @return string
   */
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountArtifactsResponse::class, 'Google_Service_Vault_CountArtifactsResponse');
