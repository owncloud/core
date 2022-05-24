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

namespace Google\Service\CloudHealthcare;

class GroupOrSegment extends \Google\Model
{
  protected $groupType = SchemaGroup::class;
  protected $groupDataType = '';
  protected $segmentType = SchemaSegment::class;
  protected $segmentDataType = '';

  /**
   * @param SchemaGroup
   */
  public function setGroup(SchemaGroup $group)
  {
    $this->group = $group;
  }
  /**
   * @return SchemaGroup
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param SchemaSegment
   */
  public function setSegment(SchemaSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return SchemaSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GroupOrSegment::class, 'Google_Service_CloudHealthcare_GroupOrSegment');
