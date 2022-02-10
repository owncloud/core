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

namespace Google\Service\Games;

class Snapshot extends \Google\Model
{
  protected $coverImageType = SnapshotImage::class;
  protected $coverImageDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $driveId;
  /**
   * @var string
   */
  public $durationMillis;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastModifiedMillis;
  /**
   * @var string
   */
  public $progressValue;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uniqueName;

  /**
   * @param SnapshotImage
   */
  public function setCoverImage(SnapshotImage $coverImage)
  {
    $this->coverImage = $coverImage;
  }
  /**
   * @return SnapshotImage
   */
  public function getCoverImage()
  {
    return $this->coverImage;
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
  public function setDriveId($driveId)
  {
    $this->driveId = $driveId;
  }
  /**
   * @return string
   */
  public function getDriveId()
  {
    return $this->driveId;
  }
  /**
   * @param string
   */
  public function setDurationMillis($durationMillis)
  {
    $this->durationMillis = $durationMillis;
  }
  /**
   * @return string
   */
  public function getDurationMillis()
  {
    return $this->durationMillis;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastModifiedMillis($lastModifiedMillis)
  {
    $this->lastModifiedMillis = $lastModifiedMillis;
  }
  /**
   * @return string
   */
  public function getLastModifiedMillis()
  {
    return $this->lastModifiedMillis;
  }
  /**
   * @param string
   */
  public function setProgressValue($progressValue)
  {
    $this->progressValue = $progressValue;
  }
  /**
   * @return string
   */
  public function getProgressValue()
  {
    return $this->progressValue;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUniqueName($uniqueName)
  {
    $this->uniqueName = $uniqueName;
  }
  /**
   * @return string
   */
  public function getUniqueName()
  {
    return $this->uniqueName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshot::class, 'Google_Service_Games_Snapshot');
