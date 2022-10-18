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

class GitLabSecrets extends \Google\Model
{
  /**
   * @var string
   */
  public $apiAccessTokenVersion;
  /**
   * @var string
   */
  public $apiKeyVersion;
  /**
   * @var string
   */
  public $readAccessTokenVersion;
  /**
   * @var string
   */
  public $webhookSecretVersion;

  /**
   * @param string
   */
  public function setApiAccessTokenVersion($apiAccessTokenVersion)
  {
    $this->apiAccessTokenVersion = $apiAccessTokenVersion;
  }
  /**
   * @return string
   */
  public function getApiAccessTokenVersion()
  {
    return $this->apiAccessTokenVersion;
  }
  /**
   * @param string
   */
  public function setApiKeyVersion($apiKeyVersion)
  {
    $this->apiKeyVersion = $apiKeyVersion;
  }
  /**
   * @return string
   */
  public function getApiKeyVersion()
  {
    return $this->apiKeyVersion;
  }
  /**
   * @param string
   */
  public function setReadAccessTokenVersion($readAccessTokenVersion)
  {
    $this->readAccessTokenVersion = $readAccessTokenVersion;
  }
  /**
   * @return string
   */
  public function getReadAccessTokenVersion()
  {
    return $this->readAccessTokenVersion;
  }
  /**
   * @param string
   */
  public function setWebhookSecretVersion($webhookSecretVersion)
  {
    $this->webhookSecretVersion = $webhookSecretVersion;
  }
  /**
   * @return string
   */
  public function getWebhookSecretVersion()
  {
    return $this->webhookSecretVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitLabSecrets::class, 'Google_Service_CloudBuild_GitLabSecrets');
