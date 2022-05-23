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

namespace Google\Service\CivicInfo;

class Election extends \Google\Model
{
  /**
   * @var string
   */
  public $electionDay;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $ocdDivisionId;
  /**
   * @var string
   */
  public $shapeLookupBehavior;

  /**
   * @param string
   */
  public function setElectionDay($electionDay)
  {
    $this->electionDay = $electionDay;
  }
  /**
   * @return string
   */
  public function getElectionDay()
  {
    return $this->electionDay;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
  /**
   * @param string
   */
  public function setOcdDivisionId($ocdDivisionId)
  {
    $this->ocdDivisionId = $ocdDivisionId;
  }
  /**
   * @return string
   */
  public function getOcdDivisionId()
  {
    return $this->ocdDivisionId;
  }
  /**
   * @param string
   */
  public function setShapeLookupBehavior($shapeLookupBehavior)
  {
    $this->shapeLookupBehavior = $shapeLookupBehavior;
  }
  /**
   * @return string
   */
  public function getShapeLookupBehavior()
  {
    return $this->shapeLookupBehavior;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Election::class, 'Google_Service_CivicInfo_Election');
