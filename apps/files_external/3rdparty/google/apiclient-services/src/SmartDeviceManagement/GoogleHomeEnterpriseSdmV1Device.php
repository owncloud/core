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

namespace Google\Service\SmartDeviceManagement;

class GoogleHomeEnterpriseSdmV1Device extends \Google\Collection
{
  protected $collection_key = 'parentRelations';
  public $name;
  protected $parentRelationsType = GoogleHomeEnterpriseSdmV1ParentRelation::class;
  protected $parentRelationsDataType = 'array';
  public $traits;
  public $type;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleHomeEnterpriseSdmV1ParentRelation[]
   */
  public function setParentRelations($parentRelations)
  {
    $this->parentRelations = $parentRelations;
  }
  /**
   * @return GoogleHomeEnterpriseSdmV1ParentRelation[]
   */
  public function getParentRelations()
  {
    return $this->parentRelations;
  }
  public function setTraits($traits)
  {
    $this->traits = $traits;
  }
  public function getTraits()
  {
    return $this->traits;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleHomeEnterpriseSdmV1Device::class, 'Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1Device');
