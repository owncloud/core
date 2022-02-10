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

namespace Google\Service\CloudTrace;

class StackTrace extends \Google\Model
{
  protected $stackFramesType = StackFrames::class;
  protected $stackFramesDataType = '';
  /**
   * @var string
   */
  public $stackTraceHashId;

  /**
   * @param StackFrames
   */
  public function setStackFrames(StackFrames $stackFrames)
  {
    $this->stackFrames = $stackFrames;
  }
  /**
   * @return StackFrames
   */
  public function getStackFrames()
  {
    return $this->stackFrames;
  }
  /**
   * @param string
   */
  public function setStackTraceHashId($stackTraceHashId)
  {
    $this->stackTraceHashId = $stackTraceHashId;
  }
  /**
   * @return string
   */
  public function getStackTraceHashId()
  {
    return $this->stackTraceHashId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StackTrace::class, 'Google_Service_CloudTrace_StackTrace');
