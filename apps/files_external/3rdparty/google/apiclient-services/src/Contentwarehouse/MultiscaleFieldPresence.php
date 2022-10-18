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

class MultiscaleFieldPresence extends \Google\Model
{
  /**
   * @var bool
   */
  public $present;
  /**
   * @var string
   */
  public $wellDefined;

  /**
   * @param bool
   */
  public function setPresent($present)
  {
    $this->present = $present;
  }
  /**
   * @return bool
   */
  public function getPresent()
  {
    return $this->present;
  }
  /**
   * @param string
   */
  public function setWellDefined($wellDefined)
  {
    $this->wellDefined = $wellDefined;
  }
  /**
   * @return string
   */
  public function getWellDefined()
  {
    return $this->wellDefined;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MultiscaleFieldPresence::class, 'Google_Service_Contentwarehouse_MultiscaleFieldPresence');
