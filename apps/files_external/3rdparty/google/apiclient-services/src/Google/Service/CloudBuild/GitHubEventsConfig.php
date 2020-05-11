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

class Google_Service_CloudBuild_GitHubEventsConfig extends Google_Model
{
  public $installationId;
  public $name;
  public $owner;
  protected $pullRequestType = 'Google_Service_CloudBuild_PullRequestFilter';
  protected $pullRequestDataType = '';
  protected $pushType = 'Google_Service_CloudBuild_PushFilter';
  protected $pushDataType = '';

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
   * @param Google_Service_CloudBuild_PullRequestFilter
   */
  public function setPullRequest(Google_Service_CloudBuild_PullRequestFilter $pullRequest)
  {
    $this->pullRequest = $pullRequest;
  }
  /**
   * @return Google_Service_CloudBuild_PullRequestFilter
   */
  public function getPullRequest()
  {
    return $this->pullRequest;
  }
  /**
   * @param Google_Service_CloudBuild_PushFilter
   */
  public function setPush(Google_Service_CloudBuild_PushFilter $push)
  {
    $this->push = $push;
  }
  /**
   * @return Google_Service_CloudBuild_PushFilter
   */
  public function getPush()
  {
    return $this->push;
  }
}
