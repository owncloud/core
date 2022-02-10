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

namespace Google\Service\Dataproc;

class NodeInitializationAction extends \Google\Model
{
  /**
   * @var string
   */
  public $executableFile;
  /**
   * @var string
   */
  public $executionTimeout;

  /**
   * @param string
   */
  public function setExecutableFile($executableFile)
  {
    $this->executableFile = $executableFile;
  }
  /**
   * @return string
   */
  public function getExecutableFile()
  {
    return $this->executableFile;
  }
  /**
   * @param string
   */
  public function setExecutionTimeout($executionTimeout)
  {
    $this->executionTimeout = $executionTimeout;
  }
  /**
   * @return string
   */
  public function getExecutionTimeout()
  {
    return $this->executionTimeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeInitializationAction::class, 'Google_Service_Dataproc_NodeInitializationAction');
