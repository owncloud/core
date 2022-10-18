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

class AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScope extends \Google\Model
{
  /**
   * @var bool
   */
  public $allUsers;
  /**
   * @var bool
   */
  public $domainUsers;
  protected $membershipType = AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl::class;
  protected $membershipDataType = '';
  protected $personType = AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopePersonAcl::class;
  protected $personDataType = '';

  /**
   * @param bool
   */
  public function setAllUsers($allUsers)
  {
    $this->allUsers = $allUsers;
  }
  /**
   * @return bool
   */
  public function getAllUsers()
  {
    return $this->allUsers;
  }
  /**
   * @param bool
   */
  public function setDomainUsers($domainUsers)
  {
    $this->domainUsers = $domainUsers;
  }
  /**
   * @return bool
   */
  public function getDomainUsers()
  {
    return $this->domainUsers;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl
   */
  public function setMembership(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl $membership)
  {
    $this->membership = $membership;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopeMembershipAcl
   */
  public function getMembership()
  {
    return $this->membership;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopePersonAcl
   */
  public function setPerson(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopePersonAcl $person)
  {
    $this->person = $person;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScopePersonAcl
   */
  public function getPerson()
  {
    return $this->person;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScope::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntryScope');
