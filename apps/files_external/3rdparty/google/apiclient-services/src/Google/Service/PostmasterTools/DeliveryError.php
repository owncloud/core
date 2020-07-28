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

class Google_Service_PostmasterTools_DeliveryError extends Google_Model
{
  public $errorClass;
  public $errorRatio;
  public $errorType;

  public function setErrorClass($errorClass)
  {
    $this->errorClass = $errorClass;
  }
  public function getErrorClass()
  {
    return $this->errorClass;
  }
  public function setErrorRatio($errorRatio)
  {
    $this->errorRatio = $errorRatio;
  }
  public function getErrorRatio()
  {
    return $this->errorRatio;
  }
  public function setErrorType($errorType)
  {
    $this->errorType = $errorType;
  }
  public function getErrorType()
  {
    return $this->errorType;
  }
}
