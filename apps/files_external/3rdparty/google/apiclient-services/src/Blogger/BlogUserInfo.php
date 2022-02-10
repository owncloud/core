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

class BlogUserInfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "blogUserInfo" => "blog_user_info",
  ];
  protected $blogType = Blog::class;
  protected $blogDataType = '';
  protected $blogUserInfoType = BlogPerUserInfo::class;
  protected $blogUserInfoDataType = '';
  /**
   * @var string
   */
  public $kind;

  /**
   * @param Blog
   */
  public function setBlog(Blog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return Blog
   */
  public function getBlog()
  {
    return $this->blog;
  }
  /**
   * @param BlogPerUserInfo
   */
  public function setBlogUserInfo(BlogPerUserInfo $blogUserInfo)
  {
    $this->blogUserInfo = $blogUserInfo;
  }
  /**
   * @return BlogPerUserInfo
   */
  public function getBlogUserInfo()
  {
    return $this->blogUserInfo;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BlogUserInfo::class, 'Google_Service_Blogger_BlogUserInfo');
