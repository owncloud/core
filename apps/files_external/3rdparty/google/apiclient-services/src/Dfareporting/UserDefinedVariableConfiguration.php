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

namespace Google\Service\Dfareporting;

class UserDefinedVariableConfiguration extends \Google\Model
{
  /**
   * @var string
   */
  public $dataType;
  /**
   * @var string
   */
  public $reportName;
  /**
   * @var string
   */
  public $variableType;

  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param string
   */
  public function setReportName($reportName)
  {
    $this->reportName = $reportName;
  }
  /**
   * @return string
   */
  public function getReportName()
  {
    return $this->reportName;
  }
  /**
   * @param string
   */
  public function setVariableType($variableType)
  {
    $this->variableType = $variableType;
  }
  /**
   * @return string
   */
  public function getVariableType()
  {
    return $this->variableType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserDefinedVariableConfiguration::class, 'Google_Service_Dfareporting_UserDefinedVariableConfiguration');
