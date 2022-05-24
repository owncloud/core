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

namespace Google\Service\Datastore;

class EntityResult extends \Google\Model
{
  /**
   * @var string
   */
  public $cursor;
  protected $entityType = Entity::class;
  protected $entityDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setCursor($cursor)
  {
    $this->cursor = $cursor;
  }
  /**
   * @return string
   */
  public function getCursor()
  {
    return $this->cursor;
  }
  /**
   * @param Entity
   */
  public function setEntity(Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EntityResult::class, 'Google_Service_Datastore_EntityResult');
