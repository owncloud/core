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

class RetryPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $maximumBackoff;
  /**
   * @var string
   */
  public $minimumBackoff;

  /**
   * @param string
   */
  public function setMaximumBackoff($maximumBackoff)
  {
    $this->maximumBackoff = $maximumBackoff;
  }
  /**
   * @return string
   */
  public function getMaximumBackoff()
  {
    return $this->maximumBackoff;
  }
  /**
   * @param string
   */
  public function setMinimumBackoff($minimumBackoff)
  {
    $this->minimumBackoff = $minimumBackoff;
  }
  /**
   * @return string
   */
  public function getMinimumBackoff()
  {
    return $this->minimumBackoff;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RetryPolicy::class, 'Google_Service_Pubsub_RetryPolicy');
