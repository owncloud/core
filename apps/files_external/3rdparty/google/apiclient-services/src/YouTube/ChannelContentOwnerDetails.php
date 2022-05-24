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

namespace Google\Service\YouTube;

class ChannelContentOwnerDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $contentOwner;
  /**
   * @var string
   */
  public $timeLinked;

  /**
   * @param string
   */
  public function setContentOwner($contentOwner)
  {
    $this->contentOwner = $contentOwner;
  }
  /**
   * @return string
   */
  public function getContentOwner()
  {
    return $this->contentOwner;
  }
  /**
   * @param string
   */
  public function setTimeLinked($timeLinked)
  {
    $this->timeLinked = $timeLinked;
  }
  /**
   * @return string
   */
  public function getTimeLinked()
  {
    return $this->timeLinked;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelContentOwnerDetails::class, 'Google_Service_YouTube_ChannelContentOwnerDetails');
