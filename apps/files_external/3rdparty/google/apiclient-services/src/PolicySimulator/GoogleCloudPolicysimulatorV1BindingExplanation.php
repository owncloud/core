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

namespace Google\Service\PolicySimulator;

class GoogleCloudPolicysimulatorV1BindingExplanation extends \Google\Model
{
  public $access;
  protected $conditionType = GoogleTypeExpr::class;
  protected $conditionDataType = '';
  protected $membershipsType = GoogleCloudPolicysimulatorV1BindingExplanationAnnotatedMembership::class;
  protected $membershipsDataType = 'map';
  public $relevance;
  public $role;
  public $rolePermission;
  public $rolePermissionRelevance;

  public function setAccess($access)
  {
    $this->access = $access;
  }
  public function getAccess()
  {
    return $this->access;
  }
  /**
   * @param GoogleTypeExpr
   */
  public function setCondition(GoogleTypeExpr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return GoogleTypeExpr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param GoogleCloudPolicysimulatorV1BindingExplanationAnnotatedMembership[]
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return GoogleCloudPolicysimulatorV1BindingExplanationAnnotatedMembership[]
   */
  public function getMemberships()
  {
    return $this->memberships;
  }
  public function setRelevance($relevance)
  {
    $this->relevance = $relevance;
  }
  public function getRelevance()
  {
    return $this->relevance;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setRolePermission($rolePermission)
  {
    $this->rolePermission = $rolePermission;
  }
  public function getRolePermission()
  {
    return $this->rolePermission;
  }
  public function setRolePermissionRelevance($rolePermissionRelevance)
  {
    $this->rolePermissionRelevance = $rolePermissionRelevance;
  }
  public function getRolePermissionRelevance()
  {
    return $this->rolePermissionRelevance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicysimulatorV1BindingExplanation::class, 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1BindingExplanation');
