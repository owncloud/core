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

namespace Google\Service\Logging;

class SourceLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $file;
  /**
   * @var string
   */
  public $functionName;
  /**
   * @var string
   */
  public $line;

  /**
   * @param string
   */
  public function setFile($file)
  {
    $this->file = $file;
  }
  /**
   * @return string
   */
  public function getFile()
  {
    return $this->file;
  }
  /**
   * @param string
   */
  public function setFunctionName($functionName)
  {
    $this->functionName = $functionName;
  }
  /**
   * @return string
   */
  public function getFunctionName()
  {
    return $this->functionName;
  }
  /**
   * @param string
   */
  public function setLine($line)
  {
    $this->line = $line;
  }
  /**
   * @return string
   */
  public function getLine()
  {
    return $this->line;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceLocation::class, 'Google_Service_Logging_SourceLocation');
