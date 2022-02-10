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

namespace Google\Service\Pubsub;

class ModifyAckDeadlineRequest extends \Google\Collection
{
  protected $collection_key = 'ackIds';
  /**
   * @var int
   */
  public $ackDeadlineSeconds;
  /**
   * @var string[]
   */
  public $ackIds;

  /**
   * @param int
   */
  public function setAckDeadlineSeconds($ackDeadlineSeconds)
  {
    $this->ackDeadlineSeconds = $ackDeadlineSeconds;
  }
  /**
   * @return int
   */
  public function getAckDeadlineSeconds()
  {
    return $this->ackDeadlineSeconds;
  }
  /**
   * @param string[]
   */
  public function setAckIds($ackIds)
  {
    $this->ackIds = $ackIds;
  }
  /**
   * @return string[]
   */
  public function getAckIds()
  {
    return $this->ackIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ModifyAckDeadlineRequest::class, 'Google_Service_Pubsub_ModifyAckDeadlineRequest');
