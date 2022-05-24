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

namespace Google\Service\GKEHub;

class MembershipFeatureSpec extends \Google\Model
{
  protected $anthosvmType = AnthosVMMembershipSpec::class;
  protected $anthosvmDataType = '';
  protected $configmanagementType = ConfigManagementMembershipSpec::class;
  protected $configmanagementDataType = '';
  protected $identityserviceType = IdentityServiceMembershipSpec::class;
  protected $identityserviceDataType = '';
  protected $meshType = ServiceMeshMembershipSpec::class;
  protected $meshDataType = '';

  /**
   * @param AnthosVMMembershipSpec
   */
  public function setAnthosvm(AnthosVMMembershipSpec $anthosvm)
  {
    $this->anthosvm = $anthosvm;
  }
  /**
   * @return AnthosVMMembershipSpec
   */
  public function getAnthosvm()
  {
    return $this->anthosvm;
  }
  /**
   * @param ConfigManagementMembershipSpec
   */
  public function setConfigmanagement(ConfigManagementMembershipSpec $configmanagement)
  {
    $this->configmanagement = $configmanagement;
  }
  /**
   * @return ConfigManagementMembershipSpec
   */
  public function getConfigmanagement()
  {
    return $this->configmanagement;
  }
  /**
   * @param IdentityServiceMembershipSpec
   */
  public function setIdentityservice(IdentityServiceMembershipSpec $identityservice)
  {
    $this->identityservice = $identityservice;
  }
  /**
   * @return IdentityServiceMembershipSpec
   */
  public function getIdentityservice()
  {
    return $this->identityservice;
  }
  /**
   * @param ServiceMeshMembershipSpec
   */
  public function setMesh(ServiceMeshMembershipSpec $mesh)
  {
    $this->mesh = $mesh;
  }
  /**
   * @return ServiceMeshMembershipSpec
   */
  public function getMesh()
  {
    return $this->mesh;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipFeatureSpec::class, 'Google_Service_GKEHub_MembershipFeatureSpec');
