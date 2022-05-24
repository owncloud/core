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

namespace Google\Service\Oauth2;

class Tokeninfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "expiresIn" => "expires_in",
        "issuedTo" => "issued_to",
        "userId" => "user_id",
        "verifiedEmail" => "verified_email",
  ];
  /**
   * @var string
   */
  public $audience;
  /**
   * @var string
   */
  public $email;
  /**
   * @var int
   */
  public $expiresIn;
  /**
   * @var string
   */
  public $issuedTo;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $userId;
  /**
   * @var bool
   */
  public $verifiedEmail;

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
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param int
   */
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  /**
   * @return int
   */
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  /**
   * @param string
   */
  public function setIssuedTo($issuedTo)
  {
    $this->issuedTo = $issuedTo;
  }
  /**
   * @return string
   */
  public function getIssuedTo()
  {
    return $this->issuedTo;
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
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
  /**
   * @param bool
   */
  public function setVerifiedEmail($verifiedEmail)
  {
    $this->verifiedEmail = $verifiedEmail;
  }
  /**
   * @return bool
   */
  public function getVerifiedEmail()
  {
    return $this->verifiedEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tokeninfo::class, 'Google_Service_Oauth2_Tokeninfo');
