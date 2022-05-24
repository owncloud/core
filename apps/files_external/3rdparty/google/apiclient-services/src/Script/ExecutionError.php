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

namespace Google\Service\Script;

class ExecutionError extends \Google\Collection
{
  protected $collection_key = 'scriptStackTraceElements';
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $errorType;
  protected $scriptStackTraceElementsType = ScriptStackTraceElement::class;
  protected $scriptStackTraceElementsDataType = 'array';

  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param string
   */
  public function setErrorType($errorType)
  {
    $this->errorType = $errorType;
  }
  /**
   * @return string
   */
  public function getErrorType()
  {
    return $this->errorType;
  }
  /**
   * @param ScriptStackTraceElement[]
   */
  public function setScriptStackTraceElements($scriptStackTraceElements)
  {
    $this->scriptStackTraceElements = $scriptStackTraceElements;
  }
  /**
   * @return ScriptStackTraceElement[]
   */
  public function getScriptStackTraceElements()
  {
    return $this->scriptStackTraceElements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutionError::class, 'Google_Service_Script_ExecutionError');
