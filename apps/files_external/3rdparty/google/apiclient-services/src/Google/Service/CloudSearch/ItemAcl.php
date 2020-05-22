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

class Google_Service_CloudSearch_ItemAcl extends Google_Collection
{
  protected $collection_key = 'readers';
  public $aclInheritanceType;
  protected $deniedReadersType = 'Google_Service_CloudSearch_Principal';
  protected $deniedReadersDataType = 'array';
  public $inheritAclFrom;
  protected $ownersType = 'Google_Service_CloudSearch_Principal';
  protected $ownersDataType = 'array';
  protected $readersType = 'Google_Service_CloudSearch_Principal';
  protected $readersDataType = 'array';

  public function setAclInheritanceType($aclInheritanceType)
  {
    $this->aclInheritanceType = $aclInheritanceType;
  }
  public function getAclInheritanceType()
  {
    return $this->aclInheritanceType;
  }
  /**
   * @param Google_Service_CloudSearch_Principal
   */
  public function setDeniedReaders($deniedReaders)
  {
    $this->deniedReaders = $deniedReaders;
  }
  /**
   * @return Google_Service_CloudSearch_Principal
   */
  public function getDeniedReaders()
  {
    return $this->deniedReaders;
  }
  public function setInheritAclFrom($inheritAclFrom)
  {
    $this->inheritAclFrom = $inheritAclFrom;
  }
  public function getInheritAclFrom()
  {
    return $this->inheritAclFrom;
  }
  /**
   * @param Google_Service_CloudSearch_Principal
   */
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  /**
   * @return Google_Service_CloudSearch_Principal
   */
  public function getOwners()
  {
    return $this->owners;
  }
  /**
   * @param Google_Service_CloudSearch_Principal
   */
  public function setReaders($readers)
  {
    $this->readers = $readers;
  }
  /**
   * @return Google_Service_CloudSearch_Principal
   */
  public function getReaders()
  {
    return $this->readers;
  }
}
