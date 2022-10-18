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

class KnowledgeAnswersIntentQueryImpliedEntity extends \Google\Model
{
  /**
   * @var string
   */
  public $annotatedSpan;
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var bool
   */
  public $isUngroundedValue;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var float
   */
  public $qrefConfidenceScore;
  protected $shoppingIdsType = KnowledgeAnswersIntentQueryShoppingIds::class;
  protected $shoppingIdsDataType = '';

  /**
   * @param string
   */
  public function setAnnotatedSpan($annotatedSpan)
  {
    $this->annotatedSpan = $annotatedSpan;
  }
  /**
   * @return string
   */
  public function getAnnotatedSpan()
  {
    return $this->annotatedSpan;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param bool
   */
  public function setIsUngroundedValue($isUngroundedValue)
  {
    $this->isUngroundedValue = $isUngroundedValue;
  }
  /**
   * @return bool
   */
  public function getIsUngroundedValue()
  {
    return $this->isUngroundedValue;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param float
   */
  public function setQrefConfidenceScore($qrefConfidenceScore)
  {
    $this->qrefConfidenceScore = $qrefConfidenceScore;
  }
  /**
   * @return float
   */
  public function getQrefConfidenceScore()
  {
    return $this->qrefConfidenceScore;
  }
  /**
   * @param KnowledgeAnswersIntentQueryShoppingIds
   */
  public function setShoppingIds(KnowledgeAnswersIntentQueryShoppingIds $shoppingIds)
  {
    $this->shoppingIds = $shoppingIds;
  }
  /**
   * @return KnowledgeAnswersIntentQueryShoppingIds
   */
  public function getShoppingIds()
  {
    return $this->shoppingIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryImpliedEntity::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryImpliedEntity');
