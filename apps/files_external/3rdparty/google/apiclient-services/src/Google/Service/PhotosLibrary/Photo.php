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

class Google_Service_PhotosLibrary_Photo extends Google_Model
{
  public $apertureFNumber;
  public $cameraMake;
  public $cameraModel;
  public $exposureTime;
  public $focalLength;
  public $isoEquivalent;

  public function setApertureFNumber($apertureFNumber)
  {
    $this->apertureFNumber = $apertureFNumber;
  }
  public function getApertureFNumber()
  {
    return $this->apertureFNumber;
  }
  public function setCameraMake($cameraMake)
  {
    $this->cameraMake = $cameraMake;
  }
  public function getCameraMake()
  {
    return $this->cameraMake;
  }
  public function setCameraModel($cameraModel)
  {
    $this->cameraModel = $cameraModel;
  }
  public function getCameraModel()
  {
    return $this->cameraModel;
  }
  public function setExposureTime($exposureTime)
  {
    $this->exposureTime = $exposureTime;
  }
  public function getExposureTime()
  {
    return $this->exposureTime;
  }
  public function setFocalLength($focalLength)
  {
    $this->focalLength = $focalLength;
  }
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  public function setIsoEquivalent($isoEquivalent)
  {
    $this->isoEquivalent = $isoEquivalent;
  }
  public function getIsoEquivalent()
  {
    return $this->isoEquivalent;
  }
}
