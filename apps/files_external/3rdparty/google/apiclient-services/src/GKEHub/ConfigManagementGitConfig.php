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
  public $gcpServiceAccountEmail;
  public $httpsProxy;
  public $policyDir;
  public $secretType;
  public $syncBranch;
  public $syncRepo;
  public $syncRev;
  public $syncWaitSecs;

  public function setGcpServiceAccountEmail($gcpServiceAccountEmail)
  {
    $this->gcpServiceAccountEmail = $gcpServiceAccountEmail;
  }
  public function getGcpServiceAccountEmail()
  {
    return $this->gcpServiceAccountEmail;
  }
  public function setHttpsProxy($httpsProxy)
  {
    $this->httpsProxy = $httpsProxy;
  }
  public function getHttpsProxy()
  {
    return $this->httpsProxy;
  }
  public function setPolicyDir($policyDir)
  {
    $this->policyDir = $policyDir;
  }
  public function getPolicyDir()
  {
    return $this->policyDir;
  }
  public function setSecretType($secretType)
  {
    $this->secretType = $secretType;
  }
  public function getSecretType()
  {
    return $this->secretType;
  }
  public function setSyncBranch($syncBranch)
  {
    $this->syncBranch = $syncBranch;
  }
  public function getSyncBranch()
  {
    return $this->syncBranch;
  }
  public function setSyncRepo($syncRepo)
  {
    $this->syncRepo = $syncRepo;
  }
  public function getSyncRepo()
  {
    return $this->syncRepo;
  }
  public function setSyncRev($syncRev)
  {
    $this->syncRev = $syncRev;
  }
  public function getSyncRev()
  {
    return $this->syncRev;
  }
  public function setSyncWaitSecs($syncWaitSecs)
  {
    $this->syncWaitSecs = $syncWaitSecs;
  }
  public function getSyncWaitSecs()
  {
    return $this->syncWaitSecs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementGitConfig::class, 'Google_Service_GKEHub_ConfigManagementGitConfig');
