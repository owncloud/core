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

namespace Google\Service\OSConfig;

class OSPolicyResourceExecResourceExec extends \Google\Collection
{
  protected $collection_key = 'args';
  public $args;
  protected $fileType = OSPolicyResourceFile::class;
  protected $fileDataType = '';
  public $interpreter;
  public $outputFilePath;
  public $script;

  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param OSPolicyResourceFile
   */
  public function setFile(OSPolicyResourceFile $file)
  {
    $this->file = $file;
  }
  /**
   * @return OSPolicyResourceFile
   */
  public function getFile()
  {
    return $this->file;
  }
  public function setInterpreter($interpreter)
  {
    $this->interpreter = $interpreter;
  }
  public function getInterpreter()
  {
    return $this->interpreter;
  }
  public function setOutputFilePath($outputFilePath)
  {
    $this->outputFilePath = $outputFilePath;
  }
  public function getOutputFilePath()
  {
    return $this->outputFilePath;
  }
  public function setScript($script)
  {
    $this->script = $script;
  }
  public function getScript()
  {
    return $this->script;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourceExecResourceExec::class, 'Google_Service_OSConfig_OSPolicyResourceExecResourceExec');
