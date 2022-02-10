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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $makeAndModel;
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
  public $uri;
  /**
   * @var bool
   */
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
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
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
  public function setMakeAndModel($makeAndModel)
  {
    $this->makeAndModel = $makeAndModel;
  }
  /**
   * @return string
   */
  public function getMakeAndModel()
  {
    return $this->makeAndModel;
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
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param bool
   */
  public function setUseDriverlessConfig($useDriverlessConfig)
  {
    $this->useDriverlessConfig = $useDriverlessConfig;
  }
  /**
   * @return bool
   */
  public function getUseDriverlessConfig()
  {
    return $this->useDriverlessConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Printer::class, 'Google_Service_Directory_Printer');
