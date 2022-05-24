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

namespace Google\Service\ServiceNetworking;

class ContextRule extends \Google\Collection
{
  protected $collection_key = 'requested';
  /**
   * @var string[]
   */
  public $allowedRequestExtensions;
  /**
   * @var string[]
   */
  public $allowedResponseExtensions;
  /**
   * @var string[]
   */
  public $provided;
  /**
   * @var string[]
   */
  public $requested;
  /**
   * @var string
   */
  public $selector;

  /**
   * @param string[]
   */
  public function setAllowedRequestExtensions($allowedRequestExtensions)
  {
    $this->allowedRequestExtensions = $allowedRequestExtensions;
  }
  /**
   * @return string[]
   */
  public function getAllowedRequestExtensions()
  {
    return $this->allowedRequestExtensions;
  }
  /**
   * @param string[]
   */
  public function setAllowedResponseExtensions($allowedResponseExtensions)
  {
    $this->allowedResponseExtensions = $allowedResponseExtensions;
  }
  /**
   * @return string[]
   */
  public function getAllowedResponseExtensions()
  {
    return $this->allowedResponseExtensions;
  }
  /**
   * @param string[]
   */
  public function setProvided($provided)
  {
    $this->provided = $provided;
  }
  /**
   * @return string[]
   */
  public function getProvided()
  {
    return $this->provided;
  }
  /**
   * @param string[]
   */
  public function setRequested($requested)
  {
    $this->requested = $requested;
  }
  /**
   * @return string[]
   */
  public function getRequested()
  {
    return $this->requested;
  }
  /**
   * @param string
   */
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return string
   */
  public function getSelector()
  {
    return $this->selector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContextRule::class, 'Google_Service_ServiceNetworking_ContextRule');
