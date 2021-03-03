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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanation extends Google_Model
{
  public $access;
  protected $conditionType = 'Google_Service_PolicySimulator_GoogleTypeExpr';
  protected $conditionDataType = '';
  protected $membershipsType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanationAnnotatedMembership';
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
   * @param Google_Service_PolicySimulator_GoogleTypeExpr
   */
  public function setCondition(Google_Service_PolicySimulator_GoogleTypeExpr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleTypeExpr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanationAnnotatedMembership[]
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanationAnnotatedMembership[]
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
