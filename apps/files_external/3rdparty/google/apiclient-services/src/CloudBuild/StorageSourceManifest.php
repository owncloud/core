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

namespace Google\Service\CloudBuild;

class StorageSourceManifest extends \Google\Model
{
  /**
   * @var string
   */
  public $bucket;
  /**
   * @var string
   */
  public $generation;
  /**
   * @var string
   */
  public $object;

  /**
   * @param string
   */
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  /**
   * @return string
   */
  public function getBucket()
  {
    return $this->bucket;
  }
  /**
   * @param string
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return string
   */
  public function getGeneration()
  {
    return $this->generation;
  }
  /**
   * @param string
   */
  public function setObject($object)
  {
    $this->object = $object;
  }
  /**
   * @return string
   */
  public function getObject()
  {
    return $this->object;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageSourceManifest::class, 'Google_Service_CloudBuild_StorageSourceManifest');
