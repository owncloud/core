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

namespace Google\Service\MyBusinessVerifications;

class EmailVerificationData extends \Google\Model
{
  /**
   * @var string
   */
  public $domain;
  /**
   * @var bool
   */
  public $isUserNameEditable;
  /**
   * @var string
   */
  public $user;

  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param bool
   */
  public function setIsUserNameEditable($isUserNameEditable)
  {
    $this->isUserNameEditable = $isUserNameEditable;
  }
  /**
   * @return bool
   */
  public function getIsUserNameEditable()
  {
    return $this->isUserNameEditable;
  }
  /**
   * @param string
   */
  public function setUser($user)
  {
    $this->user = $user;
  }
  /**
   * @return string
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmailVerificationData::class, 'Google_Service_MyBusinessVerifications_EmailVerificationData');
