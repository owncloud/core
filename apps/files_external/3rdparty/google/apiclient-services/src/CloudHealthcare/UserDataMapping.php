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

namespace Google\Service\CloudHealthcare;

class UserDataMapping extends \Google\Collection
{
  protected $collection_key = 'resourceAttributes';
  /**
   * @var string
   */
  public $archiveTime;
  /**
   * @var bool
   */
  public $archived;
  /**
   * @var string
   */
  public $dataId;
  /**
   * @var string
   */
  public $name;
  protected $resourceAttributesType = Attribute::class;
  protected $resourceAttributesDataType = 'array';
  /**
   * @var string
   */
  public $userId;

  /**
   * @param string
   */
  public function setArchiveTime($archiveTime)
  {
    $this->archiveTime = $archiveTime;
  }
  /**
   * @return string
   */
  public function getArchiveTime()
  {
    return $this->archiveTime;
  }
  /**
   * @param bool
   */
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param string
   */
  public function setDataId($dataId)
  {
    $this->dataId = $dataId;
  }
  /**
   * @return string
   */
  public function getDataId()
  {
    return $this->dataId;
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
   * @param Attribute[]
   */
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  /**
   * @return Attribute[]
   */
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserDataMapping::class, 'Google_Service_CloudHealthcare_UserDataMapping');
