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

class GitLabEventsConfig extends \Google\Model
{
  protected $gitlabConfigType = GitLabConfig::class;
  protected $gitlabConfigDataType = '';
  /**
   * @var string
   */
  public $gitlabConfigResource;
  /**
   * @var string
   */
  public $projectNamespace;
  protected $pullRequestType = PullRequestFilter::class;
  protected $pullRequestDataType = '';
  protected $pushType = PushFilter::class;
  protected $pushDataType = '';

  /**
   * @param GitLabConfig
   */
  public function setGitlabConfig(GitLabConfig $gitlabConfig)
  {
    $this->gitlabConfig = $gitlabConfig;
  }
  /**
   * @return GitLabConfig
   */
  public function getGitlabConfig()
  {
    return $this->gitlabConfig;
  }
  /**
   * @param string
   */
  public function setGitlabConfigResource($gitlabConfigResource)
  {
    $this->gitlabConfigResource = $gitlabConfigResource;
  }
  /**
   * @return string
   */
  public function getGitlabConfigResource()
  {
    return $this->gitlabConfigResource;
  }
  /**
   * @param string
   */
  public function setProjectNamespace($projectNamespace)
  {
    $this->projectNamespace = $projectNamespace;
  }
  /**
   * @return string
   */
  public function getProjectNamespace()
  {
    return $this->projectNamespace;
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
class_alias(GitLabEventsConfig::class, 'Google_Service_CloudBuild_GitLabEventsConfig');
