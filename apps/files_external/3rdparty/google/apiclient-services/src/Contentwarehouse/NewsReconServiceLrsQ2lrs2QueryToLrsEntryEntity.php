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

class NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity extends \Google\Model
{
  /**
   * @var int
   */
  public $debugIndex;
  /**
   * @var string
   */
  public $debugName;
  /**
   * @var string
   */
  public $encodedMid;
  /**
   * @var string
   */
  public $mid;

  /**
   * @param int
   */
  public function setDebugIndex($debugIndex)
  {
    $this->debugIndex = $debugIndex;
  }
  /**
   * @return int
   */
  public function getDebugIndex()
  {
    return $this->debugIndex;
  }
  /**
   * @param string
   */
  public function setDebugName($debugName)
  {
    $this->debugName = $debugName;
  }
  /**
   * @return string
   */
  public function getDebugName()
  {
    return $this->debugName;
  }
  /**
   * @param string
   */
  public function setEncodedMid($encodedMid)
  {
    $this->encodedMid = $encodedMid;
  }
  /**
   * @return string
   */
  public function getEncodedMid()
  {
    return $this->encodedMid;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity::class, 'Google_Service_Contentwarehouse_NewsReconServiceLrsQ2lrs2QueryToLrsEntryEntity');
