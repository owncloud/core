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

namespace Google\Service\GKEHub;

class ConfigManagementGitConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $gcpServiceAccountEmail;
  /**
   * @var string
   */
  public $httpsProxy;
  /**
   * @var string
   */
  public $policyDir;
  /**
   * @var string
   */
  public $secretType;
  /**
   * @var string
   */
  public $syncBranch;
  /**
   * @var string
   */
  public $syncRepo;
  /**
   * @var string
   */
  public $syncRev;
  /**
   * @var string
   */
  public $syncWaitSecs;

  /**
   * @param string
   */
  public function setGcpServiceAccountEmail($gcpServiceAccountEmail)
  {
    $this->gcpServiceAccountEmail = $gcpServiceAccountEmail;
  }
  /**
   * @return string
   */
  public function getGcpServiceAccountEmail()
  {
    return $this->gcpServiceAccountEmail;
  }
  /**
   * @param string
   */
  public function setHttpsProxy($httpsProxy)
  {
    $this->httpsProxy = $httpsProxy;
  }
  /**
   * @return string
   */
  public function getHttpsProxy()
  {
    return $this->httpsProxy;
  }
  /**
   * @param string
   */
  public function setPolicyDir($policyDir)
  {
    $this->policyDir = $policyDir;
  }
  /**
   * @return string
   */
  public function getPolicyDir()
  {
    return $this->policyDir;
  }
  /**
   * @param string
   */
  public function setSecretType($secretType)
  {
    $this->secretType = $secretType;
  }
  /**
   * @return string
   */
  public function getSecretType()
  {
    return $this->secretType;
  }
  /**
   * @param string
   */
  public function setSyncBranch($syncBranch)
  {
    $this->syncBranch = $syncBranch;
  }
  /**
   * @return string
   */
  public function getSyncBranch()
  {
    return $this->syncBranch;
  }
  /**
   * @param string
   */
  public function setSyncRepo($syncRepo)
  {
    $this->syncRepo = $syncRepo;
  }
  /**
   * @return string
   */
  public function getSyncRepo()
  {
    return $this->syncRepo;
  }
  /**
   * @param string
   */
  public function setSyncRev($syncRev)
  {
    $this->syncRev = $syncRev;
  }
  /**
   * @return string
   */
  public function getSyncRev()
  {
    return $this->syncRev;
  }
  /**
   * @param string
   */
  public function setSyncWaitSecs($syncWaitSecs)
  {
    $this->syncWaitSecs = $syncWaitSecs;
  }
  /**
   * @return string
   */
  public function getSyncWaitSecs()
  {
    return $this->syncWaitSecs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementGitConfig::class, 'Google_Service_GKEHub_ConfigManagementGitConfig');
