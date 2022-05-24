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

class Blog extends \Google\Model
{
  /**
   * @var string
   */
  public $customMetaData;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $localeType = BlogLocale::class;
  protected $localeDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pagesType = BlogPages::class;
  protected $pagesDataType = '';
  protected $postsType = BlogPosts::class;
  protected $postsDataType = '';
  /**
   * @var string
   */
  public $published;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  /**
   * @return string
   */
  public function getCustomMetaData()
  {
    return $this->customMetaData;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param BlogLocale
   */
  public function setLocale(BlogLocale $locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return BlogLocale
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param BlogPages
   */
  public function setPages(BlogPages $pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return BlogPages
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param BlogPosts
   */
  public function setPosts(BlogPosts $posts)
  {
    $this->posts = $posts;
  }
  /**
   * @return BlogPosts
   */
  public function getPosts()
  {
    return $this->posts;
  }
  /**
   * @param string
   */
  public function setPublished($published)
  {
    $this->published = $published;
  }
  /**
   * @return string
   */
  public function getPublished()
  {
    return $this->published;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Blog::class, 'Google_Service_Blogger_Blog');
