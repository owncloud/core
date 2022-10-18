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

class KnowledgeAnswersNumberType extends \Google\Collection
{
  protected $collection_key = 'subType';
  /**
   * @var bool
   */
  public $keepAsString;
  protected $rangeConstraintType = KnowledgeAnswersRangeConstraint::class;
  protected $rangeConstraintDataType = '';
  protected $remodelingsType = NlpMeaningMeaningRemodelings::class;
  protected $remodelingsDataType = '';
  /**
   * @var string[]
   */
  public $subType;

  /**
   * @param bool
   */
  public function setKeepAsString($keepAsString)
  {
    $this->keepAsString = $keepAsString;
  }
  /**
   * @return bool
   */
  public function getKeepAsString()
  {
    return $this->keepAsString;
  }
  /**
   * @param KnowledgeAnswersRangeConstraint
   */
  public function setRangeConstraint(KnowledgeAnswersRangeConstraint $rangeConstraint)
  {
    $this->rangeConstraint = $rangeConstraint;
  }
  /**
   * @return KnowledgeAnswersRangeConstraint
   */
  public function getRangeConstraint()
  {
    return $this->rangeConstraint;
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
   * @param string[]
   */
  public function setSubType($subType)
  {
    $this->subType = $subType;
  }
  /**
   * @return string[]
   */
  public function getSubType()
  {
    return $this->subType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersNumberType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersNumberType');
