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

namespace Google\Service\AndroidEnterprise;

class KeyedAppState extends \Google\Model
{
  public $data;
  public $key;
  public $message;
  public $severity;
  public $stateTimestampMillis;

  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setStateTimestampMillis($stateTimestampMillis)
  {
    $this->stateTimestampMillis = $stateTimestampMillis;
  }
  public function getStateTimestampMillis()
  {
    return $this->stateTimestampMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyedAppState::class, 'Google_Service_AndroidEnterprise_KeyedAppState');
