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

class PostPerUserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $blogId;
  /**
   * @var bool
   */
  public $hasEditAccess;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $postId;
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
  public function setHasEditAccess($hasEditAccess)
  {
    $this->hasEditAccess = $hasEditAccess;
  }
  /**
   * @return bool
   */
  public function getHasEditAccess()
  {
    return $this->hasEditAccess;
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
  public function setPostId($postId)
  {
    $this->postId = $postId;
  }
  /**
   * @return string
   */
  public function getPostId()
  {
    return $this->postId;
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
class_alias(PostPerUserInfo::class, 'Google_Service_Blogger_PostPerUserInfo');
