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

class KnowledgeAnswersSensitivityLoggingPolicy extends \Google\Model
{
  /**
   * @var bool
   */
  public $scrubArgumentValue;
  /**
   * @var bool
   */
  public $scrubContext;

  /**
   * @param bool
   */
  public function setScrubArgumentValue($scrubArgumentValue)
  {
    $this->scrubArgumentValue = $scrubArgumentValue;
  }
  /**
   * @return bool
   */
  public function getScrubArgumentValue()
  {
    return $this->scrubArgumentValue;
  }
  /**
   * @param bool
   */
  public function setScrubContext($scrubContext)
  {
    $this->scrubContext = $scrubContext;
  }
  /**
   * @return bool
   */
  public function getScrubContext()
  {
    return $this->scrubContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersSensitivityLoggingPolicy::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivityLoggingPolicy');
