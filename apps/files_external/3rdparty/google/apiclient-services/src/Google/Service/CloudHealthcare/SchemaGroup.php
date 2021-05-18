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

class Google_Service_CloudHealthcare_SchemaGroup extends Google_Collection
{
  protected $collection_key = 'members';
  public $choice;
  public $maxOccurs;
  protected $membersType = 'Google_Service_CloudHealthcare_GroupOrSegment';
  protected $membersDataType = 'array';
  public $minOccurs;
  public $name;

  public function setChoice($choice)
  {
    $this->choice = $choice;
  }
  public function getChoice()
  {
    return $this->choice;
  }
  public function setMaxOccurs($maxOccurs)
  {
    $this->maxOccurs = $maxOccurs;
  }
  public function getMaxOccurs()
  {
    return $this->maxOccurs;
  }
  /**
   * @param Google_Service_CloudHealthcare_GroupOrSegment[]
   */
  public function setMembers($members)
  {
    $this->members = $members;
  }
  /**
   * @return Google_Service_CloudHealthcare_GroupOrSegment[]
   */
  public function getMembers()
  {
    return $this->members;
  }
  public function setMinOccurs($minOccurs)
  {
    $this->minOccurs = $minOccurs;
  }
  public function getMinOccurs()
  {
    return $this->minOccurs;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
