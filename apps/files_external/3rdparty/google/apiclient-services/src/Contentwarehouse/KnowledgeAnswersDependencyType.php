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

class KnowledgeAnswersDependencyType extends \Google\Model
{
  protected $containerTypeType = KnowledgeAnswersContainerType::class;
  protected $containerTypeDataType = '';
  protected $intersectTypeType = KnowledgeAnswersIntersectType::class;
  protected $intersectTypeDataType = '';
  protected $remodelingsType = NlpMeaningMeaningRemodelings::class;
  protected $remodelingsDataType = '';
  protected $sameTypeType = KnowledgeAnswersSameType::class;
  protected $sameTypeDataType = '';
  protected $unionTypeType = KnowledgeAnswersUnionType::class;
  protected $unionTypeDataType = '';

  /**
   * @param KnowledgeAnswersContainerType
   */
  public function setContainerType(KnowledgeAnswersContainerType $containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return KnowledgeAnswersContainerType
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param KnowledgeAnswersIntersectType
   */
  public function setIntersectType(KnowledgeAnswersIntersectType $intersectType)
  {
    $this->intersectType = $intersectType;
  }
  /**
   * @return KnowledgeAnswersIntersectType
   */
  public function getIntersectType()
  {
    return $this->intersectType;
  }
  /**
   * @param NlpMeaningMeaningRemodelings
   */
  public function setRemodelings(NlpMeaningMeaningRemodelings $remodelings)
  {
    $this->remodelings = $remodelings;
  }
  /**
   * @return NlpMeaningMeaningRemodelings
   */
  public function getRemodelings()
  {
    return $this->remodelings;
  }
  /**
   * @param KnowledgeAnswersSameType
   */
  public function setSameType(KnowledgeAnswersSameType $sameType)
  {
    $this->sameType = $sameType;
  }
  /**
   * @return KnowledgeAnswersSameType
   */
  public function getSameType()
  {
    return $this->sameType;
  }
  /**
   * @param KnowledgeAnswersUnionType
   */
  public function setUnionType(KnowledgeAnswersUnionType $unionType)
  {
    $this->unionType = $unionType;
  }
  /**
   * @return KnowledgeAnswersUnionType
   */
  public function getUnionType()
  {
    return $this->unionType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersDependencyType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersDependencyType');
