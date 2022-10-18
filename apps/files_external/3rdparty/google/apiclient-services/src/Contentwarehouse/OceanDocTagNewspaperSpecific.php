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

class OceanDocTagNewspaperSpecific extends \Google\Model
{
  /**
   * @var string
   */
  public $articleRollCoords;
  public $newspaperDate;
  /**
   * @var string
   */
  public $newspaperName;
  /**
   * @var string
   */
  public $newspaperUrl;
  /**
   * @var string
   */
  public $publicationDate;
  /**
   * @var string
   */
  public $publisher;

  /**
   * @param string
   */
  public function setArticleRollCoords($articleRollCoords)
  {
    $this->articleRollCoords = $articleRollCoords;
  }
  /**
   * @return string
   */
  public function getArticleRollCoords()
  {
    return $this->articleRollCoords;
  }
  public function setNewspaperDate($newspaperDate)
  {
    $this->newspaperDate = $newspaperDate;
  }
  public function getNewspaperDate()
  {
    return $this->newspaperDate;
  }
  /**
   * @param string
   */
  public function setNewspaperName($newspaperName)
  {
    $this->newspaperName = $newspaperName;
  }
  /**
   * @return string
   */
  public function getNewspaperName()
  {
    return $this->newspaperName;
  }
  /**
   * @param string
   */
  public function setNewspaperUrl($newspaperUrl)
  {
    $this->newspaperUrl = $newspaperUrl;
  }
  /**
   * @return string
   */
  public function getNewspaperUrl()
  {
    return $this->newspaperUrl;
  }
  /**
   * @param string
   */
  public function setPublicationDate($publicationDate)
  {
    $this->publicationDate = $publicationDate;
  }
  /**
   * @return string
   */
  public function getPublicationDate()
  {
    return $this->publicationDate;
  }
  /**
   * @param string
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return string
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanDocTagNewspaperSpecific::class, 'Google_Service_Contentwarehouse_OceanDocTagNewspaperSpecific');
