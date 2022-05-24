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

class IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $code;
  /**
   * @var string
   */
  public $idToken;
  /**
   * @var string
   */
  public $operation;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $sessionInfo;
  /**
   * @var string
   */
  public $temporaryProof;
  /**
   * @var string
   */
  public $verificationProof;

  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
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
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return string
   */
  public function getOperation()
  {
    return $this->operation;
  }
  /**
   * @param string
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setSessionInfo($sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return string
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
  /**
   * @param string
   */
  public function setTemporaryProof($temporaryProof)
  {
    $this->temporaryProof = $temporaryProof;
  }
  /**
   * @return string
   */
  public function getTemporaryProof()
  {
    return $this->temporaryProof;
  }
  /**
   * @param string
   */
  public function setVerificationProof($verificationProof)
  {
    $this->verificationProof = $verificationProof;
  }
  /**
   * @return string
   */
  public function getVerificationProof()
  {
    return $this->verificationProof;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest');
