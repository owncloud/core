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

class IdentitytoolkitRelyingpartyVerifyAssertionRequest extends \Google\Model
{
  /**
   * @var bool
   */
  public $autoCreate;
  /**
   * @var string
   */
  public $delegatedProjectNumber;
  /**
   * @var string
   */
  public $idToken;
  /**
   * @var string
   */
  public $instanceId;
  /**
   * @var string
   */
  public $pendingIdToken;
  /**
   * @var string
   */
  public $postBody;
  /**
   * @var string
   */
  public $requestUri;
  /**
   * @var bool
   */
  public $returnIdpCredential;
  /**
   * @var bool
   */
  public $returnRefreshToken;
  /**
   * @var bool
   */
  public $returnSecureToken;
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
   * @param bool
   */
  public function setAutoCreate($autoCreate)
  {
    $this->autoCreate = $autoCreate;
  }
  /**
   * @return bool
   */
  public function getAutoCreate()
  {
    return $this->autoCreate;
  }
  /**
   * @param string
   */
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  /**
   * @return string
   */
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  /**
   * @param string
   */
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  /**
   * @return string
   */
  public function getIdToken()
  {
    return $this->idToken;
  }
  /**
   * @param string
   */
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  /**
   * @return string
   */
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  /**
   * @param string
   */
  public function setPendingIdToken($pendingIdToken)
  {
    $this->pendingIdToken = $pendingIdToken;
  }
  /**
   * @return string
   */
  public function getPendingIdToken()
  {
    return $this->pendingIdToken;
  }
  /**
   * @param string
   */
  public function setPostBody($postBody)
  {
    $this->postBody = $postBody;
  }
  /**
   * @return string
   */
  public function getPostBody()
  {
    return $this->postBody;
  }
  /**
   * @param string
   */
  public function setRequestUri($requestUri)
  {
    $this->requestUri = $requestUri;
  }
  /**
   * @return string
   */
  public function getRequestUri()
  {
    return $this->requestUri;
  }
  /**
   * @param bool
   */
  public function setReturnIdpCredential($returnIdpCredential)
  {
    $this->returnIdpCredential = $returnIdpCredential;
  }
  /**
   * @return bool
   */
  public function getReturnIdpCredential()
  {
    return $this->returnIdpCredential;
  }
  /**
   * @param bool
   */
  public function setReturnRefreshToken($returnRefreshToken)
  {
    $this->returnRefreshToken = $returnRefreshToken;
  }
  /**
   * @return bool
   */
  public function getReturnRefreshToken()
  {
    return $this->returnRefreshToken;
  }
  /**
   * @param bool
   */
  public function setReturnSecureToken($returnSecureToken)
  {
    $this->returnSecureToken = $returnSecureToken;
  }
  /**
   * @return bool
   */
  public function getReturnSecureToken()
  {
    return $this->returnSecureToken;
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
class_alias(IdentitytoolkitRelyingpartyVerifyAssertionRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest');
