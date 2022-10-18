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

class AssistantApiSurfacePropertiesExecutionCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $supportsClientOpPreloading;
  /**
   * @var bool
   */
  public $supportsNonFinalizedResponses;
  /**
   * @var bool
   */
  public $supportsNonMaterializedInteractions;

  /**
   * @param bool
   */
  public function setSupportsClientOpPreloading($supportsClientOpPreloading)
  {
    $this->supportsClientOpPreloading = $supportsClientOpPreloading;
  }
  /**
   * @return bool
   */
  public function getSupportsClientOpPreloading()
  {
    return $this->supportsClientOpPreloading;
  }
  /**
   * @param bool
   */
  public function setSupportsNonFinalizedResponses($supportsNonFinalizedResponses)
  {
    $this->supportsNonFinalizedResponses = $supportsNonFinalizedResponses;
  }
  /**
   * @return bool
   */
  public function getSupportsNonFinalizedResponses()
  {
    return $this->supportsNonFinalizedResponses;
  }
  /**
   * @param bool
   */
  public function setSupportsNonMaterializedInteractions($supportsNonMaterializedInteractions)
  {
    $this->supportsNonMaterializedInteractions = $supportsNonMaterializedInteractions;
  }
  /**
   * @return bool
   */
  public function getSupportsNonMaterializedInteractions()
  {
    return $this->supportsNonMaterializedInteractions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSurfacePropertiesExecutionCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiSurfacePropertiesExecutionCapabilities');
