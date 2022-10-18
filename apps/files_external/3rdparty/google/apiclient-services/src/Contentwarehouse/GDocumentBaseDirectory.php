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

class GDocumentBaseDirectory extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "category" => "Category",
        "description" => "Description",
        "descriptionScore" => "DescriptionScore",
        "identifier" => "Identifier",
        "language" => "Language",
        "title" => "Title",
        "titleScore" => "TitleScore",
        "uRL" => "URL",
  ];
  /**
   * @var string
   */
  public $category;
  /**
   * @var string
   */
  public $description;
  /**
   * @var float
   */
  public $descriptionScore;
  /**
   * @var string
   */
  public $identifier;
  /**
   * @var int
   */
  public $language;
  /**
   * @var string
   */
  public $title;
  /**
   * @var float
   */
  public $titleScore;
  /**
   * @var string
   */
  public $uRL;

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
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
   * @param float
   */
  public function setDescriptionScore($descriptionScore)
  {
    $this->descriptionScore = $descriptionScore;
  }
  /**
   * @return float
   */
  public function getDescriptionScore()
  {
    return $this->descriptionScore;
  }
  /**
   * @param string
   */
  public function setIdentifier($identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return string
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
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
   * @param float
   */
  public function setTitleScore($titleScore)
  {
    $this->titleScore = $titleScore;
  }
  /**
   * @return float
   */
  public function getTitleScore()
  {
    return $this->titleScore;
  }
  /**
   * @param string
   */
  public function setURL($uRL)
  {
    $this->uRL = $uRL;
  }
  /**
   * @return string
   */
  public function getURL()
  {
    return $this->uRL;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GDocumentBaseDirectory::class, 'Google_Service_Contentwarehouse_GDocumentBaseDirectory');
