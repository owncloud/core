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

namespace Google\Service\IdentityToolkit;

class IdentitytoolkitRelyingpartyCreateAuthUriRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $authFlowType;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $context;
  /**
   * @var string
   */
  public $continueUri;
  /**
   * @var string[]
   */
  public $customParameter;
  /**
   * @var string
   */
  public $hostedDomain;
  /**
   * @var string
   */
  public $identifier;
  /**
   * @var string
   */
  public $oauthConsumerKey;
  /**
   * @var string
   */
  public $oauthScope;
  /**
   * @var string
   */
  public $openidRealm;
  /**
   * @var string
   */
  public $otaApp;
  /**
   * @var string
   */
  public $providerId;
  /**
   * @var string
   */
  public $sessionId;
  /**
   * @var string
   */
  public $tenantId;
  /**
   * @var string
   */
  public $tenantProjectNumber;

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
  public function setAuthFlowType($authFlowType)
  {
    $this->authFlowType = $authFlowType;
  }
  /**
   * @return string
   */
  public function getAuthFlowType()
  {
    return $this->authFlowType;
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
  public function setContext($context)
  {
    $this->context = $context;
  }
  /**
   * @return string
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param string
   */
  public function setContinueUri($continueUri)
  {
    $this->continueUri = $continueUri;
  }
  /**
   * @return string
   */
  public function getContinueUri()
  {
    return $this->continueUri;
  }
  /**
   * @param string[]
   */
  public function setCustomParameter($customParameter)
  {
    $this->customParameter = $customParameter;
  }
  /**
   * @return string[]
   */
  public function getCustomParameter()
  {
    return $this->customParameter;
  }
  /**
   * @param string
   */
  public function setHostedDomain($hostedDomain)
  {
    $this->hostedDomain = $hostedDomain;
  }
  /**
   * @return string
   */
  public function getHostedDomain()
  {
    return $this->hostedDomain;
  }
  /**
   * @param string
   */
  public function setIdentifier($identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return string
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param string
   */
  public function setOauthConsumerKey($oauthConsumerKey)
  {
    $this->oauthConsumerKey = $oauthConsumerKey;
  }
  /**
   * @return string
   */
  public function getOauthConsumerKey()
  {
    return $this->oauthConsumerKey;
  }
  /**
   * @param string
   */
  public function setOauthScope($oauthScope)
  {
    $this->oauthScope = $oauthScope;
  }
  /**
   * @return string
   */
  public function getOauthScope()
  {
    return $this->oauthScope;
  }
  /**
   * @param string
   */
  public function setOpenidRealm($openidRealm)
  {
    $this->openidRealm = $openidRealm;
  }
  /**
   * @return string
   */
  public function getOpenidRealm()
  {
    return $this->openidRealm;
  }
  /**
   * @param string
   */
  public function setOtaApp($otaApp)
  {
    $this->otaApp = $otaApp;
  }
  /**
   * @return string
   */
  public function getOtaApp()
  {
    return $this->otaApp;
  }
  /**
   * @param string
   */
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return string
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
  /**
   * @param string
   */
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  /**
   * @return string
   */
  public function getSessionId()
  {
    return $this->sessionId;
  }
  /**
   * @param string
   */
  public function setTenantId($tenantId)
  {
    $this->tenantId = $tenantId;
  }
  /**
   * @return string
   */
  public function getTenantId()
  {
    return $this->tenantId;
  }
  /**
   * @param string
   */
  public function setTenantProjectNumber($tenantProjectNumber)
  {
    $this->tenantProjectNumber = $tenantProjectNumber;
  }
  /**
   * @return string
   */
  public function getTenantProjectNumber()
  {
    return $this->tenantProjectNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartyCreateAuthUriRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest');
