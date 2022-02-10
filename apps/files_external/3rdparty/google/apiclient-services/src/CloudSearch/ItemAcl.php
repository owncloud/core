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

namespace Google\Service\CloudSearch;

class ItemAcl extends \Google\Collection
{
  protected $collection_key = 'readers';
  /**
   * @var string
   */
  public $aclInheritanceType;
  protected $deniedReadersType = Principal::class;
  protected $deniedReadersDataType = 'array';
  /**
   * @var string
   */
  public $inheritAclFrom;
  protected $ownersType = Principal::class;
  protected $ownersDataType = 'array';
  protected $readersType = Principal::class;
  protected $readersDataType = 'array';

  /**
   * @param string
   */
  public function setAclInheritanceType($aclInheritanceType)
  {
    $this->aclInheritanceType = $aclInheritanceType;
  }
  /**
   * @return string
   */
  public function getAclInheritanceType()
  {
    return $this->aclInheritanceType;
  }
  /**
   * @param Principal[]
   */
  public function setDeniedReaders($deniedReaders)
  {
    $this->deniedReaders = $deniedReaders;
  }
  /**
   * @return Principal[]
   */
  public function getDeniedReaders()
  {
    return $this->deniedReaders;
  }
  /**
   * @param string
   */
  public function setInheritAclFrom($inheritAclFrom)
  {
    $this->inheritAclFrom = $inheritAclFrom;
  }
  /**
   * @return string
   */
  public function getInheritAclFrom()
  {
    return $this->inheritAclFrom;
  }
  /**
   * @param Principal[]
   */
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  /**
   * @return Principal[]
   */
  public function getOwners()
  {
    return $this->owners;
  }
  /**
   * @param Principal[]
   */
  public function setReaders($readers)
  {
    $this->readers = $readers;
  }
  /**
   * @return Principal[]
   */
  public function getReaders()
  {
    return $this->readers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ItemAcl::class, 'Google_Service_CloudSearch_ItemAcl');
