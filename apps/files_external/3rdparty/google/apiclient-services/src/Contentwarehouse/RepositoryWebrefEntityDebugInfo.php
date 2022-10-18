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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefEntityDebugInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $containsRestrictedData;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $language;
  public $score;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $url;

  /**
   * @param bool
   */
  public function setContainsRestrictedData($containsRestrictedData)
  {
    $this->containsRestrictedData = $containsRestrictedData;
  }
  /**
   * @return bool
   */
  public function getContainsRestrictedData()
  {
    return $this->containsRestrictedData;
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
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
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
class_alias(RepositoryWebrefEntityDebugInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityDebugInfo');
