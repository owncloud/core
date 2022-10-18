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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl extends \Google\Model
{
  protected $circleType = AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclCircleAcl::class;
  protected $circleDataType = '';
  protected $contactGroupType = AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclContactGroupAcl::class;
  protected $contactGroupDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclCircleAcl
   */
  public function setCircle(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclCircleAcl $circle)
  {
    $this->circle = $circle;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclCircleAcl
   */
  public function getCircle()
  {
    return $this->circle;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclContactGroupAcl
   */
  public function setContactGroup(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclContactGroupAcl $contactGroup)
  {
    $this->contactGroup = $contactGroup;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAclContactGroupAcl
   */
  public function getContactGroup()
  {
    return $this->contactGroup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl');
