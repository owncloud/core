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

class StudentSubmission extends \Google\Collection
{
  protected $collection_key = 'submissionHistory';
  public $alternateLink;
  public $assignedGrade;
  protected $assignmentSubmissionType = AssignmentSubmission::class;
  protected $assignmentSubmissionDataType = '';
  public $associatedWithDeveloper;
  public $courseId;
  public $courseWorkId;
  public $courseWorkType;
  public $creationTime;
  public $draftGrade;
  public $id;
  public $late;
  protected $multipleChoiceSubmissionType = MultipleChoiceSubmission::class;
  protected $multipleChoiceSubmissionDataType = '';
  protected $shortAnswerSubmissionType = ShortAnswerSubmission::class;
  protected $shortAnswerSubmissionDataType = '';
  public $state;
  protected $submissionHistoryType = SubmissionHistory::class;
  protected $submissionHistoryDataType = 'array';
  public $updateTime;
  public $userId;

  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setAssignedGrade($assignedGrade)
  {
    $this->assignedGrade = $assignedGrade;
  }
  public function getAssignedGrade()
  {
    return $this->assignedGrade;
  }
  /**
   * @param AssignmentSubmission
   */
  public function setAssignmentSubmission(AssignmentSubmission $assignmentSubmission)
  {
    $this->assignmentSubmission = $assignmentSubmission;
  }
  /**
   * @return AssignmentSubmission
   */
  public function getAssignmentSubmission()
  {
    return $this->assignmentSubmission;
  }
  public function setAssociatedWithDeveloper($associatedWithDeveloper)
  {
    $this->associatedWithDeveloper = $associatedWithDeveloper;
  }
  public function getAssociatedWithDeveloper()
  {
    return $this->associatedWithDeveloper;
  }
  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setCourseWorkId($courseWorkId)
  {
    $this->courseWorkId = $courseWorkId;
  }
  public function getCourseWorkId()
  {
    return $this->courseWorkId;
  }
  public function setCourseWorkType($courseWorkType)
  {
    $this->courseWorkType = $courseWorkType;
  }
  public function getCourseWorkType()
  {
    return $this->courseWorkType;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDraftGrade($draftGrade)
  {
    $this->draftGrade = $draftGrade;
  }
  public function getDraftGrade()
  {
    return $this->draftGrade;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLate($late)
  {
    $this->late = $late;
  }
  public function getLate()
  {
    return $this->late;
  }
  /**
   * @param MultipleChoiceSubmission
   */
  public function setMultipleChoiceSubmission(MultipleChoiceSubmission $multipleChoiceSubmission)
  {
    $this->multipleChoiceSubmission = $multipleChoiceSubmission;
  }
  /**
   * @return MultipleChoiceSubmission
   */
  public function getMultipleChoiceSubmission()
  {
    return $this->multipleChoiceSubmission;
  }
  /**
   * @param ShortAnswerSubmission
   */
  public function setShortAnswerSubmission(ShortAnswerSubmission $shortAnswerSubmission)
  {
    $this->shortAnswerSubmission = $shortAnswerSubmission;
  }
  /**
   * @return ShortAnswerSubmission
   */
  public function getShortAnswerSubmission()
  {
    return $this->shortAnswerSubmission;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param SubmissionHistory[]
   */
  public function setSubmissionHistory($submissionHistory)
  {
    $this->submissionHistory = $submissionHistory;
  }
  /**
   * @return SubmissionHistory[]
   */
  public function getSubmissionHistory()
  {
    return $this->submissionHistory;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StudentSubmission::class, 'Google_Service_Classroom_StudentSubmission');
