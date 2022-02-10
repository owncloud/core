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

class GitHubEnterpriseConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $hostUrl;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $peeredNetwork;
  protected $secretsType = GitHubEnterpriseSecrets::class;
  protected $secretsDataType = '';
  /**
   * @var string
   */
  public $sslCa;
  /**
   * @var string
   */
  public $webhookKey;

  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
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
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setHostUrl($hostUrl)
  {
    $this->hostUrl = $hostUrl;
  }
  /**
   * @return string
   */
  public function getHostUrl()
  {
    return $this->hostUrl;
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
   * @param string
   */
  public function setPeeredNetwork($peeredNetwork)
  {
    $this->peeredNetwork = $peeredNetwork;
  }
  /**
   * @return string
   */
  public function getPeeredNetwork()
  {
    return $this->peeredNetwork;
  }
  /**
   * @param GitHubEnterpriseSecrets
   */
  public function setSecrets(GitHubEnterpriseSecrets $secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return GitHubEnterpriseSecrets
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  /**
   * @param string
   */
  public function setSslCa($sslCa)
  {
    $this->sslCa = $sslCa;
  }
  /**
   * @return string
   */
  public function getSslCa()
  {
    return $this->sslCa;
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
class_alias(GitHubEnterpriseConfig::class, 'Google_Service_CloudBuild_GitHubEnterpriseConfig');
