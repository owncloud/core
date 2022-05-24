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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1ExchangeTokenRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $audience;
  /**
   * @var string
   */
  public $grantType;
  /**
   * @var string
   */
  public $options;
  /**
   * @var string
   */
  public $requestedTokenType;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $subjectToken;
  /**
   * @var string
   */
  public $subjectTokenType;

  /**
   * @param string
   */
  public function setAudience($audience)
  {
    $this->audience = $audience;
  }
  /**
   * @return string
   */
  public function getAudience()
  {
    return $this->audience;
  }
  /**
   * @param string
   */
  public function setGrantType($grantType)
  {
    $this->grantType = $grantType;
  }
  /**
   * @return string
   */
  public function getGrantType()
  {
    return $this->grantType;
  }
  /**
   * @param string
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return string
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setRequestedTokenType($requestedTokenType)
  {
    $this->requestedTokenType = $requestedTokenType;
  }
  /**
   * @return string
   */
  public function getRequestedTokenType()
  {
    return $this->requestedTokenType;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param string
   */
  public function setSubjectToken($subjectToken)
  {
    $this->subjectToken = $subjectToken;
  }
  /**
   * @return string
   */
  public function getSubjectToken()
  {
    return $this->subjectToken;
  }
  /**
   * @param string
   */
  public function setSubjectTokenType($subjectTokenType)
  {
    $this->subjectTokenType = $subjectTokenType;
  }
  /**
   * @return string
   */
  public function getSubjectTokenType()
  {
    return $this->subjectTokenType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1ExchangeTokenRequest::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenRequest');
