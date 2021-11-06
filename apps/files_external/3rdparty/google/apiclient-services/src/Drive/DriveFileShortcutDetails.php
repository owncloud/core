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

class DriveFileShortcutDetails extends \Google\Model
{
  public $targetId;
  public $targetMimeType;
  public $targetResourceKey;

  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  public function getTargetId()
  {
    return $this->targetId;
  }
  public function setTargetMimeType($targetMimeType)
  {
    $this->targetMimeType = $targetMimeType;
  }
  public function getTargetMimeType()
  {
    return $this->targetMimeType;
  }
  public function setTargetResourceKey($targetResourceKey)
  {
    $this->targetResourceKey = $targetResourceKey;
  }
  public function getTargetResourceKey()
  {
    return $this->targetResourceKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFileShortcutDetails::class, 'Google_Service_Drive_DriveFileShortcutDetails');
