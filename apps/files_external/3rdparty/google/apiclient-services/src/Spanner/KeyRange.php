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

namespace Google\Service\Spanner;

class KeyRange extends \Google\Collection
{
  protected $collection_key = 'startOpen';
  /**
   * @var array[]
   */
  public $endClosed;
  /**
   * @var array[]
   */
  public $endOpen;
  /**
   * @var array[]
   */
  public $startClosed;
  /**
   * @var array[]
   */
  public $startOpen;

  /**
   * @param array[]
   */
  public function setEndClosed($endClosed)
  {
    $this->endClosed = $endClosed;
  }
  /**
   * @return array[]
   */
  public function getEndClosed()
  {
    return $this->endClosed;
  }
  /**
   * @param array[]
   */
  public function setEndOpen($endOpen)
  {
    $this->endOpen = $endOpen;
  }
  /**
   * @return array[]
   */
  public function getEndOpen()
  {
    return $this->endOpen;
  }
  /**
   * @param array[]
   */
  public function setStartClosed($startClosed)
  {
    $this->startClosed = $startClosed;
  }
  /**
   * @return array[]
   */
  public function getStartClosed()
  {
    return $this->startClosed;
  }
  /**
   * @param array[]
   */
  public function setStartOpen($startOpen)
  {
    $this->startOpen = $startOpen;
  }
  /**
   * @return array[]
   */
  public function getStartOpen()
  {
    return $this->startOpen;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyRange::class, 'Google_Service_Spanner_KeyRange');
