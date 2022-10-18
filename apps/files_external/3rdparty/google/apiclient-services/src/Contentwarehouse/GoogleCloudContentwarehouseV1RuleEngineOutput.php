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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1RuleEngineOutput extends \Google\Model
{
  protected $actionExecutorOutputType = GoogleCloudContentwarehouseV1ActionExecutorOutput::class;
  protected $actionExecutorOutputDataType = '';
  /**
   * @var string
   */
  public $documentName;
  protected $ruleEvaluatorOutputType = GoogleCloudContentwarehouseV1RuleEvaluatorOutput::class;
  protected $ruleEvaluatorOutputDataType = '';

  /**
   * @param GoogleCloudContentwarehouseV1ActionExecutorOutput
   */
  public function setActionExecutorOutput(GoogleCloudContentwarehouseV1ActionExecutorOutput $actionExecutorOutput)
  {
    $this->actionExecutorOutput = $actionExecutorOutput;
  }
  /**
   * @return GoogleCloudContentwarehouseV1ActionExecutorOutput
   */
  public function getActionExecutorOutput()
  {
    return $this->actionExecutorOutput;
  }
  /**
   * @param string
   */
  public function setDocumentName($documentName)
  {
    $this->documentName = $documentName;
  }
  /**
   * @return string
   */
  public function getDocumentName()
  {
    return $this->documentName;
  }
  /**
   * @param GoogleCloudContentwarehouseV1RuleEvaluatorOutput
   */
  public function setRuleEvaluatorOutput(GoogleCloudContentwarehouseV1RuleEvaluatorOutput $ruleEvaluatorOutput)
  {
    $this->ruleEvaluatorOutput = $ruleEvaluatorOutput;
  }
  /**
   * @return GoogleCloudContentwarehouseV1RuleEvaluatorOutput
   */
  public function getRuleEvaluatorOutput()
  {
    return $this->ruleEvaluatorOutput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1RuleEngineOutput::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1RuleEngineOutput');
