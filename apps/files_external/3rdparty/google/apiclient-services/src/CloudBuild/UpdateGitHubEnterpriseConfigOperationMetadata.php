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

class UpdateGitHubEnterpriseConfigOperationMetadata extends \Google\Model
{
  public $completeTime;
  public $createTime;
  public $githubEnterpriseConfig;

  public function setCompleteTime($completeTime)
  {
    $this->completeTime = $completeTime;
  }
  public function getCompleteTime()
  {
    return $this->completeTime;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setGithubEnterpriseConfig($githubEnterpriseConfig)
  {
    $this->githubEnterpriseConfig = $githubEnterpriseConfig;
  }
  public function getGithubEnterpriseConfig()
  {
    return $this->githubEnterpriseConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateGitHubEnterpriseConfigOperationMetadata::class, 'Google_Service_CloudBuild_UpdateGitHubEnterpriseConfigOperationMetadata');
