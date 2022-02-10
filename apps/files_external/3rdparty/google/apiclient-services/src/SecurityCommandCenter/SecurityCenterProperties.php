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

namespace Google\Service\SecurityCommandCenter;

class SecurityCenterProperties extends \Google\Collection
{
  protected $collection_key = 'resourceOwners';
  protected $foldersType = Folder::class;
  protected $foldersDataType = 'array';
  /**
   * @var string
   */
  public $resourceDisplayName;
  /**
   * @var string
   */
  public $resourceName;
  /**
   * @var string[]
   */
  public $resourceOwners;
  /**
   * @var string
   */
  public $resourceParent;
  /**
   * @var string
   */
  public $resourceParentDisplayName;
  /**
   * @var string
   */
  public $resourceProject;
  /**
   * @var string
   */
  public $resourceProjectDisplayName;
  /**
   * @var string
   */
  public $resourceType;

  /**
   * @param Folder[]
   */
  public function setFolders($folders)
  {
    $this->folders = $folders;
  }
  /**
   * @return Folder[]
   */
  public function getFolders()
  {
    return $this->folders;
  }
  /**
   * @param string
   */
  public function setResourceDisplayName($resourceDisplayName)
  {
    $this->resourceDisplayName = $resourceDisplayName;
  }
  /**
   * @return string
   */
  public function getResourceDisplayName()
  {
    return $this->resourceDisplayName;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param string[]
   */
  public function setResourceOwners($resourceOwners)
  {
    $this->resourceOwners = $resourceOwners;
  }
  /**
   * @return string[]
   */
  public function getResourceOwners()
  {
    return $this->resourceOwners;
  }
  /**
   * @param string
   */
  public function setResourceParent($resourceParent)
  {
    $this->resourceParent = $resourceParent;
  }
  /**
   * @return string
   */
  public function getResourceParent()
  {
    return $this->resourceParent;
  }
  /**
   * @param string
   */
  public function setResourceParentDisplayName($resourceParentDisplayName)
  {
    $this->resourceParentDisplayName = $resourceParentDisplayName;
  }
  /**
   * @return string
   */
  public function getResourceParentDisplayName()
  {
    return $this->resourceParentDisplayName;
  }
  /**
   * @param string
   */
  public function setResourceProject($resourceProject)
  {
    $this->resourceProject = $resourceProject;
  }
  /**
   * @return string
   */
  public function getResourceProject()
  {
    return $this->resourceProject;
  }
  /**
   * @param string
   */
  public function setResourceProjectDisplayName($resourceProjectDisplayName)
  {
    $this->resourceProjectDisplayName = $resourceProjectDisplayName;
  }
  /**
   * @return string
   */
  public function getResourceProjectDisplayName()
  {
    return $this->resourceProjectDisplayName;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityCenterProperties::class, 'Google_Service_SecurityCommandCenter_SecurityCenterProperties');
