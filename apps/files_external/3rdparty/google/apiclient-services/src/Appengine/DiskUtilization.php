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

namespace Google\Service\Appengine;

class DiskUtilization extends \Google\Model
{
  /**
   * @var int
   */
  public $targetReadBytesPerSecond;
  /**
   * @var int
   */
  public $targetReadOpsPerSecond;
  /**
   * @var int
   */
  public $targetWriteBytesPerSecond;
  /**
   * @var int
   */
  public $targetWriteOpsPerSecond;

  /**
   * @param int
   */
  public function setTargetReadBytesPerSecond($targetReadBytesPerSecond)
  {
    $this->targetReadBytesPerSecond = $targetReadBytesPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetReadBytesPerSecond()
  {
    return $this->targetReadBytesPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetReadOpsPerSecond($targetReadOpsPerSecond)
  {
    $this->targetReadOpsPerSecond = $targetReadOpsPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetReadOpsPerSecond()
  {
    return $this->targetReadOpsPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetWriteBytesPerSecond($targetWriteBytesPerSecond)
  {
    $this->targetWriteBytesPerSecond = $targetWriteBytesPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetWriteBytesPerSecond()
  {
    return $this->targetWriteBytesPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetWriteOpsPerSecond($targetWriteOpsPerSecond)
  {
    $this->targetWriteOpsPerSecond = $targetWriteOpsPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetWriteOpsPerSecond()
  {
    return $this->targetWriteOpsPerSecond;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiskUtilization::class, 'Google_Service_Appengine_DiskUtilization');
