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

namespace Google\Service\AIPlatformNotebooks;

class VmImage extends \Google\Model
{
  public $imageFamily;
  public $imageName;
  public $project;

  public function setImageFamily($imageFamily)
  {
    $this->imageFamily = $imageFamily;
  }
  public function getImageFamily()
  {
    return $this->imageFamily;
  }
  public function setImageName($imageName)
  {
    $this->imageName = $imageName;
  }
  public function getImageName()
  {
    return $this->imageName;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmImage::class, 'Google_Service_AIPlatformNotebooks_VmImage');
