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

namespace Google\Service\TagManager;

class Environment extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $authorizationCode;
  /**
   * @var string
   */
  public $authorizationTimestamp;
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $containerVersionId;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $enableDebug;
  /**
   * @var string
   */
  public $environmentId;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $tagManagerUrl;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $workspaceId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setAuthorizationCode($authorizationCode)
  {
    $this->authorizationCode = $authorizationCode;
  }
  /**
   * @return string
   */
  public function getAuthorizationCode()
  {
    return $this->authorizationCode;
  }
  /**
   * @param string
   */
  public function setAuthorizationTimestamp($authorizationTimestamp)
  {
    $this->authorizationTimestamp = $authorizationTimestamp;
  }
  /**
   * @return string
   */
  public function getAuthorizationTimestamp()
  {
    return $this->authorizationTimestamp;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string
   */
  public function setContainerVersionId($containerVersionId)
  {
    $this->containerVersionId = $containerVersionId;
  }
  /**
   * @return string
   */
  public function getContainerVersionId()
  {
    return $this->containerVersionId;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setEnableDebug($enableDebug)
  {
    $this->enableDebug = $enableDebug;
  }
  /**
   * @return bool
   */
  public function getEnableDebug()
  {
    return $this->enableDebug;
  }
  /**
   * @param string
   */
  public function setEnvironmentId($environmentId)
  {
    $this->environmentId = $environmentId;
  }
  /**
   * @return string
   */
  public function getEnvironmentId()
  {
    return $this->environmentId;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  /**
   * @return string
   */
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  /**
   * @return string
   */
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_TagManager_Environment');
