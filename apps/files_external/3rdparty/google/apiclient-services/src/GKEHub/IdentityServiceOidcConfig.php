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

class IdentityServiceOidcConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $certificateAuthorityData;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $clientSecret;
  /**
   * @var bool
   */
  public $deployCloudConsoleProxy;
  /**
   * @var bool
   */
  public $enableAccessToken;
  /**
   * @var string
   */
  public $encryptedClientSecret;
  /**
   * @var string
   */
  public $extraParams;
  /**
   * @var string
   */
  public $groupPrefix;
  /**
   * @var string
   */
  public $groupsClaim;
  /**
   * @var string
   */
  public $issuerUri;
  /**
   * @var string
   */
  public $kubectlRedirectUri;
  /**
   * @var string
   */
  public $scopes;
  /**
   * @var string
   */
  public $userClaim;
  /**
   * @var string
   */
  public $userPrefix;

  /**
   * @param string
   */
  public function setCertificateAuthorityData($certificateAuthorityData)
  {
    $this->certificateAuthorityData = $certificateAuthorityData;
  }
  /**
   * @return string
   */
  public function getCertificateAuthorityData()
  {
    return $this->certificateAuthorityData;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setClientSecret($clientSecret)
  {
    $this->clientSecret = $clientSecret;
  }
  /**
   * @return string
   */
  public function getClientSecret()
  {
    return $this->clientSecret;
  }
  /**
   * @param bool
   */
  public function setDeployCloudConsoleProxy($deployCloudConsoleProxy)
  {
    $this->deployCloudConsoleProxy = $deployCloudConsoleProxy;
  }
  /**
   * @return bool
   */
  public function getDeployCloudConsoleProxy()
  {
    return $this->deployCloudConsoleProxy;
  }
  /**
   * @param bool
   */
  public function setEnableAccessToken($enableAccessToken)
  {
    $this->enableAccessToken = $enableAccessToken;
  }
  /**
   * @return bool
   */
  public function getEnableAccessToken()
  {
    return $this->enableAccessToken;
  }
  /**
   * @param string
   */
  public function setEncryptedClientSecret($encryptedClientSecret)
  {
    $this->encryptedClientSecret = $encryptedClientSecret;
  }
  /**
   * @return string
   */
  public function getEncryptedClientSecret()
  {
    return $this->encryptedClientSecret;
  }
  /**
   * @param string
   */
  public function setExtraParams($extraParams)
  {
    $this->extraParams = $extraParams;
  }
  /**
   * @return string
   */
  public function getExtraParams()
  {
    return $this->extraParams;
  }
  /**
   * @param string
   */
  public function setGroupPrefix($groupPrefix)
  {
    $this->groupPrefix = $groupPrefix;
  }
  /**
   * @return string
   */
  public function getGroupPrefix()
  {
    return $this->groupPrefix;
  }
  /**
   * @param string
   */
  public function setGroupsClaim($groupsClaim)
  {
    $this->groupsClaim = $groupsClaim;
  }
  /**
   * @return string
   */
  public function getGroupsClaim()
  {
    return $this->groupsClaim;
  }
  /**
   * @param string
   */
  public function setIssuerUri($issuerUri)
  {
    $this->issuerUri = $issuerUri;
  }
  /**
   * @return string
   */
  public function getIssuerUri()
  {
    return $this->issuerUri;
  }
  /**
   * @param string
   */
  public function setKubectlRedirectUri($kubectlRedirectUri)
  {
    $this->kubectlRedirectUri = $kubectlRedirectUri;
  }
  /**
   * @return string
   */
  public function getKubectlRedirectUri()
  {
    return $this->kubectlRedirectUri;
  }
  /**
   * @param string
   */
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  /**
   * @return string
   */
  public function getScopes()
  {
    return $this->scopes;
  }
  /**
   * @param string
   */
  public function setUserClaim($userClaim)
  {
    $this->userClaim = $userClaim;
  }
  /**
   * @return string
   */
  public function getUserClaim()
  {
    return $this->userClaim;
  }
  /**
   * @param string
   */
  public function setUserPrefix($userPrefix)
  {
    $this->userPrefix = $userPrefix;
  }
  /**
   * @return string
   */
  public function getUserPrefix()
  {
    return $this->userPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentityServiceOidcConfig::class, 'Google_Service_GKEHub_IdentityServiceOidcConfig');
