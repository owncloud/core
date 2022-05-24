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

namespace Google\Service\Connectors;

class RuntimeActionSchema extends \Google\Collection
{
  protected $collection_key = 'resultMetadata';
  /**
   * @var string
   */
  public $action;
  protected $inputParametersType = InputParameter::class;
  protected $inputParametersDataType = 'array';
  protected $resultMetadataType = ResultMetadata::class;
  protected $resultMetadataDataType = 'array';

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
   * @param InputParameter[]
   */
  public function setInputParameters($inputParameters)
  {
    $this->inputParameters = $inputParameters;
  }
  /**
   * @return InputParameter[]
   */
  public function getInputParameters()
  {
    return $this->inputParameters;
  }
  /**
   * @param ResultMetadata[]
   */
  public function setResultMetadata($resultMetadata)
  {
    $this->resultMetadata = $resultMetadata;
  }
  /**
   * @return ResultMetadata[]
   */
  public function getResultMetadata()
  {
    return $this->resultMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuntimeActionSchema::class, 'Google_Service_Connectors_RuntimeActionSchema');
