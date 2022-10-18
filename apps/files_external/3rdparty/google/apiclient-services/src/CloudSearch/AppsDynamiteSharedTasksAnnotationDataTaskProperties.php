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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedTasksAnnotationDataTaskProperties extends \Google\Model
{
  protected $assigneeType = UserId::class;
  protected $assigneeDataType = '';
  /**
   * @var bool
   */
  public $completed;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $description;
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $title;

  /**
   * @param UserId
   */
  public function setAssignee(UserId $assignee)
  {
    $this->assignee = $assignee;
  }
  /**
   * @return UserId
   */
  public function getAssignee()
  {
    return $this->assignee;
  }
  /**
   * @param bool
   */
  public function setCompleted($completed)
  {
    $this->completed = $completed;
  }
  /**
   * @return bool
   */
  public function getCompleted()
  {
    return $this->completed;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Date
   */
  public function setStartDate(Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedTasksAnnotationDataTaskProperties::class, 'Google_Service_CloudSearch_AppsDynamiteSharedTasksAnnotationDataTaskProperties');
