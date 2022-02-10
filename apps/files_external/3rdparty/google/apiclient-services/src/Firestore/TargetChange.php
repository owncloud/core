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

namespace Google\Service\Firestore;

class TargetChange extends \Google\Collection
{
  protected $collection_key = 'targetIds';
  protected $causeType = Status::class;
  protected $causeDataType = '';
  /**
   * @var string
   */
  public $readTime;
  /**
   * @var string
   */
  public $resumeToken;
  /**
   * @var string
   */
  public $targetChangeType;
  /**
   * @var int[]
   */
  public $targetIds;

  /**
   * @param Status
   */
  public function setCause(Status $cause)
  {
    $this->cause = $cause;
  }
  /**
   * @return Status
   */
  public function getCause()
  {
    return $this->cause;
  }
  /**
   * @param string
   */
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  /**
   * @return string
   */
  public function getReadTime()
  {
    return $this->readTime;
  }
  /**
   * @param string
   */
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  /**
   * @return string
   */
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  /**
   * @param string
   */
  public function setTargetChangeType($targetChangeType)
  {
    $this->targetChangeType = $targetChangeType;
  }
  /**
   * @return string
   */
  public function getTargetChangeType()
  {
    return $this->targetChangeType;
  }
  /**
   * @param int[]
   */
  public function setTargetIds($targetIds)
  {
    $this->targetIds = $targetIds;
  }
  /**
   * @return int[]
   */
  public function getTargetIds()
  {
    return $this->targetIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetChange::class, 'Google_Service_Firestore_TargetChange');
