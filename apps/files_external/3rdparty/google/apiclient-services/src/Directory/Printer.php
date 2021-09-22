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

class Printer extends \Google\Collection
{
  protected $collection_key = 'auxiliaryMessages';
  protected $auxiliaryMessagesType = AuxiliaryMessage::class;
  protected $auxiliaryMessagesDataType = 'array';
  public $createTime;
  public $description;
  public $displayName;
  public $id;
  public $makeAndModel;
  public $name;
  public $orgUnitId;
  public $uri;
  public $useDriverlessConfig;

  /**
   * @param AuxiliaryMessage[]
   */
  public function setAuxiliaryMessages($auxiliaryMessages)
  {
    $this->auxiliaryMessages = $auxiliaryMessages;
  }
  /**
   * @return AuxiliaryMessage[]
   */
  public function getAuxiliaryMessages()
  {
    return $this->auxiliaryMessages;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMakeAndModel($makeAndModel)
  {
    $this->makeAndModel = $makeAndModel;
  }
  public function getMakeAndModel()
  {
    return $this->makeAndModel;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
  public function setUseDriverlessConfig($useDriverlessConfig)
  {
    $this->useDriverlessConfig = $useDriverlessConfig;
  }
  public function getUseDriverlessConfig()
  {
    return $this->useDriverlessConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Printer::class, 'Google_Service_Directory_Printer');
