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

namespace Google\Service\Drive;

class User extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $emailAddress;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $me;
  /**
   * @var string
   */
  public $permissionId;
  /**
   * @var string
   */
  public $photoLink;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return string
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param bool
   */
  public function setMe($me)
  {
    $this->me = $me;
  }
  /**
   * @return bool
   */
  public function getMe()
  {
    return $this->me;
  }
  /**
   * @param string
   */
  public function setPermissionId($permissionId)
  {
    $this->permissionId = $permissionId;
  }
  /**
   * @return string
   */
  public function getPermissionId()
  {
    return $this->permissionId;
  }
  /**
   * @param string
   */
  public function setPhotoLink($photoLink)
  {
    $this->photoLink = $photoLink;
  }
  /**
   * @return string
   */
  public function getPhotoLink()
  {
    return $this->photoLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(User::class, 'Google_Service_Drive_User');
