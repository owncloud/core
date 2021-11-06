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

namespace Google\Service\ToolResults;

class ResultsStorage extends \Google\Model
{
  protected $resultsStoragePathType = FileReference::class;
  protected $resultsStoragePathDataType = '';
  protected $xunitXmlFileType = FileReference::class;
  protected $xunitXmlFileDataType = '';

  /**
   * @param FileReference
   */
  public function setResultsStoragePath(FileReference $resultsStoragePath)
  {
    $this->resultsStoragePath = $resultsStoragePath;
  }
  /**
   * @return FileReference
   */
  public function getResultsStoragePath()
  {
    return $this->resultsStoragePath;
  }
  /**
   * @param FileReference
   */
  public function setXunitXmlFile(FileReference $xunitXmlFile)
  {
    $this->xunitXmlFile = $xunitXmlFile;
  }
  /**
   * @return FileReference
   */
  public function getXunitXmlFile()
  {
    return $this->xunitXmlFile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResultsStorage::class, 'Google_Service_ToolResults_ResultsStorage');
