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

class GitRepoSource extends \Google\Model
{
  /**
   * @var string
   */
  public $bitbucketServerConfig;
  /**
   * @var string
   */
  public $githubEnterpriseConfig;
  /**
   * @var string
   */
  public $ref;
  /**
   * @var string
   */
  public $repoType;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setBitbucketServerConfig($bitbucketServerConfig)
  {
    $this->bitbucketServerConfig = $bitbucketServerConfig;
  }
  /**
   * @return string
   */
  public function getBitbucketServerConfig()
  {
    return $this->bitbucketServerConfig;
  }
  /**
   * @param string
   */
  public function setGithubEnterpriseConfig($githubEnterpriseConfig)
  {
    $this->githubEnterpriseConfig = $githubEnterpriseConfig;
  }
  /**
   * @return string
   */
  public function getGithubEnterpriseConfig()
  {
    return $this->githubEnterpriseConfig;
  }
  /**
   * @param string
   */
  public function setRef($ref)
  {
    $this->ref = $ref;
  }
  /**
   * @return string
   */
  public function getRef()
  {
    return $this->ref;
  }
  /**
   * @param string
   */
  public function setRepoType($repoType)
  {
    $this->repoType = $repoType;
  }
  /**
   * @return string
   */
  public function getRepoType()
  {
    return $this->repoType;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitRepoSource::class, 'Google_Service_CloudBuild_GitRepoSource');
