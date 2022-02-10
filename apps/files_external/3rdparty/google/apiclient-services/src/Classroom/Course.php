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

class Course extends \Google\Collection
{
  protected $collection_key = 'courseMaterialSets';
  /**
   * @var string
   */
  public $alternateLink;
  /**
   * @var string
   */
  public $calendarId;
  /**
   * @var string
   */
  public $courseGroupEmail;
  protected $courseMaterialSetsType = CourseMaterialSet::class;
  protected $courseMaterialSetsDataType = 'array';
  /**
   * @var string
   */
  public $courseState;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $descriptionHeading;
  /**
   * @var string
   */
  public $enrollmentCode;
  protected $gradebookSettingsType = GradebookSettings::class;
  protected $gradebookSettingsDataType = '';
  /**
   * @var bool
   */
  public $guardiansEnabled;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $ownerId;
  /**
   * @var string
   */
  public $room;
  /**
   * @var string
   */
  public $section;
  protected $teacherFolderType = DriveFolder::class;
  protected $teacherFolderDataType = '';
  /**
   * @var string
   */
  public $teacherGroupEmail;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  /**
   * @return string
   */
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  /**
   * @param string
   */
  public function setCalendarId($calendarId)
  {
    $this->calendarId = $calendarId;
  }
  /**
   * @return string
   */
  public function getCalendarId()
  {
    return $this->calendarId;
  }
  /**
   * @param string
   */
  public function setCourseGroupEmail($courseGroupEmail)
  {
    $this->courseGroupEmail = $courseGroupEmail;
  }
  /**
   * @return string
   */
  public function getCourseGroupEmail()
  {
    return $this->courseGroupEmail;
  }
  /**
   * @param CourseMaterialSet[]
   */
  public function setCourseMaterialSets($courseMaterialSets)
  {
    $this->courseMaterialSets = $courseMaterialSets;
  }
  /**
   * @return CourseMaterialSet[]
   */
  public function getCourseMaterialSets()
  {
    return $this->courseMaterialSets;
  }
  /**
   * @param string
   */
  public function setCourseState($courseState)
  {
    $this->courseState = $courseState;
  }
  /**
   * @return string
   */
  public function getCourseState()
  {
    return $this->courseState;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
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
   * @param string
   */
  public function setDescriptionHeading($descriptionHeading)
  {
    $this->descriptionHeading = $descriptionHeading;
  }
  /**
   * @return string
   */
  public function getDescriptionHeading()
  {
    return $this->descriptionHeading;
  }
  /**
   * @param string
   */
  public function setEnrollmentCode($enrollmentCode)
  {
    $this->enrollmentCode = $enrollmentCode;
  }
  /**
   * @return string
   */
  public function getEnrollmentCode()
  {
    return $this->enrollmentCode;
  }
  /**
   * @param GradebookSettings
   */
  public function setGradebookSettings(GradebookSettings $gradebookSettings)
  {
    $this->gradebookSettings = $gradebookSettings;
  }
  /**
   * @return GradebookSettings
   */
  public function getGradebookSettings()
  {
    return $this->gradebookSettings;
  }
  /**
   * @param bool
   */
  public function setGuardiansEnabled($guardiansEnabled)
  {
    $this->guardiansEnabled = $guardiansEnabled;
  }
  /**
   * @return bool
   */
  public function getGuardiansEnabled()
  {
    return $this->guardiansEnabled;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOwnerId($ownerId)
  {
    $this->ownerId = $ownerId;
  }
  /**
   * @return string
   */
  public function getOwnerId()
  {
    return $this->ownerId;
  }
  /**
   * @param string
   */
  public function setRoom($room)
  {
    $this->room = $room;
  }
  /**
   * @return string
   */
  public function getRoom()
  {
    return $this->room;
  }
  /**
   * @param string
   */
  public function setSection($section)
  {
    $this->section = $section;
  }
  /**
   * @return string
   */
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param DriveFolder
   */
  public function setTeacherFolder(DriveFolder $teacherFolder)
  {
    $this->teacherFolder = $teacherFolder;
  }
  /**
   * @return DriveFolder
   */
  public function getTeacherFolder()
  {
    return $this->teacherFolder;
  }
  /**
   * @param string
   */
  public function setTeacherGroupEmail($teacherGroupEmail)
  {
    $this->teacherGroupEmail = $teacherGroupEmail;
  }
  /**
   * @return string
   */
  public function getTeacherGroupEmail()
  {
    return $this->teacherGroupEmail;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Course::class, 'Google_Service_Classroom_Course');
