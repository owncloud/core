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

class AppsPeopleOzExternalMergedpeopleapiRosterDetails extends \Google\Collection
{
  protected $collection_key = 'abridgedRosterMemberships';
  protected $abridgedRosterMembershipsType = AppsPeopleOzExternalMergedpeopleapiRosterMember::class;
  protected $abridgedRosterMembershipsDataType = 'array';
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  protected $rosterMemberCountType = AppsPeopleOzExternalMergedpeopleapiRosterMemberCount::class;
  protected $rosterMemberCountDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRosterMember[]
   */
  public function setAbridgedRosterMemberships($abridgedRosterMemberships)
  {
    $this->abridgedRosterMemberships = $abridgedRosterMemberships;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRosterMember[]
   */
  public function getAbridgedRosterMemberships()
  {
    return $this->abridgedRosterMemberships;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiRosterMemberCount
   */
  public function setRosterMemberCount(AppsPeopleOzExternalMergedpeopleapiRosterMemberCount $rosterMemberCount)
  {
    $this->rosterMemberCount = $rosterMemberCount;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiRosterMemberCount
   */
  public function getRosterMemberCount()
  {
    return $this->rosterMemberCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiRosterDetails::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiRosterDetails');
