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

namespace Google\Service\MyBusinessQA;

class Question extends \Google\Collection
{
  protected $collection_key = 'topAnswers';
  protected $authorType = Author::class;
  protected $authorDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $text;
  protected $topAnswersType = Answer::class;
  protected $topAnswersDataType = 'array';
  /**
   * @var int
   */
  public $totalAnswerCount;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var int
   */
  public $upvoteCount;

  /**
   * @param Author
   */
  public function setAuthor(Author $author)
  {
    $this->author = $author;
  }
  /**
   * @return Author
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param Answer[]
   */
  public function setTopAnswers($topAnswers)
  {
    $this->topAnswers = $topAnswers;
  }
  /**
   * @return Answer[]
   */
  public function getTopAnswers()
  {
    return $this->topAnswers;
  }
  /**
   * @param int
   */
  public function setTotalAnswerCount($totalAnswerCount)
  {
    $this->totalAnswerCount = $totalAnswerCount;
  }
  /**
   * @return int
   */
  public function getTotalAnswerCount()
  {
    return $this->totalAnswerCount;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param int
   */
  public function setUpvoteCount($upvoteCount)
  {
    $this->upvoteCount = $upvoteCount;
  }
  /**
   * @return int
   */
  public function getUpvoteCount()
  {
    return $this->upvoteCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Question::class, 'Google_Service_MyBusinessQA_Question');
