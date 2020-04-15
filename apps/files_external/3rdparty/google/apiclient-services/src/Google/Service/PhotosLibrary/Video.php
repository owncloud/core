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

class Google_Service_PhotosLibrary_Video extends Google_Model
{
  public $cameraMake;
  public $cameraModel;
  public $fps;
  public $status;

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
  public function setFps($fps)
  {
    $this->fps = $fps;
  }
  public function getFps()
  {
    return $this->fps;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
