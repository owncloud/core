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

class KnowledgeAnswersIntentQueryPersonalEntity extends \Google\Collection
{
  protected $collection_key = 'personalEntityChild';
  /**
   * @var string
   */
  public $attributeId;
  protected $entityRelationshipType = KnowledgeAnswersIntentQueryPersonalEntityEntityRelationship::class;
  protected $entityRelationshipDataType = 'array';
  /**
   * @var string
   */
  public $freebaseMid;
  protected $personalEntityChildType = KnowledgeAnswersIntentQueryPersonalEntity::class;
  protected $personalEntityChildDataType = 'array';

  /**
   * @param string
   */
  public function setAttributeId($attributeId)
  {
    $this->attributeId = $attributeId;
  }
  /**
   * @return string
   */
  public function getAttributeId()
  {
    return $this->attributeId;
  }
  /**
   * @param KnowledgeAnswersIntentQueryPersonalEntityEntityRelationship[]
   */
  public function setEntityRelationship($entityRelationship)
  {
    $this->entityRelationship = $entityRelationship;
  }
  /**
   * @return KnowledgeAnswersIntentQueryPersonalEntityEntityRelationship[]
   */
  public function getEntityRelationship()
  {
    return $this->entityRelationship;
  }
  /**
   * @param string
   */
  public function setFreebaseMid($freebaseMid)
  {
    $this->freebaseMid = $freebaseMid;
  }
  /**
   * @return string
   */
  public function getFreebaseMid()
  {
    return $this->freebaseMid;
  }
  /**
   * @param KnowledgeAnswersIntentQueryPersonalEntity[]
   */
  public function setPersonalEntityChild($personalEntityChild)
  {
    $this->personalEntityChild = $personalEntityChild;
  }
  /**
   * @return KnowledgeAnswersIntentQueryPersonalEntity[]
   */
  public function getPersonalEntityChild()
  {
    return $this->personalEntityChild;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryPersonalEntity::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryPersonalEntity');
