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

class GitLabConfig extends \Google\Collection
{
  protected $collection_key = 'connectedRepositories';
  protected $connectedRepositoriesType = GitLabRepositoryId::class;
  protected $connectedRepositoriesDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  protected $enterpriseConfigType = GitLabEnterpriseConfig::class;
  protected $enterpriseConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $secretsType = GitLabSecrets::class;
  protected $secretsDataType = '';
  /**
   * @var string
   */
  public $username;
  /**
   * @var string
   */
  public $webhookKey;

  /**
   * @param GitLabRepositoryId[]
   */
  public function setConnectedRepositories($connectedRepositories)
  {
    $this->connectedRepositories = $connectedRepositories;
  }
  /**
   * @return GitLabRepositoryId[]
   */
  public function getConnectedRepositories()
  {
    return $this->connectedRepositories;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GitLabEnterpriseConfig
   */
  public function setEnterpriseConfig(GitLabEnterpriseConfig $enterpriseConfig)
  {
    $this->enterpriseConfig = $enterpriseConfig;
  }
  /**
   * @return GitLabEnterpriseConfig
   */
  public function getEnterpriseConfig()
  {
    return $this->enterpriseConfig;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GitLabSecrets
   */
  public function setSecrets(GitLabSecrets $secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return GitLabSecrets
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
  /**
   * @param string
   */
  public function setWebhookKey($webhookKey)
  {
    $this->webhookKey = $webhookKey;
  }
  /**
   * @return string
   */
  public function getWebhookKey()
  {
    return $this->webhookKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitLabConfig::class, 'Google_Service_CloudBuild_GitLabConfig');
