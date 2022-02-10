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

namespace Google\Service\Connectors;

class AuthConfig extends \Google\Collection
{
  protected $collection_key = 'additionalVariables';
  protected $additionalVariablesType = ConfigVariable::class;
  protected $additionalVariablesDataType = 'array';
  /**
   * @var string
   */
  public $authType;
  protected $oauth2ClientCredentialsType = Oauth2ClientCredentials::class;
  protected $oauth2ClientCredentialsDataType = '';
  protected $oauth2JwtBearerType = Oauth2JwtBearer::class;
  protected $oauth2JwtBearerDataType = '';
  protected $userPasswordType = UserPassword::class;
  protected $userPasswordDataType = '';

  /**
   * @param ConfigVariable[]
   */
  public function setAdditionalVariables($additionalVariables)
  {
    $this->additionalVariables = $additionalVariables;
  }
  /**
   * @return ConfigVariable[]
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
   * @param Oauth2ClientCredentials
   */
  public function setOauth2ClientCredentials(Oauth2ClientCredentials $oauth2ClientCredentials)
  {
    $this->oauth2ClientCredentials = $oauth2ClientCredentials;
  }
  /**
   * @return Oauth2ClientCredentials
   */
  public function getOauth2ClientCredentials()
  {
    return $this->oauth2ClientCredentials;
  }
  /**
   * @param Oauth2JwtBearer
   */
  public function setOauth2JwtBearer(Oauth2JwtBearer $oauth2JwtBearer)
  {
    $this->oauth2JwtBearer = $oauth2JwtBearer;
  }
  /**
   * @return Oauth2JwtBearer
   */
  public function getOauth2JwtBearer()
  {
    return $this->oauth2JwtBearer;
  }
  /**
   * @param UserPassword
   */
  public function setUserPassword(UserPassword $userPassword)
  {
    $this->userPassword = $userPassword;
  }
  /**
   * @return UserPassword
   */
  public function getUserPassword()
  {
    return $this->userPassword;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthConfig::class, 'Google_Service_Connectors_AuthConfig');
