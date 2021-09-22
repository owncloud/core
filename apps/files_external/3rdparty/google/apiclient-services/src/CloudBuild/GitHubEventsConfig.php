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

class GitHubEventsConfig extends \Google\Model
{
  public $enterpriseConfigResourceName;
  public $installationId;
  public $name;
  public $owner;
  protected $pullRequestType = PullRequestFilter::class;
  protected $pullRequestDataType = '';
  protected $pushType = PushFilter::class;
  protected $pushDataType = '';

  public function setEnterpriseConfigResourceName($enterpriseConfigResourceName)
  {
    $this->enterpriseConfigResourceName = $enterpriseConfigResourceName;
  }
  public function getEnterpriseConfigResourceName()
  {
    return $this->enterpriseConfigResourceName;
  }
  public function setInstallationId($installationId)
  {
    $this->installationId = $installationId;
  }
  public function getInstallationId()
  {
    return $this->installationId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwner($owner)
  {
    $this->owner = $owner;
  }
  public function getOwner()
  {
    return $this->owner;
  }
  /**
   * @param PullRequestFilter
   */
  public function setPullRequest(PullRequestFilter $pullRequest)
  {
    $this->pullRequest = $pullRequest;
  }
  /**
   * @return PullRequestFilter
   */
  public function getPullRequest()
  {
    return $this->pullRequest;
  }
  /**
   * @param PushFilter
   */
  public function setPush(PushFilter $push)
  {
    $this->push = $push;
  }
  /**
   * @return PushFilter
   */
  public function getPush()
  {
    return $this->push;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitHubEventsConfig::class, 'Google_Service_CloudBuild_GitHubEventsConfig');
