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

namespace Google\Service\Connectors;

class RoleGrant extends \Google\Collection
{
  protected $collection_key = 'roles';
  public $helperTextTemplate;
  public $principal;
  protected $resourceType = ConnectorsResource::class;
  protected $resourceDataType = '';
  public $roles;

  public function setHelperTextTemplate($helperTextTemplate)
  {
    $this->helperTextTemplate = $helperTextTemplate;
  }
  public function getHelperTextTemplate()
  {
    return $this->helperTextTemplate;
  }
  public function setPrincipal($principal)
  {
    $this->principal = $principal;
  }
  public function getPrincipal()
  {
    return $this->principal;
  }
  /**
   * @param ConnectorsResource
   */
  public function setResource(ConnectorsResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return ConnectorsResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  public function getRoles()
  {
    return $this->roles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoleGrant::class, 'Google_Service_Connectors_RoleGrant');
