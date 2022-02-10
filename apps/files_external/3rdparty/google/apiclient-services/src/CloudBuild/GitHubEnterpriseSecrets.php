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
  /**
   * @var string
   */
  public $oauthClientIdName;
  /**
   * @var string
   */
  public $oauthClientIdVersionName;
  /**
   * @var string
   */
  public $oauthSecretName;
  /**
   * @var string
   */
  public $oauthSecretVersionName;
  /**
   * @var string
   */
  public $privateKeyName;
  /**
   * @var string
   */
  public $privateKeyVersionName;
  /**
   * @var string
   */
  public $webhookSecretName;
  /**
   * @var string
   */
  public $webhookSecretVersionName;

  /**
   * @param string
   */
  public function setOauthClientIdName($oauthClientIdName)
  {
    $this->oauthClientIdName = $oauthClientIdName;
  }
  /**
   * @return string
   */
  public function getOauthClientIdName()
  {
    return $this->oauthClientIdName;
  }
  /**
   * @param string
   */
  public function setOauthClientIdVersionName($oauthClientIdVersionName)
  {
    $this->oauthClientIdVersionName = $oauthClientIdVersionName;
  }
  /**
   * @return string
   */
  public function getOauthClientIdVersionName()
  {
    return $this->oauthClientIdVersionName;
  }
  /**
   * @param string
   */
  public function setOauthSecretName($oauthSecretName)
  {
    $this->oauthSecretName = $oauthSecretName;
  }
  /**
   * @return string
   */
  public function getOauthSecretName()
  {
    return $this->oauthSecretName;
  }
  /**
   * @param string
   */
  public function setOauthSecretVersionName($oauthSecretVersionName)
  {
    $this->oauthSecretVersionName = $oauthSecretVersionName;
  }
  /**
   * @return string
   */
  public function getOauthSecretVersionName()
  {
    return $this->oauthSecretVersionName;
  }
  /**
   * @param string
   */
  public function setPrivateKeyName($privateKeyName)
  {
    $this->privateKeyName = $privateKeyName;
  }
  /**
   * @return string
   */
  public function getPrivateKeyName()
  {
    return $this->privateKeyName;
  }
  /**
   * @param string
   */
  public function setPrivateKeyVersionName($privateKeyVersionName)
  {
    $this->privateKeyVersionName = $privateKeyVersionName;
  }
  /**
   * @return string
   */
  public function getPrivateKeyVersionName()
  {
    return $this->privateKeyVersionName;
  }
  /**
   * @param string
   */
  public function setWebhookSecretName($webhookSecretName)
  {
    $this->webhookSecretName = $webhookSecretName;
  }
  /**
   * @return string
   */
  public function getWebhookSecretName()
  {
    return $this->webhookSecretName;
  }
  /**
   * @param string
   */
  public function setWebhookSecretVersionName($webhookSecretVersionName)
  {
    $this->webhookSecretVersionName = $webhookSecretVersionName;
  }
  /**
   * @return string
   */
  public function getWebhookSecretVersionName()
  {
    return $this->webhookSecretVersionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitHubEnterpriseSecrets::class, 'Google_Service_CloudBuild_GitHubEnterpriseSecrets');
