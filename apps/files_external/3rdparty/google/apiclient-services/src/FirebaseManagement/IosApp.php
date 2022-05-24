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

namespace Google\Service\FirebaseManagement;

class IosApp extends \Google\Model
{
  /**
   * @var string
   */
  public $apiKeyId;
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $appStoreId;
  /**
   * @var string
   */
  public $bundleId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $teamId;

  /**
   * @param string
   */
  public function setApiKeyId($apiKeyId)
  {
    $this->apiKeyId = $apiKeyId;
  }
  /**
   * @return string
   */
  public function getApiKeyId()
  {
    return $this->apiKeyId;
  }
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
  public function setAppStoreId($appStoreId)
  {
    $this->appStoreId = $appStoreId;
  }
  /**
   * @return string
   */
  public function getAppStoreId()
  {
    return $this->appStoreId;
  }
  /**
   * @param string
   */
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  /**
   * @return string
   */
  public function getBundleId()
  {
    return $this->bundleId;
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
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setTeamId($teamId)
  {
    $this->teamId = $teamId;
  }
  /**
   * @return string
   */
  public function getTeamId()
  {
    return $this->teamId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosApp::class, 'Google_Service_FirebaseManagement_IosApp');
