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

namespace Google\Service\Dataflow;

class StructuredMessage extends \Google\Collection
{
  protected $collection_key = 'parameters';
  /**
   * @var string
   */
  public $messageKey;
  /**
   * @var string
   */
  public $messageText;
  protected $parametersType = Parameter::class;
  protected $parametersDataType = 'array';

  /**
   * @param string
   */
  public function setMessageKey($messageKey)
  {
    $this->messageKey = $messageKey;
  }
  /**
   * @return string
   */
  public function getMessageKey()
  {
    return $this->messageKey;
  }
  /**
   * @param string
   */
  public function setMessageText($messageText)
  {
    $this->messageText = $messageText;
  }
  /**
   * @return string
   */
  public function getMessageText()
  {
    return $this->messageText;
  }
  /**
   * @param Parameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Parameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StructuredMessage::class, 'Google_Service_Dataflow_StructuredMessage');
