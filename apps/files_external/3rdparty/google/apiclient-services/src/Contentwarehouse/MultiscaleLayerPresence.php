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

class MultiscaleLayerPresence extends \Google\Model
{
  /**
   * @var int
   */
  public $implicitLength;
  /**
   * @var bool
   */
  public $present;

  /**
   * @param int
   */
  public function setImplicitLength($implicitLength)
  {
    $this->implicitLength = $implicitLength;
  }
  /**
   * @return int
   */
  public function getImplicitLength()
  {
    return $this->implicitLength;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MultiscaleLayerPresence::class, 'Google_Service_Contentwarehouse_MultiscaleLayerPresence');
