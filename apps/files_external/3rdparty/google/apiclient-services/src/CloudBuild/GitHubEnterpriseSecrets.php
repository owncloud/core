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

class GitHubEnterpriseSecrets extends \Google\Model
{
  public $oauthClientIdName;
  public $oauthClientIdVersionName;
  public $oauthSecretName;
  public $oauthSecretVersionName;
  public $privateKeyName;
  public $privateKeyVersionName;
  public $webhookSecretName;
  public $webhookSecretVersionName;

  public function setOauthClientIdName($oauthClientIdName)
  {
    $this->oauthClientIdName = $oauthClientIdName;
  }
  public function getOauthClientIdName()
  {
    return $this->oauthClientIdName;
  }
  public function setOauthClientIdVersionName($oauthClientIdVersionName)
  {
    $this->oauthClientIdVersionName = $oauthClientIdVersionName;
  }
  public function getOauthClientIdVersionName()
  {
    return $this->oauthClientIdVersionName;
  }
  public function setOauthSecretName($oauthSecretName)
  {
    $this->oauthSecretName = $oauthSecretName;
  }
  public function getOauthSecretName()
  {
    return $this->oauthSecretName;
  }
  public function setOauthSecretVersionName($oauthSecretVersionName)
  {
    $this->oauthSecretVersionName = $oauthSecretVersionName;
  }
  public function getOauthSecretVersionName()
  {
    return $this->oauthSecretVersionName;
  }
  public function setPrivateKeyName($privateKeyName)
  {
    $this->privateKeyName = $privateKeyName;
  }
  public function getPrivateKeyName()
  {
    return $this->privateKeyName;
  }
  public function setPrivateKeyVersionName($privateKeyVersionName)
  {
    $this->privateKeyVersionName = $privateKeyVersionName;
  }
  public function getPrivateKeyVersionName()
  {
    return $this->privateKeyVersionName;
  }
  public function setWebhookSecretName($webhookSecretName)
  {
    $this->webhookSecretName = $webhookSecretName;
  }
  public function getWebhookSecretName()
  {
    return $this->webhookSecretName;
  }
  public function setWebhookSecretVersionName($webhookSecretVersionName)
  {
    $this->webhookSecretVersionName = $webhookSecretVersionName;
  }
  public function getWebhookSecretVersionName()
  {
    return $this->webhookSecretVersionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitHubEnterpriseSecrets::class, 'Google_Service_CloudBuild_GitHubEnterpriseSecrets');
