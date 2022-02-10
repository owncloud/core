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

class OrgUnit extends \Google\Model
{
  /**
   * @var bool
   */
  public $blockInheritance;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $orgUnitId;
  /**
   * @var string
   */
  public $orgUnitPath;
  /**
   * @var string
   */
  public $parentOrgUnitId;
  /**
   * @var string
   */
  public $parentOrgUnitPath;

  /**
   * @param bool
   */
  public function setBlockInheritance($blockInheritance)
  {
    $this->blockInheritance = $blockInheritance;
  }
  /**
   * @return bool
   */
  public function getBlockInheritance()
  {
    return $this->blockInheritance;
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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  /**
   * @return string
   */
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  /**
   * @param string
   */
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  /**
   * @return string
   */
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  /**
   * @param string
   */
  public function setParentOrgUnitId($parentOrgUnitId)
  {
    $this->parentOrgUnitId = $parentOrgUnitId;
  }
  /**
   * @return string
   */
  public function getParentOrgUnitId()
  {
    return $this->parentOrgUnitId;
  }
  /**
   * @param string
   */
  public function setParentOrgUnitPath($parentOrgUnitPath)
  {
    $this->parentOrgUnitPath = $parentOrgUnitPath;
  }
  /**
   * @return string
   */
  public function getParentOrgUnitPath()
  {
    return $this->parentOrgUnitPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrgUnit::class, 'Google_Service_Directory_OrgUnit');
