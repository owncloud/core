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

class KnowledgeAnswersIntentQueryCollectionMembership extends \Google\Collection
{
  protected $collection_key = 'score';
  /**
   * @var string
   */
  public $collectionId;
  /**
   * @var string
   */
  public $collectionMid;
  /**
   * @var float
   */
  public $collectionScore;
  protected $scoreType = KnowledgeAnswersIntentQueryCollectionScore::class;
  protected $scoreDataType = 'array';

  /**
   * @param string
   */
  public function setCollectionId($collectionId)
  {
    $this->collectionId = $collectionId;
  }
  /**
   * @return string
   */
  public function getCollectionId()
  {
    return $this->collectionId;
  }
  /**
   * @param string
   */
  public function setCollectionMid($collectionMid)
  {
    $this->collectionMid = $collectionMid;
  }
  /**
   * @return string
   */
  public function getCollectionMid()
  {
    return $this->collectionMid;
  }
  /**
   * @param float
   */
  public function setCollectionScore($collectionScore)
  {
    $this->collectionScore = $collectionScore;
  }
  /**
   * @return float
   */
  public function getCollectionScore()
  {
    return $this->collectionScore;
  }
  /**
   * @param KnowledgeAnswersIntentQueryCollectionScore[]
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return KnowledgeAnswersIntentQueryCollectionScore[]
   */
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryCollectionMembership::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryCollectionMembership');
