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

namespace Google\Service\Classroom;

class Feed extends \Google\Model
{
  protected $courseRosterChangesInfoType = CourseRosterChangesInfo::class;
  protected $courseRosterChangesInfoDataType = '';
  protected $courseWorkChangesInfoType = CourseWorkChangesInfo::class;
  protected $courseWorkChangesInfoDataType = '';
  /**
   * @var string
   */
  public $feedType;

  /**
   * @param CourseRosterChangesInfo
   */
  public function setCourseRosterChangesInfo(CourseRosterChangesInfo $courseRosterChangesInfo)
  {
    $this->courseRosterChangesInfo = $courseRosterChangesInfo;
  }
  /**
   * @return CourseRosterChangesInfo
   */
  public function getCourseRosterChangesInfo()
  {
    return $this->courseRosterChangesInfo;
  }
  /**
   * @param CourseWorkChangesInfo
   */
  public function setCourseWorkChangesInfo(CourseWorkChangesInfo $courseWorkChangesInfo)
  {
    $this->courseWorkChangesInfo = $courseWorkChangesInfo;
  }
  /**
   * @return CourseWorkChangesInfo
   */
  public function getCourseWorkChangesInfo()
  {
    return $this->courseWorkChangesInfo;
  }
  /**
   * @param string
   */
  public function setFeedType($feedType)
  {
    $this->feedType = $feedType;
  }
  /**
   * @return string
   */
  public function getFeedType()
  {
    return $this->feedType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Feed::class, 'Google_Service_Classroom_Feed');
