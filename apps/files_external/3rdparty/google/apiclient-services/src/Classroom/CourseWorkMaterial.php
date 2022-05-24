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

class CourseWorkMaterial extends \Google\Collection
{
  protected $collection_key = 'materials';
  /**
   * @var string
   */
  public $alternateLink;
  /**
   * @var string
   */
  public $assigneeMode;
  /**
   * @var string
   */
  public $courseId;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $creatorUserId;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  protected $individualStudentsOptionsType = IndividualStudentsOptions::class;
  protected $individualStudentsOptionsDataType = '';
  protected $materialsType = Material::class;
  protected $materialsDataType = 'array';
  /**
   * @var string
   */
  public $scheduledTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $topicId;
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
  public function setAssigneeMode($assigneeMode)
  {
    $this->assigneeMode = $assigneeMode;
  }
  /**
   * @return string
   */
  public function getAssigneeMode()
  {
    return $this->assigneeMode;
  }
  /**
   * @param string
   */
  public function setCourseId($courseId)
  {
    $this->courseId = $courseId;
  }
  /**
   * @return string
   */
  public function getCourseId()
  {
    return $this->courseId;
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
  public function setCreatorUserId($creatorUserId)
  {
    $this->creatorUserId = $creatorUserId;
  }
  /**
   * @return string
   */
  public function getCreatorUserId()
  {
    return $this->creatorUserId;
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
   * @param IndividualStudentsOptions
   */
  public function setIndividualStudentsOptions(IndividualStudentsOptions $individualStudentsOptions)
  {
    $this->individualStudentsOptions = $individualStudentsOptions;
  }
  /**
   * @return IndividualStudentsOptions
   */
  public function getIndividualStudentsOptions()
  {
    return $this->individualStudentsOptions;
  }
  /**
   * @param Material[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return Material[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param string
   */
  public function setScheduledTime($scheduledTime)
  {
    $this->scheduledTime = $scheduledTime;
  }
  /**
   * @return string
   */
  public function getScheduledTime()
  {
    return $this->scheduledTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
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
  /**
   * @param string
   */
  public function setTopicId($topicId)
  {
    $this->topicId = $topicId;
  }
  /**
   * @return string
   */
  public function getTopicId()
  {
    return $this->topicId;
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
class_alias(CourseWorkMaterial::class, 'Google_Service_Classroom_CourseWorkMaterial');
