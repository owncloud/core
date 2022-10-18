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

class AppsPeopleOzExternalMergedpeopleapiSortKeys extends \Google\Collection
{
  protected $collection_key = 'affinity';
  protected $affinityType = AppsPeopleOzExternalMergedpeopleapiAffinity::class;
  protected $affinityDataType = 'array';
  /**
   * @var string
   */
  public $interactionRank;
  /**
   * @var string
   */
  public $lastName;
  /**
   * @var string
   */
  public $lastNameRaw;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nameRaw;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAffinity[]
   */
  public function setAffinity($affinity)
  {
    $this->affinity = $affinity;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAffinity[]
   */
  public function getAffinity()
  {
    return $this->affinity;
  }
  /**
   * @param string
   */
  public function setInteractionRank($interactionRank)
  {
    $this->interactionRank = $interactionRank;
  }
  /**
   * @return string
   */
  public function getInteractionRank()
  {
    return $this->interactionRank;
  }
  /**
   * @param string
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
  /**
   * @param string
   */
  public function setLastNameRaw($lastNameRaw)
  {
    $this->lastNameRaw = $lastNameRaw;
  }
  /**
   * @return string
   */
  public function getLastNameRaw()
  {
    return $this->lastNameRaw;
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
  public function setNameRaw($nameRaw)
  {
    $this->nameRaw = $nameRaw;
  }
  /**
   * @return string
   */
  public function getNameRaw()
  {
    return $this->nameRaw;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiSortKeys::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiSortKeys');
