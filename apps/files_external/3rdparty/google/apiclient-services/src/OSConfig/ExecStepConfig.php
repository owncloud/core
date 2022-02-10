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

namespace Google\Service\OSConfig;

class ExecStepConfig extends \Google\Collection
{
  protected $collection_key = 'allowedSuccessCodes';
  /**
   * @var int[]
   */
  public $allowedSuccessCodes;
  protected $gcsObjectType = GcsObject::class;
  protected $gcsObjectDataType = '';
  /**
   * @var string
   */
  public $interpreter;
  /**
   * @var string
   */
  public $localPath;

  /**
   * @param int[]
   */
  public function setAllowedSuccessCodes($allowedSuccessCodes)
  {
    $this->allowedSuccessCodes = $allowedSuccessCodes;
  }
  /**
   * @return int[]
   */
  public function getAllowedSuccessCodes()
  {
    return $this->allowedSuccessCodes;
  }
  /**
   * @param GcsObject
   */
  public function setGcsObject(GcsObject $gcsObject)
  {
    $this->gcsObject = $gcsObject;
  }
  /**
   * @return GcsObject
   */
  public function getGcsObject()
  {
    return $this->gcsObject;
  }
  /**
   * @param string
   */
  public function setInterpreter($interpreter)
  {
    $this->interpreter = $interpreter;
  }
  /**
   * @return string
   */
  public function getInterpreter()
  {
    return $this->interpreter;
  }
  /**
   * @param string
   */
  public function setLocalPath($localPath)
  {
    $this->localPath = $localPath;
  }
  /**
   * @return string
   */
  public function getLocalPath()
  {
    return $this->localPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecStepConfig::class, 'Google_Service_OSConfig_ExecStepConfig');
