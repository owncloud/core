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

namespace Google\Service\Dfareporting;

class DefaultClickThroughEventTagProperties extends \Google\Model
{
  /**
   * @var string
   */
  public $defaultClickThroughEventTagId;
  /**
   * @var bool
   */
  public $overrideInheritedEventTag;

  /**
   * @param string
   */
  public function setDefaultClickThroughEventTagId($defaultClickThroughEventTagId)
  {
    $this->defaultClickThroughEventTagId = $defaultClickThroughEventTagId;
  }
  /**
   * @return string
   */
  public function getDefaultClickThroughEventTagId()
  {
    return $this->defaultClickThroughEventTagId;
  }
  /**
   * @param bool
   */
  public function setOverrideInheritedEventTag($overrideInheritedEventTag)
  {
    $this->overrideInheritedEventTag = $overrideInheritedEventTag;
  }
  /**
   * @return bool
   */
  public function getOverrideInheritedEventTag()
  {
    return $this->overrideInheritedEventTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DefaultClickThroughEventTagProperties::class, 'Google_Service_Dfareporting_DefaultClickThroughEventTagProperties');
