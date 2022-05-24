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

namespace Google\Service\Spanner;

class RequestOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $requestTag;
  /**
   * @var string
   */
  public $transactionTag;

  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setRequestTag($requestTag)
  {
    $this->requestTag = $requestTag;
  }
  /**
   * @return string
   */
  public function getRequestTag()
  {
    return $this->requestTag;
  }
  /**
   * @param string
   */
  public function setTransactionTag($transactionTag)
  {
    $this->transactionTag = $transactionTag;
  }
  /**
   * @return string
   */
  public function getTransactionTag()
  {
    return $this->transactionTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestOptions::class, 'Google_Service_Spanner_RequestOptions');
