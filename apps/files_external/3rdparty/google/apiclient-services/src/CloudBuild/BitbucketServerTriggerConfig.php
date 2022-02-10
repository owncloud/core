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

class BitbucketServerTriggerConfig extends \Google\Model
{
  protected $bitbucketServerConfigType = BitbucketServerConfig::class;
  protected $bitbucketServerConfigDataType = '';
  /**
   * @var string
   */
  public $bitbucketServerConfigResource;
  /**
   * @var string
   */
  public $projectKey;
  protected $pullRequestType = PullRequestFilter::class;
  protected $pullRequestDataType = '';
  protected $pushType = PushFilter::class;
  protected $pushDataType = '';
  /**
   * @var string
   */
  public $repoSlug;

  /**
   * @param BitbucketServerConfig
   */
  public function setBitbucketServerConfig(BitbucketServerConfig $bitbucketServerConfig)
  {
    $this->bitbucketServerConfig = $bitbucketServerConfig;
  }
  /**
   * @return BitbucketServerConfig
   */
  public function getBitbucketServerConfig()
  {
    return $this->bitbucketServerConfig;
  }
  /**
   * @param string
   */
  public function setBitbucketServerConfigResource($bitbucketServerConfigResource)
  {
    $this->bitbucketServerConfigResource = $bitbucketServerConfigResource;
  }
  /**
   * @return string
   */
  public function getBitbucketServerConfigResource()
  {
    return $this->bitbucketServerConfigResource;
  }
  /**
   * @param string
   */
  public function setProjectKey($projectKey)
  {
    $this->projectKey = $projectKey;
  }
  /**
   * @return string
   */
  public function getProjectKey()
  {
    return $this->projectKey;
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
  /**
   * @param string
   */
  public function setRepoSlug($repoSlug)
  {
    $this->repoSlug = $repoSlug;
  }
  /**
   * @return string
   */
  public function getRepoSlug()
  {
    return $this->repoSlug;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BitbucketServerTriggerConfig::class, 'Google_Service_CloudBuild_BitbucketServerTriggerConfig');
