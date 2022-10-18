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

namespace Google\Service\CloudSearch;

class UserMentionData extends \Google\Model
{
  /**
   * @var string
   */
  public $email;
  protected $userType = PrincipalProto::class;
  protected $userDataType = '';
  /**
   * @var string
   */
  public $userGaiaId;
  /**
   * @var string
   */
  public $userId;

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
   * @param PrincipalProto
   */
  public function setUser(PrincipalProto $user)
  {
    $this->user = $user;
  }
  /**
   * @return PrincipalProto
   */
  public function getUser()
  {
    return $this->user;
  }
  /**
   * @param string
   */
  public function setUserGaiaId($userGaiaId)
  {
    $this->userGaiaId = $userGaiaId;
  }
  /**
   * @return string
   */
  public function getUserGaiaId()
  {
    return $this->userGaiaId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserMentionData::class, 'Google_Service_CloudSearch_UserMentionData');
