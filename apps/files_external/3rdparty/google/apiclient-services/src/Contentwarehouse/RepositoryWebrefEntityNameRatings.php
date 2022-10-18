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

class RepositoryWebrefEntityNameRatings extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $name;
  protected $ratingsType = RepositoryWebrefEntityNameRatingsEntityNameRating::class;
  protected $ratingsDataType = 'array';
  /**
   * @var string[]
   */
  public $tags;

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
   * @param RepositoryWebrefEntityNameRatingsEntityNameRating[]
   */
  public function setRatings($ratings)
  {
    $this->ratings = $ratings;
  }
  /**
   * @return RepositoryWebrefEntityNameRatingsEntityNameRating[]
   */
  public function getRatings()
  {
    return $this->ratings;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEntityNameRatings::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityNameRatings');
