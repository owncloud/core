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

namespace Google\Service\ToolResults;

class UIElementTooDeep extends \Google\Model
{
  /**
   * @var int
   */
  public $depth;
  /**
   * @var string
   */
  public $screenId;
  /**
   * @var string
   */
  public $screenStateId;

  /**
   * @param int
   */
  public function setDepth($depth)
  {
    $this->depth = $depth;
  }
  /**
   * @return int
   */
  public function getDepth()
  {
    return $this->depth;
  }
  /**
   * @param string
   */
  public function setScreenId($screenId)
  {
    $this->screenId = $screenId;
  }
  /**
   * @return string
   */
  public function getScreenId()
  {
    return $this->screenId;
  }
  /**
   * @param string
   */
  public function setScreenStateId($screenStateId)
  {
    $this->screenStateId = $screenStateId;
  }
  /**
   * @return string
   */
  public function getScreenStateId()
  {
    return $this->screenStateId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UIElementTooDeep::class, 'Google_Service_ToolResults_UIElementTooDeep');
