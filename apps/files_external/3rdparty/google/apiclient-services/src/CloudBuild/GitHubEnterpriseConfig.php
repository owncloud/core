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
  public $appId;
  public $createTime;
  public $displayName;
  public $hostUrl;
  public $name;
  public $peeredNetwork;
  protected $secretsType = GitHubEnterpriseSecrets::class;
  protected $secretsDataType = '';
  public $sslCa;
  public $webhookKey;

  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHostUrl($hostUrl)
  {
    $this->hostUrl = $hostUrl;
  }
  public function getHostUrl()
  {
    return $this->hostUrl;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPeeredNetwork($peeredNetwork)
  {
    $this->peeredNetwork = $peeredNetwork;
  }
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
  public function setSslCa($sslCa)
  {
    $this->sslCa = $sslCa;
  }
  public function getSslCa()
  {
    return $this->sslCa;
  }
  public function setWebhookKey($webhookKey)
  {
    $this->webhookKey = $webhookKey;
  }
  public function getWebhookKey()
  {
    return $this->webhookKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitHubEnterpriseConfig::class, 'Google_Service_CloudBuild_GitHubEnterpriseConfig');
