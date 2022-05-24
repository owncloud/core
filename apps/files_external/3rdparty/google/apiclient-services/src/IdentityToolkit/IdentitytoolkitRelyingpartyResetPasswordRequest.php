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

class IdentitytoolkitRelyingpartyResetPasswordRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $newPassword;
  /**
   * @var string
   */
  public $oldPassword;
  /**
   * @var string
   */
  public $oobCode;

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
   * @param string
   */
  public function setNewPassword($newPassword)
  {
    $this->newPassword = $newPassword;
  }
  /**
   * @return string
   */
  public function getNewPassword()
  {
    return $this->newPassword;
  }
  /**
   * @param string
   */
  public function setOldPassword($oldPassword)
  {
    $this->oldPassword = $oldPassword;
  }
  /**
   * @return string
   */
  public function getOldPassword()
  {
    return $this->oldPassword;
  }
  /**
   * @param string
   */
  public function setOobCode($oobCode)
  {
    $this->oobCode = $oobCode;
  }
  /**
   * @return string
   */
  public function getOobCode()
  {
    return $this->oobCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartyResetPasswordRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest');
