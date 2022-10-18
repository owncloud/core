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

namespace Google\Service\Integrations;

class GoogleCloudConnectorsV1AuthConfig extends \Google\Collection
{
  protected $collection_key = 'additionalVariables';
  protected $additionalVariablesType = GoogleCloudConnectorsV1ConfigVariable::class;
  protected $additionalVariablesDataType = 'array';
  /**
   * @var string
   */
  public $authType;
  protected $oauth2ClientCredentialsType = GoogleCloudConnectorsV1AuthConfigOauth2ClientCredentials::class;
  protected $oauth2ClientCredentialsDataType = '';
  protected $oauth2JwtBearerType = GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer::class;
  protected $oauth2JwtBearerDataType = '';
  protected $sshPublicKeyType = GoogleCloudConnectorsV1AuthConfigSshPublicKey::class;
  protected $sshPublicKeyDataType = '';
  protected $userPasswordType = GoogleCloudConnectorsV1AuthConfigUserPassword::class;
  protected $userPasswordDataType = '';

  /**
   * @param GoogleCloudConnectorsV1ConfigVariable[]
   */
  public function setAdditionalVariables($additionalVariables)
  {
    $this->additionalVariables = $additionalVariables;
  }
  /**
   * @return GoogleCloudConnectorsV1ConfigVariable[]
   */
  public function getAdditionalVariables()
  {
    return $this->additionalVariables;
  }
  /**
   * @param string
   */
  public function setAuthType($authType)
  {
    $this->authType = $authType;
  }
  /**
   * @return string
   */
  public function getAuthType()
  {
    return $this->authType;
  }
  /**
   * @param GoogleCloudConnectorsV1AuthConfigOauth2ClientCredentials
   */
  public function setOauth2ClientCredentials(GoogleCloudConnectorsV1AuthConfigOauth2ClientCredentials $oauth2ClientCredentials)
  {
    $this->oauth2ClientCredentials = $oauth2ClientCredentials;
  }
  /**
   * @return GoogleCloudConnectorsV1AuthConfigOauth2ClientCredentials
   */
  public function getOauth2ClientCredentials()
  {
    return $this->oauth2ClientCredentials;
  }
  /**
   * @param GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer
   */
  public function setOauth2JwtBearer(GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer $oauth2JwtBearer)
  {
    $this->oauth2JwtBearer = $oauth2JwtBearer;
  }
  /**
   * @return GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer
   */
  public function getOauth2JwtBearer()
  {
    return $this->oauth2JwtBearer;
  }
  /**
   * @param GoogleCloudConnectorsV1AuthConfigSshPublicKey
   */
  public function setSshPublicKey(GoogleCloudConnectorsV1AuthConfigSshPublicKey $sshPublicKey)
  {
    $this->sshPublicKey = $sshPublicKey;
  }
  /**
   * @return GoogleCloudConnectorsV1AuthConfigSshPublicKey
   */
  public function getSshPublicKey()
  {
    return $this->sshPublicKey;
  }
  /**
   * @param GoogleCloudConnectorsV1AuthConfigUserPassword
   */
  public function setUserPassword(GoogleCloudConnectorsV1AuthConfigUserPassword $userPassword)
  {
    $this->userPassword = $userPassword;
  }
  /**
   * @return GoogleCloudConnectorsV1AuthConfigUserPassword
   */
  public function getUserPassword()
  {
    return $this->userPassword;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudConnectorsV1AuthConfig::class, 'Google_Service_Integrations_GoogleCloudConnectorsV1AuthConfig');
