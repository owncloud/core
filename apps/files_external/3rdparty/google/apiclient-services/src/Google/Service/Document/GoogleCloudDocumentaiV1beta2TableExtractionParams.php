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

class Google_Service_Document_GoogleCloudDocumentaiV1beta2TableExtractionParams extends Google_Collection
{
  protected $collection_key = 'tableBoundHints';
  public $enabled;
  public $headerHints;
  public $modelVersion;
  protected $tableBoundHintsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2TableBoundHint';
  protected $tableBoundHintsDataType = 'array';

  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setHeaderHints($headerHints)
  {
    $this->headerHints = $headerHints;
  }
  public function getHeaderHints()
  {
    return $this->headerHints;
  }
  public function setModelVersion($modelVersion)
  {
    $this->modelVersion = $modelVersion;
  }
  public function getModelVersion()
  {
    return $this->modelVersion;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2TableBoundHint
   */
  public function setTableBoundHints($tableBoundHints)
  {
    $this->tableBoundHints = $tableBoundHints;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2TableBoundHint
   */
  public function getTableBoundHints()
  {
    return $this->tableBoundHints;
  }
}
