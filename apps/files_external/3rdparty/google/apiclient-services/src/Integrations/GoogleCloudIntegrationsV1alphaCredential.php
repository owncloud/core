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

class GoogleCloudIntegrationsV1alphaCredential extends \Google\Model
{
  protected $authTokenType = GoogleCloudIntegrationsV1alphaAuthToken::class;
  protected $authTokenDataType = '';
  /**
   * @var string
   */
  public $credentialType;
  protected $jwtType = GoogleCloudIntegrationsV1alphaJwt::class;
  protected $jwtDataType = '';
  protected $oauth2AuthorizationCodeType = GoogleCloudIntegrationsV1alphaOAuth2AuthorizationCode::class;
  protected $oauth2AuthorizationCodeDataType = '';
  protected $oauth2ClientCredentialsType = GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials::class;
  protected $oauth2ClientCredentialsDataType = '';
  protected $oauth2ResourceOwnerCredentialsType = GoogleCloudIntegrationsV1alphaOAuth2ResourceOwnerCredentials::class;
  protected $oauth2ResourceOwnerCredentialsDataType = '';
  protected $oidcTokenType = GoogleCloudIntegrationsV1alphaOidcToken::class;
  protected $oidcTokenDataType = '';
  protected $serviceAccountCredentialsType = GoogleCloudIntegrationsV1alphaServiceAccountCredentials::class;
  protected $serviceAccountCredentialsDataType = '';
  protected $usernameAndPasswordType = GoogleCloudIntegrationsV1alphaUsernameAndPassword::class;
  protected $usernameAndPasswordDataType = '';

  /**
   * @param GoogleCloudIntegrationsV1alphaAuthToken
   */
  public function setAuthToken(GoogleCloudIntegrationsV1alphaAuthToken $authToken)
  {
    $this->authToken = $authToken;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaAuthToken
   */
  public function getAuthToken()
  {
    return $this->authToken;
  }
  /**
   * @param string
   */
  public function setCredentialType($credentialType)
  {
    $this->credentialType = $credentialType;
  }
  /**
   * @return string
   */
  public function getCredentialType()
  {
    return $this->credentialType;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaJwt
   */
  public function setJwt(GoogleCloudIntegrationsV1alphaJwt $jwt)
  {
    $this->jwt = $jwt;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaJwt
   */
  public function getJwt()
  {
    return $this->jwt;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaOAuth2AuthorizationCode
   */
  public function setOauth2AuthorizationCode(GoogleCloudIntegrationsV1alphaOAuth2AuthorizationCode $oauth2AuthorizationCode)
  {
    $this->oauth2AuthorizationCode = $oauth2AuthorizationCode;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaOAuth2AuthorizationCode
   */
  public function getOauth2AuthorizationCode()
  {
    return $this->oauth2AuthorizationCode;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials
   */
  public function setOauth2ClientCredentials(GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials $oauth2ClientCredentials)
  {
    $this->oauth2ClientCredentials = $oauth2ClientCredentials;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials
   */
  public function getOauth2ClientCredentials()
  {
    return $this->oauth2ClientCredentials;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaOAuth2ResourceOwnerCredentials
   */
  public function setOauth2ResourceOwnerCredentials(GoogleCloudIntegrationsV1alphaOAuth2ResourceOwnerCredentials $oauth2ResourceOwnerCredentials)
  {
    $this->oauth2ResourceOwnerCredentials = $oauth2ResourceOwnerCredentials;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaOAuth2ResourceOwnerCredentials
   */
  public function getOauth2ResourceOwnerCredentials()
  {
    return $this->oauth2ResourceOwnerCredentials;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaOidcToken
   */
  public function setOidcToken(GoogleCloudIntegrationsV1alphaOidcToken $oidcToken)
  {
    $this->oidcToken = $oidcToken;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaOidcToken
   */
  public function getOidcToken()
  {
    return $this->oidcToken;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaServiceAccountCredentials
   */
  public function setServiceAccountCredentials(GoogleCloudIntegrationsV1alphaServiceAccountCredentials $serviceAccountCredentials)
  {
    $this->serviceAccountCredentials = $serviceAccountCredentials;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaServiceAccountCredentials
   */
  public function getServiceAccountCredentials()
  {
    return $this->serviceAccountCredentials;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaUsernameAndPassword
   */
  public function setUsernameAndPassword(GoogleCloudIntegrationsV1alphaUsernameAndPassword $usernameAndPassword)
  {
    $this->usernameAndPassword = $usernameAndPassword;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaUsernameAndPassword
   */
  public function getUsernameAndPassword()
  {
    return $this->usernameAndPassword;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaCredential::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaCredential');
