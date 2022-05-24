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

class DriveFileImageMediaMetadata extends \Google\Model
{
  /**
   * @var float
   */
  public $aperture;
  /**
   * @var string
   */
  public $cameraMake;
  /**
   * @var string
   */
  public $cameraModel;
  /**
   * @var string
   */
  public $colorSpace;
  /**
   * @var float
   */
  public $exposureBias;
  /**
   * @var string
   */
  public $exposureMode;
  /**
   * @var float
   */
  public $exposureTime;
  /**
   * @var bool
   */
  public $flashUsed;
  /**
   * @var float
   */
  public $focalLength;
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $isoSpeed;
  /**
   * @var string
   */
  public $lens;
  protected $locationType = DriveFileImageMediaMetadataLocation::class;
  protected $locationDataType = '';
  /**
   * @var float
   */
  public $maxApertureValue;
  /**
   * @var string
   */
  public $meteringMode;
  /**
   * @var int
   */
  public $rotation;
  /**
   * @var string
   */
  public $sensor;
  /**
   * @var int
   */
  public $subjectDistance;
  /**
   * @var string
   */
  public $time;
  /**
   * @var string
   */
  public $whiteBalance;
  /**
   * @var int
   */
  public $width;

  /**
   * @param float
   */
  public function setAperture($aperture)
  {
    $this->aperture = $aperture;
  }
  /**
   * @return float
   */
  public function getAperture()
  {
    return $this->aperture;
  }
  /**
   * @param string
   */
  public function setCameraMake($cameraMake)
  {
    $this->cameraMake = $cameraMake;
  }
  /**
   * @return string
   */
  public function getCameraMake()
  {
    return $this->cameraMake;
  }
  /**
   * @param string
   */
  public function setCameraModel($cameraModel)
  {
    $this->cameraModel = $cameraModel;
  }
  /**
   * @return string
   */
  public function getCameraModel()
  {
    return $this->cameraModel;
  }
  /**
   * @param string
   */
  public function setColorSpace($colorSpace)
  {
    $this->colorSpace = $colorSpace;
  }
  /**
   * @return string
   */
  public function getColorSpace()
  {
    return $this->colorSpace;
  }
  /**
   * @param float
   */
  public function setExposureBias($exposureBias)
  {
    $this->exposureBias = $exposureBias;
  }
  /**
   * @return float
   */
  public function getExposureBias()
  {
    return $this->exposureBias;
  }
  /**
   * @param string
   */
  public function setExposureMode($exposureMode)
  {
    $this->exposureMode = $exposureMode;
  }
  /**
   * @return string
   */
  public function getExposureMode()
  {
    return $this->exposureMode;
  }
  /**
   * @param float
   */
  public function setExposureTime($exposureTime)
  {
    $this->exposureTime = $exposureTime;
  }
  /**
   * @return float
   */
  public function getExposureTime()
  {
    return $this->exposureTime;
  }
  /**
   * @param bool
   */
  public function setFlashUsed($flashUsed)
  {
    $this->flashUsed = $flashUsed;
  }
  /**
   * @return bool
   */
  public function getFlashUsed()
  {
    return $this->flashUsed;
  }
  /**
   * @param float
   */
  public function setFocalLength($focalLength)
  {
    $this->focalLength = $focalLength;
  }
  /**
   * @return float
   */
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param int
   */
  public function setIsoSpeed($isoSpeed)
  {
    $this->isoSpeed = $isoSpeed;
  }
  /**
   * @return int
   */
  public function getIsoSpeed()
  {
    return $this->isoSpeed;
  }
  /**
   * @param string
   */
  public function setLens($lens)
  {
    $this->lens = $lens;
  }
  /**
   * @return string
   */
  public function getLens()
  {
    return $this->lens;
  }
  /**
   * @param DriveFileImageMediaMetadataLocation
   */
  public function setLocation(DriveFileImageMediaMetadataLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return DriveFileImageMediaMetadataLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param float
   */
  public function setMaxApertureValue($maxApertureValue)
  {
    $this->maxApertureValue = $maxApertureValue;
  }
  /**
   * @return float
   */
  public function getMaxApertureValue()
  {
    return $this->maxApertureValue;
  }
  /**
   * @param string
   */
  public function setMeteringMode($meteringMode)
  {
    $this->meteringMode = $meteringMode;
  }
  /**
   * @return string
   */
  public function getMeteringMode()
  {
    return $this->meteringMode;
  }
  /**
   * @param int
   */
  public function setRotation($rotation)
  {
    $this->rotation = $rotation;
  }
  /**
   * @return int
   */
  public function getRotation()
  {
    return $this->rotation;
  }
  /**
   * @param string
   */
  public function setSensor($sensor)
  {
    $this->sensor = $sensor;
  }
  /**
   * @return string
   */
  public function getSensor()
  {
    return $this->sensor;
  }
  /**
   * @param int
   */
  public function setSubjectDistance($subjectDistance)
  {
    $this->subjectDistance = $subjectDistance;
  }
  /**
   * @return int
   */
  public function getSubjectDistance()
  {
    return $this->subjectDistance;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param string
   */
  public function setWhiteBalance($whiteBalance)
  {
    $this->whiteBalance = $whiteBalance;
  }
  /**
   * @return string
   */
  public function getWhiteBalance()
  {
    return $this->whiteBalance;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFileImageMediaMetadata::class, 'Google_Service_Drive_DriveFileImageMediaMetadata');
