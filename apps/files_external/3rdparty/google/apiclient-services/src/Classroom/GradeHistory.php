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

class GradeHistory extends \Google\Model
{
  /**
   * @var string
   */
  public $actorUserId;
  /**
   * @var string
   */
  public $gradeChangeType;
  /**
   * @var string
   */
  public $gradeTimestamp;
  public $maxPoints;
  public $pointsEarned;

  /**
   * @param string
   */
  public function setActorUserId($actorUserId)
  {
    $this->actorUserId = $actorUserId;
  }
  /**
   * @return string
   */
  public function getActorUserId()
  {
    return $this->actorUserId;
  }
  /**
   * @param string
   */
  public function setGradeChangeType($gradeChangeType)
  {
    $this->gradeChangeType = $gradeChangeType;
  }
  /**
   * @return string
   */
  public function getGradeChangeType()
  {
    return $this->gradeChangeType;
  }
  /**
   * @param string
   */
  public function setGradeTimestamp($gradeTimestamp)
  {
    $this->gradeTimestamp = $gradeTimestamp;
  }
  /**
   * @return string
   */
  public function getGradeTimestamp()
  {
    return $this->gradeTimestamp;
  }
  public function setMaxPoints($maxPoints)
  {
    $this->maxPoints = $maxPoints;
  }
  public function getMaxPoints()
  {
    return $this->maxPoints;
  }
  public function setPointsEarned($pointsEarned)
  {
    $this->pointsEarned = $pointsEarned;
  }
  public function getPointsEarned()
  {
    return $this->pointsEarned;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GradeHistory::class, 'Google_Service_Classroom_GradeHistory');
