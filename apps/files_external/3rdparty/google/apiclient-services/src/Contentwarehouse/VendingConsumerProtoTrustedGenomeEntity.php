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

class VendingConsumerProtoTrustedGenomeEntity extends \Google\Model
{
  /**
   * @var string
   */
  public $categoryId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $level;
  /**
   * @var string
   */
  public $queryText;
  /**
   * @var float
   */
  public $score;
  /**
   * @var string
   */
  public $title;
  /**
   * @var bool
   */
  public $userVisible;

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
   * @param int
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return int
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param string
   */
  public function setQueryText($queryText)
  {
    $this->queryText = $queryText;
  }
  /**
   * @return string
   */
  public function getQueryText()
  {
    return $this->queryText;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
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
   * @param bool
   */
  public function setUserVisible($userVisible)
  {
    $this->userVisible = $userVisible;
  }
  /**
   * @return bool
   */
  public function getUserVisible()
  {
    return $this->userVisible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VendingConsumerProtoTrustedGenomeEntity::class, 'Google_Service_Contentwarehouse_VendingConsumerProtoTrustedGenomeEntity');
