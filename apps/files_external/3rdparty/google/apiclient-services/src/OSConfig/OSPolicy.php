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

namespace Google\Service\OSConfig;

class OSPolicy extends \Google\Collection
{
  protected $collection_key = 'resourceGroups';
  public $allowNoResourceGroupMatch;
  public $description;
  public $id;
  public $mode;
  protected $resourceGroupsType = OSPolicyResourceGroup::class;
  protected $resourceGroupsDataType = 'array';

  public function setAllowNoResourceGroupMatch($allowNoResourceGroupMatch)
  {
    $this->allowNoResourceGroupMatch = $allowNoResourceGroupMatch;
  }
  public function getAllowNoResourceGroupMatch()
  {
    return $this->allowNoResourceGroupMatch;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param OSPolicyResourceGroup[]
   */
  public function setResourceGroups($resourceGroups)
  {
    $this->resourceGroups = $resourceGroups;
  }
  /**
   * @return OSPolicyResourceGroup[]
   */
  public function getResourceGroups()
  {
    return $this->resourceGroups;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicy::class, 'Google_Service_OSConfig_OSPolicy');
