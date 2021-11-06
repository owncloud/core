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

namespace Google\Service\CloudTrace;

class StackFrame extends \Google\Model
{
  public $columnNumber;
  protected $fileNameType = TruncatableString::class;
  protected $fileNameDataType = '';
  protected $functionNameType = TruncatableString::class;
  protected $functionNameDataType = '';
  public $lineNumber;
  protected $loadModuleType = Module::class;
  protected $loadModuleDataType = '';
  protected $originalFunctionNameType = TruncatableString::class;
  protected $originalFunctionNameDataType = '';
  protected $sourceVersionType = TruncatableString::class;
  protected $sourceVersionDataType = '';

  public function setColumnNumber($columnNumber)
  {
    $this->columnNumber = $columnNumber;
  }
  public function getColumnNumber()
  {
    return $this->columnNumber;
  }
  /**
   * @param TruncatableString
   */
  public function setFileName(TruncatableString $fileName)
  {
    $this->fileName = $fileName;
  }
  /**
   * @return TruncatableString
   */
  public function getFileName()
  {
    return $this->fileName;
  }
  /**
   * @param TruncatableString
   */
  public function setFunctionName(TruncatableString $functionName)
  {
    $this->functionName = $functionName;
  }
  /**
   * @return TruncatableString
   */
  public function getFunctionName()
  {
    return $this->functionName;
  }
  public function setLineNumber($lineNumber)
  {
    $this->lineNumber = $lineNumber;
  }
  public function getLineNumber()
  {
    return $this->lineNumber;
  }
  /**
   * @param Module
   */
  public function setLoadModule(Module $loadModule)
  {
    $this->loadModule = $loadModule;
  }
  /**
   * @return Module
   */
  public function getLoadModule()
  {
    return $this->loadModule;
  }
  /**
   * @param TruncatableString
   */
  public function setOriginalFunctionName(TruncatableString $originalFunctionName)
  {
    $this->originalFunctionName = $originalFunctionName;
  }
  /**
   * @return TruncatableString
   */
  public function getOriginalFunctionName()
  {
    return $this->originalFunctionName;
  }
  /**
   * @param TruncatableString
   */
  public function setSourceVersion(TruncatableString $sourceVersion)
  {
    $this->sourceVersion = $sourceVersion;
  }
  /**
   * @return TruncatableString
   */
  public function getSourceVersion()
  {
    return $this->sourceVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StackFrame::class, 'Google_Service_CloudTrace_StackFrame');
