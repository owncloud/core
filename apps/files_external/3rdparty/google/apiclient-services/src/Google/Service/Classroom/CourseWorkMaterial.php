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

class Google_Service_Classroom_CourseWorkMaterial extends Google_Collection
{
  protected $collection_key = 'materials';
  public $alternateLink;
  public $assigneeMode;
  public $courseId;
  public $creationTime;
  public $creatorUserId;
  public $description;
  public $id;
  protected $individualStudentsOptionsType = 'Google_Service_Classroom_IndividualStudentsOptions';
  protected $individualStudentsOptionsDataType = '';
  protected $materialsType = 'Google_Service_Classroom_Material';
  protected $materialsDataType = 'array';
  public $scheduledTime;
  public $state;
  public $title;
  public $topicId;
  public $updateTime;

  public function setAlternateLink($alternateLink)
  {
    $this->alternateLink = $alternateLink;
  }
  public function getAlternateLink()
  {
    return $this->alternateLink;
  }
  public function setAssigneeMode($assigneeMode)
  {
    $this->assigneeMode = $assigneeMode;
  }
  public function getAssigneeMode()
  {
    return $this->assigneeMode;
  }
  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  public function getCourseId()
  {
    return $this->courseId;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setCreatorUserId($creatorUserId)
  {
    $this->creatorUserId = $creatorUserId;
  }
  public function getCreatorUserId()
  {
    return $this->creatorUserId;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Classroom_IndividualStudentsOptions
   */
  public function setIndividualStudentsOptions(Google_Service_Classroom_IndividualStudentsOptions $individualStudentsOptions)
  {
    $this->individualStudentsOptions = $individualStudentsOptions;
  }
  /**
   * @return Google_Service_Classroom_IndividualStudentsOptions
   */
  public function getIndividualStudentsOptions()
  {
    return $this->individualStudentsOptions;
  }
  /**
   * @param Google_Service_Classroom_Material[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return Google_Service_Classroom_Material[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  public function setScheduledTime($scheduledTime)
  {
    $this->scheduledTime = $scheduledTime;
  }
  public function getScheduledTime()
  {
    return $this->scheduledTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTopicId($topicId)
  {
    $this->topicId = $topicId;
  }
  public function getTopicId()
  {
    return $this->topicId;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
