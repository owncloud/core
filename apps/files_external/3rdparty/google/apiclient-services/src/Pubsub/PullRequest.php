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

class PullRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $maxMessages;
  /**
   * @var bool
   */
  public $returnImmediately;

  /**
   * @param int
   */
  public function setMaxMessages($maxMessages)
  {
    $this->maxMessages = $maxMessages;
  }
  /**
   * @return int
   */
  public function getMaxMessages()
  {
    return $this->maxMessages;
  }
  /**
   * @param bool
   */
  public function setReturnImmediately($returnImmediately)
  {
    $this->returnImmediately = $returnImmediately;
  }
  /**
   * @return bool
   */
  public function getReturnImmediately()
  {
    return $this->returnImmediately;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PullRequest::class, 'Google_Service_Pubsub_PullRequest');
