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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedChatItemGroupInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $attributeCheckerGroupType;
  /**
   * @var string
   */
  public $groupName;
  /**
   * @var string
   */
  public $groupReadTimeUsec;
  /**
   * @var bool
   */
  public $inlineThreadingEnabled;

  /**
   * @param string
   */
  public function setAttributeCheckerGroupType($attributeCheckerGroupType)
  {
    $this->attributeCheckerGroupType = $attributeCheckerGroupType;
  }
  /**
   * @return string
   */
  public function getAttributeCheckerGroupType()
  {
    return $this->attributeCheckerGroupType;
  }
  /**
   * @param string
   */
  public function setGroupName($groupName)
  {
    $this->groupName = $groupName;
  }
  /**
   * @return string
   */
  public function getGroupName()
  {
    return $this->groupName;
  }
  /**
   * @param string
   */
  public function setGroupReadTimeUsec($groupReadTimeUsec)
  {
    $this->groupReadTimeUsec = $groupReadTimeUsec;
  }
  /**
   * @return string
   */
  public function getGroupReadTimeUsec()
  {
    return $this->groupReadTimeUsec;
  }
  /**
   * @param bool
   */
  public function setInlineThreadingEnabled($inlineThreadingEnabled)
  {
    $this->inlineThreadingEnabled = $inlineThreadingEnabled;
  }
  /**
   * @return bool
   */
  public function getInlineThreadingEnabled()
  {
    return $this->inlineThreadingEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedChatItemGroupInfo::class, 'Google_Service_CloudSearch_AppsDynamiteSharedChatItemGroupInfo');
