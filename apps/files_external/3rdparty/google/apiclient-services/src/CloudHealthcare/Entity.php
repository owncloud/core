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

class Entity extends \Google\Collection
{
  protected $collection_key = 'vocabularyCodes';
  /**
   * @var string
   */
  public $entityId;
  /**
   * @var string
   */
  public $preferredTerm;
  /**
   * @var string[]
   */
  public $vocabularyCodes;

  /**
   * @param string
   */
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return string
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
  /**
   * @param string
   */
  public function setPreferredTerm($preferredTerm)
  {
    $this->preferredTerm = $preferredTerm;
  }
  /**
   * @return string
   */
  public function getPreferredTerm()
  {
    return $this->preferredTerm;
  }
  /**
   * @param string[]
   */
  public function setVocabularyCodes($vocabularyCodes)
  {
    $this->vocabularyCodes = $vocabularyCodes;
  }
  /**
   * @return string[]
   */
  public function getVocabularyCodes()
  {
    return $this->vocabularyCodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Entity::class, 'Google_Service_CloudHealthcare_Entity');
