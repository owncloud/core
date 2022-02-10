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

namespace Google\Service\Bigquery;

class ScriptStatistics extends \Google\Collection
{
  protected $collection_key = 'stackFrames';
  /**
   * @var string
   */
  public $evaluationKind;
  protected $stackFramesType = ScriptStackFrame::class;
  protected $stackFramesDataType = 'array';

  /**
   * @param string
   */
  public function setEvaluationKind($evaluationKind)
  {
    $this->evaluationKind = $evaluationKind;
  }
  /**
   * @return string
   */
  public function getEvaluationKind()
  {
    return $this->evaluationKind;
  }
  /**
   * @param ScriptStackFrame[]
   */
  public function setStackFrames($stackFrames)
  {
    $this->stackFrames = $stackFrames;
  }
  /**
   * @return ScriptStackFrame[]
   */
  public function getStackFrames()
  {
    return $this->stackFrames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScriptStatistics::class, 'Google_Service_Bigquery_ScriptStatistics');
