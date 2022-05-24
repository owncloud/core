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

namespace Google\Service\PeopleService;

class Membership extends \Google\Model
{
  protected $contactGroupMembershipType = ContactGroupMembership::class;
  protected $contactGroupMembershipDataType = '';
  protected $domainMembershipType = DomainMembership::class;
  protected $domainMembershipDataType = '';
  protected $metadataType = FieldMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param ContactGroupMembership
   */
  public function setContactGroupMembership(ContactGroupMembership $contactGroupMembership)
  {
    $this->contactGroupMembership = $contactGroupMembership;
  }
  /**
   * @return ContactGroupMembership
   */
  public function getContactGroupMembership()
  {
    return $this->contactGroupMembership;
  }
  /**
   * @param DomainMembership
   */
  public function setDomainMembership(DomainMembership $domainMembership)
  {
    $this->domainMembership = $domainMembership;
  }
  /**
   * @return DomainMembership
   */
  public function getDomainMembership()
  {
    return $this->domainMembership;
  }
  /**
   * @param FieldMetadata
   */
  public function setMetadata(FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Membership::class, 'Google_Service_PeopleService_Membership');
