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

namespace Google\Service\PubsubLite;

class SeekSubscriptionRequest extends \Google\Model
{
  public $namedTarget;
  protected $timeTargetType = TimeTarget::class;
  protected $timeTargetDataType = '';

  public function setNamedTarget($namedTarget)
  {
    $this->namedTarget = $namedTarget;
  }
  public function getNamedTarget()
  {
    return $this->namedTarget;
  }
  /**
   * @param TimeTarget
   */
  public function setTimeTarget(TimeTarget $timeTarget)
  {
    $this->timeTarget = $timeTarget;
  }
  /**
   * @return TimeTarget
   */
  public function getTimeTarget()
  {
    return $this->timeTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SeekSubscriptionRequest::class, 'Google_Service_PubsubLite_SeekSubscriptionRequest');
