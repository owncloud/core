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

class Google_Service_CloudHealthcare_GroupOrSegment extends Google_Model
{
  protected $groupType = 'Google_Service_CloudHealthcare_SchemaGroup';
  protected $groupDataType = '';
  protected $segmentType = 'Google_Service_CloudHealthcare_SchemaSegment';
  protected $segmentDataType = '';

  /**
   * @param Google_Service_CloudHealthcare_SchemaGroup
   */
  public function setGroup(Google_Service_CloudHealthcare_SchemaGroup $group)
  {
    $this->group = $group;
  }
  /**
   * @return Google_Service_CloudHealthcare_SchemaGroup
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param Google_Service_CloudHealthcare_SchemaSegment
   */
  public function setSegment(Google_Service_CloudHealthcare_SchemaSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return Google_Service_CloudHealthcare_SchemaSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
}
