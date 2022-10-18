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

namespace Google\Service\CloudSearch;

class FormAction extends \Google\Collection
{
  protected $collection_key = 'parameters';
  /**
   * @var string
   */
  public $actionMethodName;
  /**
   * @var string
   */
  public $loadIndicator;
  protected $parametersType = ActionParameter::class;
  protected $parametersDataType = 'array';
  /**
   * @var bool
   */
  public $persistValues;

  /**
   * @param string
   */
  public function setActionMethodName($actionMethodName)
  {
    $this->actionMethodName = $actionMethodName;
  }
  /**
   * @return string
   */
  public function getActionMethodName()
  {
    return $this->actionMethodName;
  }
  /**
   * @param string
   */
  public function setLoadIndicator($loadIndicator)
  {
    $this->loadIndicator = $loadIndicator;
  }
  /**
   * @return string
   */
  public function getLoadIndicator()
  {
    return $this->loadIndicator;
  }
  /**
   * @param ActionParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return ActionParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param bool
   */
  public function setPersistValues($persistValues)
  {
    $this->persistValues = $persistValues;
  }
  /**
   * @return bool
   */
  public function getPersistValues()
  {
    return $this->persistValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FormAction::class, 'Google_Service_CloudSearch_FormAction');
