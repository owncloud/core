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

class CopleySubreferenceReference extends \Google\Collection
{
  protected $collection_key = 'personalReferenceTypes';
  /**
   * @var string[]
   */
  public $personalReferenceTypes;
  /**
   * @var float
   */
  public $referenceScore;
  protected $relationshipLexicalInfoType = CopleyLexicalMetadata::class;
  protected $relationshipLexicalInfoDataType = '';

  /**
   * @param string[]
   */
  public function setPersonalReferenceTypes($personalReferenceTypes)
  {
    $this->personalReferenceTypes = $personalReferenceTypes;
  }
  /**
   * @return string[]
   */
  public function getPersonalReferenceTypes()
  {
    return $this->personalReferenceTypes;
  }
  /**
   * @param float
   */
  public function setReferenceScore($referenceScore)
  {
    $this->referenceScore = $referenceScore;
  }
  /**
   * @return float
   */
  public function getReferenceScore()
  {
    return $this->referenceScore;
  }
  /**
   * @param CopleyLexicalMetadata
   */
  public function setRelationshipLexicalInfo(CopleyLexicalMetadata $relationshipLexicalInfo)
  {
    $this->relationshipLexicalInfo = $relationshipLexicalInfo;
  }
  /**
   * @return CopleyLexicalMetadata
   */
  public function getRelationshipLexicalInfo()
  {
    return $this->relationshipLexicalInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CopleySubreferenceReference::class, 'Google_Service_Contentwarehouse_CopleySubreferenceReference');
