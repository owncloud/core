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

namespace Google\Service\CloudDebugger;

class Breakpoint extends \Google\Collection
{
  protected $collection_key = 'variableTable';
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $canaryExpireTime;
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $createTime;
  protected $evaluatedExpressionsType = Variable::class;
  protected $evaluatedExpressionsDataType = 'array';
  /**
   * @var string[]
   */
  public $expressions;
  /**
   * @var string
   */
  public $finalTime;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isFinalState;
  /**
   * @var string[]
   */
  public $labels;
  protected $locationType = SourceLocation::class;
  protected $locationDataType = '';
  /**
   * @var string
   */
  public $logLevel;
  /**
   * @var string
   */
  public $logMessageFormat;
  protected $stackFramesType = StackFrame::class;
  protected $stackFramesDataType = 'array';
  /**
   * @var string
   */
  public $state;
  protected $statusType = StatusMessage::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $userEmail;
  protected $variableTableType = Variable::class;
  protected $variableTableDataType = 'array';

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setCanaryExpireTime($canaryExpireTime)
  {
    $this->canaryExpireTime = $canaryExpireTime;
  }
  /**
   * @return string
   */
  public function getCanaryExpireTime()
  {
    return $this->canaryExpireTime;
  }
  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Variable[]
   */
  public function setEvaluatedExpressions($evaluatedExpressions)
  {
    $this->evaluatedExpressions = $evaluatedExpressions;
  }
  /**
   * @return Variable[]
   */
  public function getEvaluatedExpressions()
  {
    return $this->evaluatedExpressions;
  }
  /**
   * @param string[]
   */
  public function setExpressions($expressions)
  {
    $this->expressions = $expressions;
  }
  /**
   * @return string[]
   */
  public function getExpressions()
  {
    return $this->expressions;
  }
  /**
   * @param string
   */
  public function setFinalTime($finalTime)
  {
    $this->finalTime = $finalTime;
  }
  /**
   * @return string
   */
  public function getFinalTime()
  {
    return $this->finalTime;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsFinalState($isFinalState)
  {
    $this->isFinalState = $isFinalState;
  }
  /**
   * @return bool
   */
  public function getIsFinalState()
  {
    return $this->isFinalState;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param SourceLocation
   */
  public function setLocation(SourceLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return SourceLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setLogLevel($logLevel)
  {
    $this->logLevel = $logLevel;
  }
  /**
   * @return string
   */
  public function getLogLevel()
  {
    return $this->logLevel;
  }
  /**
   * @param string
   */
  public function setLogMessageFormat($logMessageFormat)
  {
    $this->logMessageFormat = $logMessageFormat;
  }
  /**
   * @return string
   */
  public function getLogMessageFormat()
  {
    return $this->logMessageFormat;
  }
  /**
   * @param StackFrame[]
   */
  public function setStackFrames($stackFrames)
  {
    $this->stackFrames = $stackFrames;
  }
  /**
   * @return StackFrame[]
   */
  public function getStackFrames()
  {
    return $this->stackFrames;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param StatusMessage
   */
  public function setStatus(StatusMessage $status)
  {
    $this->status = $status;
  }
  /**
   * @return StatusMessage
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  /**
   * @return string
   */
  public function getUserEmail()
  {
    return $this->userEmail;
  }
  /**
   * @param Variable[]
   */
  public function setVariableTable($variableTable)
  {
    $this->variableTable = $variableTable;
  }
  /**
   * @return Variable[]
   */
  public function getVariableTable()
  {
    return $this->variableTable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Breakpoint::class, 'Google_Service_CloudDebugger_Breakpoint');
