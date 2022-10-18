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

class RepositoryWebrefMentionRatingsSingleMentionRating extends \Google\Collection
{
  protected $collection_key = 'topicMentionedInResult';
  /**
   * @var bool
   */
  public $isCorrectRange;
  /**
   * @var string
   */
  public $mentionMatch;
  /**
   * @var string
   */
  public $mentionRelevant;
  /**
   * @var string
   */
  public $phraseRefer;
  /**
   * @var bool
   */
  public $raterCanUnderstandTopic;
  /**
   * @var string
   */
  public $ratingSource;
  /**
   * @var int
   */
  public $resultCount;
  protected $taskDataType = RepositoryWebrefTaskData::class;
  protected $taskDataDataType = '';
  /**
   * @var string[]
   */
  public $topicMentionedInResult;

  /**
   * @param bool
   */
  public function setIsCorrectRange($isCorrectRange)
  {
    $this->isCorrectRange = $isCorrectRange;
  }
  /**
   * @return bool
   */
  public function getIsCorrectRange()
  {
    return $this->isCorrectRange;
  }
  /**
   * @param string
   */
  public function setMentionMatch($mentionMatch)
  {
    $this->mentionMatch = $mentionMatch;
  }
  /**
   * @return string
   */
  public function getMentionMatch()
  {
    return $this->mentionMatch;
  }
  /**
   * @param string
   */
  public function setMentionRelevant($mentionRelevant)
  {
    $this->mentionRelevant = $mentionRelevant;
  }
  /**
   * @return string
   */
  public function getMentionRelevant()
  {
    return $this->mentionRelevant;
  }
  /**
   * @param string
   */
  public function setPhraseRefer($phraseRefer)
  {
    $this->phraseRefer = $phraseRefer;
  }
  /**
   * @return string
   */
  public function getPhraseRefer()
  {
    return $this->phraseRefer;
  }
  /**
   * @param bool
   */
  public function setRaterCanUnderstandTopic($raterCanUnderstandTopic)
  {
    $this->raterCanUnderstandTopic = $raterCanUnderstandTopic;
  }
  /**
   * @return bool
   */
  public function getRaterCanUnderstandTopic()
  {
    return $this->raterCanUnderstandTopic;
  }
  /**
   * @param string
   */
  public function setRatingSource($ratingSource)
  {
    $this->ratingSource = $ratingSource;
  }
  /**
   * @return string
   */
  public function getRatingSource()
  {
    return $this->ratingSource;
  }
  /**
   * @param int
   */
  public function setResultCount($resultCount)
  {
    $this->resultCount = $resultCount;
  }
  /**
   * @return int
   */
  public function getResultCount()
  {
    return $this->resultCount;
  }
  /**
   * @param RepositoryWebrefTaskData
   */
  public function setTaskData(RepositoryWebrefTaskData $taskData)
  {
    $this->taskData = $taskData;
  }
  /**
   * @return RepositoryWebrefTaskData
   */
  public function getTaskData()
  {
    return $this->taskData;
  }
  /**
   * @param string[]
   */
  public function setTopicMentionedInResult($topicMentionedInResult)
  {
    $this->topicMentionedInResult = $topicMentionedInResult;
  }
  /**
   * @return string[]
   */
  public function getTopicMentionedInResult()
  {
    return $this->topicMentionedInResult;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMentionRatingsSingleMentionRating::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMentionRatingsSingleMentionRating');
