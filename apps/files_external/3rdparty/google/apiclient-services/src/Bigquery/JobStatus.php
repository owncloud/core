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

class JobStatus extends \Google\Collection
{
  protected $collection_key = 'errors';
  protected $errorResultType = ErrorProto::class;
  protected $errorResultDataType = '';
  protected $errorsType = ErrorProto::class;
  protected $errorsDataType = 'array';
  public $state;

  /**
   * @param ErrorProto
   */
  public function setErrorResult(ErrorProto $errorResult)
  {
    $this->errorResult = $errorResult;
  }
  /**
   * @return ErrorProto
   */
  public function getErrorResult()
  {
    return $this->errorResult;
  }
  /**
   * @param ErrorProto[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ErrorProto[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobStatus::class, 'Google_Service_Bigquery_JobStatus');
