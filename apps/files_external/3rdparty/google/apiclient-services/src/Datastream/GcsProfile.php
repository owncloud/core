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

namespace Google\Service\Datastream;

class GcsProfile extends \Google\Model
{
  public $bucketName;
  public $rootPath;

  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  public function getBucketName()
  {
    return $this->bucketName;
  }
  public function setRootPath($rootPath)
  {
    $this->rootPath = $rootPath;
  }
  public function getRootPath()
  {
    return $this->rootPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcsProfile::class, 'Google_Service_Datastream_GcsProfile');
