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

class AssistantApiJwnCapabilities extends \Google\Collection
{
  protected $collection_key = 'supportedCompressionMode';
  /**
   * @var string[]
   */
  public $librariesVersionMap;
  /**
   * @var string[]
   */
  public $supportedCompressionMode;
  /**
   * @var bool
   */
  public $supportsJwn;

  /**
   * @param string[]
   */
  public function setLibrariesVersionMap($librariesVersionMap)
  {
    $this->librariesVersionMap = $librariesVersionMap;
  }
  /**
   * @return string[]
   */
  public function getLibrariesVersionMap()
  {
    return $this->librariesVersionMap;
  }
  /**
   * @param string[]
   */
  public function setSupportedCompressionMode($supportedCompressionMode)
  {
    $this->supportedCompressionMode = $supportedCompressionMode;
  }
  /**
   * @return string[]
   */
  public function getSupportedCompressionMode()
  {
    return $this->supportedCompressionMode;
  }
  /**
   * @param bool
   */
  public function setSupportsJwn($supportsJwn)
  {
    $this->supportsJwn = $supportsJwn;
  }
  /**
   * @return bool
   */
  public function getSupportsJwn()
  {
    return $this->supportsJwn;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiJwnCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiJwnCapabilities');
