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

namespace Google\Service\Drive;

class DriveBackgroundImageFile extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  /**
   * @var float
   */
  public $width;
  /**
   * @var float
   */
  public $xCoordinate;
  /**
   * @var float
   */
  public $yCoordinate;

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
   * @param float
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return float
   */
  public function getWidth()
  {
    return $this->width;
  }
  /**
   * @param float
   */
  public function setXCoordinate($xCoordinate)
  {
    $this->xCoordinate = $xCoordinate;
  }
  /**
   * @return float
   */
  public function getXCoordinate()
  {
    return $this->xCoordinate;
  }
  /**
   * @param float
   */
  public function setYCoordinate($yCoordinate)
  {
    $this->yCoordinate = $yCoordinate;
  }
  /**
   * @return float
   */
  public function getYCoordinate()
  {
    return $this->yCoordinate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveBackgroundImageFile::class, 'Google_Service_Drive_DriveBackgroundImageFile');
