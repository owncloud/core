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

class Google_Service_Digitalassetlinks_ListResponse extends Google_Collection
{
  protected $collection_key = 'statements';
  public $debugString;
  public $errorCode;
  public $maxAge;
  protected $statementsType = 'Google_Service_Digitalassetlinks_Statement';
  protected $statementsDataType = 'array';

  public function setDebugString($debugString)
  {
    $this->debugString = $debugString;
  }
  public function getDebugString()
  {
    return $this->debugString;
  }
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  public function getMaxAge()
  {
    return $this->maxAge;
  }
  /**
   * @param Google_Service_Digitalassetlinks_Statement
   */
  public function setStatements($statements)
  {
    $this->statements = $statements;
  }
  /**
   * @return Google_Service_Digitalassetlinks_Statement
   */
  public function getStatements()
  {
    return $this->statements;
  }
}
