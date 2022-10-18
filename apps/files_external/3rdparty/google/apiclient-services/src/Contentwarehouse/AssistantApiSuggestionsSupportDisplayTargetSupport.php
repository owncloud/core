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

class AssistantApiSuggestionsSupportDisplayTargetSupport extends \Google\Model
{
  /**
   * @var bool
   */
  public $executedTextSupported;
  /**
   * @var bool
   */
  public $headerTextSupported;
  /**
   * @var bool
   */
  public $repressImpressionSupported;
  /**
   * @var string
   */
  public $target;

  /**
   * @param bool
   */
  public function setExecutedTextSupported($executedTextSupported)
  {
    $this->executedTextSupported = $executedTextSupported;
  }
  /**
   * @return bool
   */
  public function getExecutedTextSupported()
  {
    return $this->executedTextSupported;
  }
  /**
   * @param bool
   */
  public function setHeaderTextSupported($headerTextSupported)
  {
    $this->headerTextSupported = $headerTextSupported;
  }
  /**
   * @return bool
   */
  public function getHeaderTextSupported()
  {
    return $this->headerTextSupported;
  }
  /**
   * @param bool
   */
  public function setRepressImpressionSupported($repressImpressionSupported)
  {
    $this->repressImpressionSupported = $repressImpressionSupported;
  }
  /**
   * @return bool
   */
  public function getRepressImpressionSupported()
  {
    return $this->repressImpressionSupported;
  }
  /**
   * @param string
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSuggestionsSupportDisplayTargetSupport::class, 'Google_Service_Contentwarehouse_AssistantApiSuggestionsSupportDisplayTargetSupport');
