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

namespace Google\Service\Blogger;

class BlogPerUserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $blogId;
  /**
   * @var bool
   */
  public $hasAdminAccess;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $photosAlbumKey;
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param string
   */
  public function setBlogId($blogId)
  {
    $this->blogId = $blogId;
  }
  /**
   * @return string
   */
  public function getBlogId()
  {
    return $this->blogId;
  }
  /**
   * @param bool
   */
  public function setHasAdminAccess($hasAdminAccess)
  {
    $this->hasAdminAccess = $hasAdminAccess;
  }
  /**
   * @return bool
   */
  public function getHasAdminAccess()
  {
    return $this->hasAdminAccess;
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
   * @param string
   */
  public function setPhotosAlbumKey($photosAlbumKey)
  {
    $this->photosAlbumKey = $photosAlbumKey;
  }
  /**
   * @return string
   */
  public function getPhotosAlbumKey()
  {
    return $this->photosAlbumKey;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
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
class_alias(BlogPerUserInfo::class, 'Google_Service_Blogger_BlogPerUserInfo');
