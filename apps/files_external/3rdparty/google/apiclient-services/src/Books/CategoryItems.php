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

namespace Google\Service\Books;

class CategoryItems extends \Google\Model
{
  /**
   * @var string
   */
  public $badgeUrl;
  /**
   * @var string
   */
  public $categoryId;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setBadgeUrl($badgeUrl)
  {
    $this->badgeUrl = $badgeUrl;
  }
  /**
   * @return string
   */
  public function getBadgeUrl()
  {
    return $this->badgeUrl;
  }
  /**
   * @param string
   */
  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }
  /**
   * @return string
   */
  public function getCategoryId()
  {
    return $this->categoryId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CategoryItems::class, 'Google_Service_Books_CategoryItems');
