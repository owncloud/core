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

namespace Google\Service\Contentwarehouse;

class VideoFileSphericalMetadataFOVBounds extends \Google\Model
{
  public $endTiltInDegrees;
  public $endYawInDegrees;
  public $startTiltInDegrees;
  public $startYawInDegrees;

  public function setEndTiltInDegrees($endTiltInDegrees)
  {
    $this->endTiltInDegrees = $endTiltInDegrees;
  }
  public function getEndTiltInDegrees()
  {
    return $this->endTiltInDegrees;
  }
  public function setEndYawInDegrees($endYawInDegrees)
  {
    $this->endYawInDegrees = $endYawInDegrees;
  }
  public function getEndYawInDegrees()
  {
    return $this->endYawInDegrees;
  }
  public function setStartTiltInDegrees($startTiltInDegrees)
  {
    $this->startTiltInDegrees = $startTiltInDegrees;
  }
  public function getStartTiltInDegrees()
  {
    return $this->startTiltInDegrees;
  }
  public function setStartYawInDegrees($startYawInDegrees)
  {
    $this->startYawInDegrees = $startYawInDegrees;
  }
  public function getStartYawInDegrees()
  {
    return $this->startYawInDegrees;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileSphericalMetadataFOVBounds::class, 'Google_Service_Contentwarehouse_VideoFileSphericalMetadataFOVBounds');
