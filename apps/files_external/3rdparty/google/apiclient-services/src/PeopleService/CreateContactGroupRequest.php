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

class CreateContactGroupRequest extends \Google\Model
{
  protected $contactGroupType = ContactGroup::class;
  protected $contactGroupDataType = '';
  public $readGroupFields;

  /**
   * @param ContactGroup
   */
  public function setContactGroup(ContactGroup $contactGroup)
  {
    $this->contactGroup = $contactGroup;
  }
  /**
   * @return ContactGroup
   */
  public function getContactGroup()
  {
    return $this->contactGroup;
  }
  public function setReadGroupFields($readGroupFields)
  {
    $this->readGroupFields = $readGroupFields;
  }
  public function getReadGroupFields()
  {
    return $this->readGroupFields;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateContactGroupRequest::class, 'Google_Service_PeopleService_CreateContactGroupRequest');
