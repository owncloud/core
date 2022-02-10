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

namespace Google\Service\Directory;

class UserOrganization extends \Google\Model
{
  /**
   * @var string
   */
  public $costCenter;
  /**
   * @var string
   */
  public $customType;
  /**
   * @var string
   */
  public $department;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var int
   */
  public $fullTimeEquivalent;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var string
   */
  public $symbol;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCostCenter($costCenter)
  {
    $this->costCenter = $costCenter;
  }
  /**
   * @return string
   */
  public function getCostCenter()
  {
    return $this->costCenter;
  }
  /**
   * @param string
   */
  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }
  /**
   * @return string
   */
  public function getCustomType()
  {
    return $this->customType;
  }
  /**
   * @param string
   */
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  /**
   * @return string
   */
  public function getDepartment()
  {
    return $this->department;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param int
   */
  public function setFullTimeEquivalent($fullTimeEquivalent)
  {
    $this->fullTimeEquivalent = $fullTimeEquivalent;
  }
  /**
   * @return int
   */
  public function getFullTimeEquivalent()
  {
    return $this->fullTimeEquivalent;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
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
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param string
   */
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  /**
   * @return string
   */
  public function getSymbol()
  {
    return $this->symbol;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserOrganization::class, 'Google_Service_Directory_UserOrganization');
