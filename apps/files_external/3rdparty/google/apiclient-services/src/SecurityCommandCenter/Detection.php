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

class Detection extends \Google\Model
{
  /**
   * @var string
   */
  public $binary;
  public $percentPagesMatched;

  /**
   * @param string
   */
  public function setBinary($binary)
  {
    $this->binary = $binary;
  }
  /**
   * @return string
   */
  public function getBinary()
  {
    return $this->binary;
  }
  public function setPercentPagesMatched($percentPagesMatched)
  {
    $this->percentPagesMatched = $percentPagesMatched;
  }
  public function getPercentPagesMatched()
  {
    return $this->percentPagesMatched;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Detection::class, 'Google_Service_SecurityCommandCenter_Detection');
