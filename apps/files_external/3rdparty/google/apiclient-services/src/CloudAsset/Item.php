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

namespace Google\Service\CloudAsset;

class Item extends \Google\Model
{
  protected $availablePackageType = SoftwarePackage::class;
  protected $availablePackageDataType = '';
  public $createTime;
  public $id;
  protected $installedPackageType = SoftwarePackage::class;
  protected $installedPackageDataType = '';
  public $originType;
  public $type;
  public $updateTime;

  /**
   * @param SoftwarePackage
   */
  public function setAvailablePackage(SoftwarePackage $availablePackage)
  {
    $this->availablePackage = $availablePackage;
  }
  /**
   * @return SoftwarePackage
   */
  public function getAvailablePackage()
  {
    return $this->availablePackage;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param SoftwarePackage
   */
  public function setInstalledPackage(SoftwarePackage $installedPackage)
  {
    $this->installedPackage = $installedPackage;
  }
  /**
   * @return SoftwarePackage
   */
  public function getInstalledPackage()
  {
    return $this->installedPackage;
  }
  public function setOriginType($originType)
  {
    $this->originType = $originType;
  }
  public function getOriginType()
  {
    return $this->originType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Item::class, 'Google_Service_CloudAsset_Item');
