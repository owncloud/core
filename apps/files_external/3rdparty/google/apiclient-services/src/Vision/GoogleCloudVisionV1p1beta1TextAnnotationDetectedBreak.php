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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak extends \Google\Model
{
  public $isPrefix;
  public $type;

  public function setIsPrefix($isPrefix)
  {
    $this->isPrefix = $isPrefix;
  }
  public function getIsPrefix()
  {
    return $this->isPrefix;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak');
