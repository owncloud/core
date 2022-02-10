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

namespace Google\Service\AndroidManagement;

class Application extends \Google\Collection
{
  protected $collection_key = 'permissions';
  protected $appTracksType = AppTrackInfo::class;
  protected $appTracksDataType = 'array';
  protected $managedPropertiesType = ManagedProperty::class;
  protected $managedPropertiesDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $permissionsType = ApplicationPermission::class;
  protected $permissionsDataType = 'array';
  /**
   * @var string
   */
  public $title;

  /**
   * @param AppTrackInfo[]
   */
  public function setAppTracks($appTracks)
  {
    $this->appTracks = $appTracks;
  }
  /**
   * @return AppTrackInfo[]
   */
  public function getAppTracks()
  {
    return $this->appTracks;
  }
  /**
   * @param ManagedProperty[]
   */
  public function setManagedProperties($managedProperties)
  {
    $this->managedProperties = $managedProperties;
  }
  /**
   * @return ManagedProperty[]
   */
  public function getManagedProperties()
  {
    return $this->managedProperties;
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
   * @param ApplicationPermission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return ApplicationPermission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_AndroidManagement_Application');
