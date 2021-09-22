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

namespace Google\Service\CloudHealthcare;

class EntityMention extends \Google\Collection
{
  protected $collection_key = 'linkedEntities';
  protected $certaintyAssessmentType = Feature::class;
  protected $certaintyAssessmentDataType = '';
  public $confidence;
  protected $linkedEntitiesType = LinkedEntity::class;
  protected $linkedEntitiesDataType = 'array';
  public $mentionId;
  protected $subjectType = Feature::class;
  protected $subjectDataType = '';
  protected $temporalAssessmentType = Feature::class;
  protected $temporalAssessmentDataType = '';
  protected $textType = TextSpan::class;
  protected $textDataType = '';
  public $type;

  /**
   * @param Feature
   */
  public function setCertaintyAssessment(Feature $certaintyAssessment)
  {
    $this->certaintyAssessment = $certaintyAssessment;
  }
  /**
   * @return Feature
   */
  public function getCertaintyAssessment()
  {
    return $this->certaintyAssessment;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param LinkedEntity[]
   */
  public function setLinkedEntities($linkedEntities)
  {
    $this->linkedEntities = $linkedEntities;
  }
  /**
   * @return LinkedEntity[]
   */
  public function getLinkedEntities()
  {
    return $this->linkedEntities;
  }
  public function setMentionId($mentionId)
  {
    $this->mentionId = $mentionId;
  }
  public function getMentionId()
  {
    return $this->mentionId;
  }
  /**
   * @param Feature
   */
  public function setSubject(Feature $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Feature
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param Feature
   */
  public function setTemporalAssessment(Feature $temporalAssessment)
  {
    $this->temporalAssessment = $temporalAssessment;
  }
  /**
   * @return Feature
   */
  public function getTemporalAssessment()
  {
    return $this->temporalAssessment;
  }
  /**
   * @param TextSpan
   */
  public function setText(TextSpan $text)
  {
    $this->text = $text;
  }
  /**
   * @return TextSpan
   */
  public function getText()
  {
    return $this->text;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EntityMention::class, 'Google_Service_CloudHealthcare_EntityMention');
