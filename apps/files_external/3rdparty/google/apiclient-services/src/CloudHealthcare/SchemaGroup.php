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

class SchemaGroup extends \Google\Collection
{
  protected $collection_key = 'members';
  /**
   * @var bool
   */
  public $choice;
  /**
   * @var int
   */
  public $maxOccurs;
  protected $membersType = GroupOrSegment::class;
  protected $membersDataType = 'array';
  /**
   * @var int
   */
  public $minOccurs;
  /**
   * @var string
   */
  public $name;

  /**
   * @param bool
   */
  public function setChoice($choice)
  {
    $this->choice = $choice;
  }
  /**
   * @return bool
   */
  public function getChoice()
  {
    return $this->choice;
  }
  /**
   * @param int
   */
  public function setMaxOccurs($maxOccurs)
  {
    $this->maxOccurs = $maxOccurs;
  }
  /**
   * @return int
   */
  public function getMaxOccurs()
  {
    return $this->maxOccurs;
  }
  /**
   * @param GroupOrSegment[]
   */
  public function setMembers($members)
  {
    $this->members = $members;
  }
  /**
   * @return GroupOrSegment[]
   */
  public function getMembers()
  {
    return $this->members;
  }
  /**
   * @param int
   */
  public function setMinOccurs($minOccurs)
  {
    $this->minOccurs = $minOccurs;
  }
  /**
   * @return int
   */
  public function getMinOccurs()
  {
    return $this->minOccurs;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SchemaGroup::class, 'Google_Service_CloudHealthcare_SchemaGroup');
