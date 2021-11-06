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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1Action extends \Google\Collection
{
  protected $collection_key = 'parameters';
  public $function;
  public $loadIndicator;
  protected $parametersType = GoogleAppsCardV1ActionParameter::class;
  protected $parametersDataType = 'array';
  public $persistValues;

  public function setFunction($function)
  {
    $this->function = $function;
  }
  public function getFunction()
  {
    return $this->function;
  }
  public function setLoadIndicator($loadIndicator)
  {
    $this->loadIndicator = $loadIndicator;
  }
  public function getLoadIndicator()
  {
    return $this->loadIndicator;
  }
  /**
   * @param GoogleAppsCardV1ActionParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleAppsCardV1ActionParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setPersistValues($persistValues)
  {
    $this->persistValues = $persistValues;
  }
  public function getPersistValues()
  {
    return $this->persistValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1Action::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1Action');
