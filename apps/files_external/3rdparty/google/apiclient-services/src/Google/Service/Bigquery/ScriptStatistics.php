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

class Google_Service_Bigquery_ScriptStatistics extends Google_Collection
{
  protected $collection_key = 'stackFrames';
  public $evaluationKind;
  protected $stackFramesType = 'Google_Service_Bigquery_ScriptStackFrame';
  protected $stackFramesDataType = 'array';

  public function setEvaluationKind($evaluationKind)
  {
    $this->evaluationKind = $evaluationKind;
  }
  public function getEvaluationKind()
  {
    return $this->evaluationKind;
  }
  /**
   * @param Google_Service_Bigquery_ScriptStackFrame[]
   */
  public function setStackFrames($stackFrames)
  {
    $this->stackFrames = $stackFrames;
  }
  /**
   * @return Google_Service_Bigquery_ScriptStackFrame[]
   */
  public function getStackFrames()
  {
    return $this->stackFrames;
  }
}
