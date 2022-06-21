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

namespace Google\Service\SecurityCommandCenter;

class MemoryHashSignature extends \Google\Collection
{
  protected $collection_key = 'detections';
  /**
   * @var string
   */
  public $binaryFamily;
  protected $detectionsType = Detection::class;
  protected $detectionsDataType = 'array';

  /**
   * @param string
   */
  public function setBinaryFamily($binaryFamily)
  {
    $this->binaryFamily = $binaryFamily;
  }
  /**
   * @return string
   */
  public function getBinaryFamily()
  {
    return $this->binaryFamily;
  }
  /**
   * @param Detection[]
   */
  public function setDetections($detections)
  {
    $this->detections = $detections;
  }
  /**
   * @return Detection[]
   */
  public function getDetections()
  {
    return $this->detections;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MemoryHashSignature::class, 'Google_Service_SecurityCommandCenter_MemoryHashSignature');
