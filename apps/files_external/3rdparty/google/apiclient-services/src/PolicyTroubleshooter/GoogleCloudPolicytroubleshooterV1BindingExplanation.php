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

namespace Google\Service\PolicyTroubleshooter;

class GoogleCloudPolicytroubleshooterV1BindingExplanation extends \Google\Model
{
  /**
   * @var string
   */
  public $access;
  protected $conditionType = GoogleTypeExpr::class;
  protected $conditionDataType = '';
  protected $membershipsType = GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership::class;
  protected $membershipsDataType = 'map';
  /**
   * @var string
   */
  public $relevance;
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $rolePermission;
  /**
   * @var string
   */
  public $rolePermissionRelevance;

  /**
   * @param string
   */
  public function setAccess($access)
  {
    $this->access = $access;
  }
  /**
   * @return string
   */
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
   * @param GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership[]
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership[]
   */
  public function getMemberships()
  {
    return $this->memberships;
  }
  /**
   * @param string
   */
  public function setRelevance($relevance)
  {
    $this->relevance = $relevance;
  }
  /**
   * @return string
   */
  public function getRelevance()
  {
    return $this->relevance;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param string
   */
  public function setRolePermission($rolePermission)
  {
    $this->rolePermission = $rolePermission;
  }
  /**
   * @return string
   */
  public function getRolePermission()
  {
    return $this->rolePermission;
  }
  /**
   * @param string
   */
  public function setRolePermissionRelevance($rolePermissionRelevance)
  {
    $this->rolePermissionRelevance = $rolePermissionRelevance;
  }
  /**
   * @return string
   */
  public function getRolePermissionRelevance()
  {
    return $this->rolePermissionRelevance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicytroubleshooterV1BindingExplanation::class, 'Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1BindingExplanation');
