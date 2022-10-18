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

namespace Google\Service\Directory;

class PrintServerFailureInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $errorCode;
  /**
   * @var string
   */
  public $errorMessage;
  protected $printServerType = PrintServer::class;
  protected $printServerDataType = '';
  /**
   * @var string
   */
  public $printServerId;

  /**
   * @param string
   */
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  /**
   * @return string
   */
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param PrintServer
   */
  public function setPrintServer(PrintServer $printServer)
  {
    $this->printServer = $printServer;
  }
  /**
   * @return PrintServer
   */
  public function getPrintServer()
  {
    return $this->printServer;
  }
  /**
   * @param string
   */
  public function setPrintServerId($printServerId)
  {
    $this->printServerId = $printServerId;
  }
  /**
   * @return string
   */
  public function getPrintServerId()
  {
    return $this->printServerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrintServerFailureInfo::class, 'Google_Service_Directory_PrintServerFailureInfo');
