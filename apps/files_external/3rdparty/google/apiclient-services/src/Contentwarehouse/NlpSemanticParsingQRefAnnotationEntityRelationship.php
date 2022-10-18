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

class NlpSemanticParsingQRefAnnotationEntityRelationship extends \Google\Collection
{
  protected $collection_key = 'linkPropertyName';
  /**
   * @var int
   */
  public $entityIndex;
  /**
   * @var bool
   */
  public $impliedBy;
  /**
   * @var bool
   */
  public $implies;
  /**
   * @var string[]
   */
  public $linkPropertyName;

  /**
   * @param int
   */
  public function setEntityIndex($entityIndex)
  {
    $this->entityIndex = $entityIndex;
  }
  /**
   * @return int
   */
  public function getEntityIndex()
  {
    return $this->entityIndex;
  }
  /**
   * @param bool
   */
  public function setImpliedBy($impliedBy)
  {
    $this->impliedBy = $impliedBy;
  }
  /**
   * @return bool
   */
  public function getImpliedBy()
  {
    return $this->impliedBy;
  }
  /**
   * @param bool
   */
  public function setImplies($implies)
  {
    $this->implies = $implies;
  }
  /**
   * @return bool
   */
  public function getImplies()
  {
    return $this->implies;
  }
  /**
   * @param string[]
   */
  public function setLinkPropertyName($linkPropertyName)
  {
    $this->linkPropertyName = $linkPropertyName;
  }
  /**
   * @return string[]
   */
  public function getLinkPropertyName()
  {
    return $this->linkPropertyName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingQRefAnnotationEntityRelationship::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingQRefAnnotationEntityRelationship');
