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

namespace Google\Service\PeopleService;

class PersonMetadata extends \Google\Collection
{
  protected $collection_key = 'sources';
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string[]
   */
  public $linkedPeopleResourceNames;
  /**
   * @var string
   */
  public $objectType;
  /**
   * @var string[]
   */
  public $previousResourceNames;
  protected $sourcesType = Source::class;
  protected $sourcesDataType = 'array';

  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string[]
   */
  public function setLinkedPeopleResourceNames($linkedPeopleResourceNames)
  {
    $this->linkedPeopleResourceNames = $linkedPeopleResourceNames;
  }
  /**
   * @return string[]
   */
  public function getLinkedPeopleResourceNames()
  {
    return $this->linkedPeopleResourceNames;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param string[]
   */
  public function setPreviousResourceNames($previousResourceNames)
  {
    $this->previousResourceNames = $previousResourceNames;
  }
  /**
   * @return string[]
   */
  public function getPreviousResourceNames()
  {
    return $this->previousResourceNames;
  }
  /**
   * @param Source[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return Source[]
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersonMetadata::class, 'Google_Service_PeopleService_PersonMetadata');
