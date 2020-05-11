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

class Google_Service_PolyService_Format extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $formatComplexityType = 'Google_Service_PolyService_FormatComplexity';
  protected $formatComplexityDataType = '';
  public $formatType;
  protected $resourcesType = 'Google_Service_PolyService_PolyFile';
  protected $resourcesDataType = 'array';
  protected $rootType = 'Google_Service_PolyService_PolyFile';
  protected $rootDataType = '';

  /**
   * @param Google_Service_PolyService_FormatComplexity
   */
  public function setFormatComplexity(Google_Service_PolyService_FormatComplexity $formatComplexity)
  {
    $this->formatComplexity = $formatComplexity;
  }
  /**
   * @return Google_Service_PolyService_FormatComplexity
   */
  public function getFormatComplexity()
  {
    return $this->formatComplexity;
  }
  public function setFormatType($formatType)
  {
    $this->formatType = $formatType;
  }
  public function getFormatType()
  {
    return $this->formatType;
  }
  /**
   * @param Google_Service_PolyService_PolyFile
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_PolyService_PolyFile
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param Google_Service_PolyService_PolyFile
   */
  public function setRoot(Google_Service_PolyService_PolyFile $root)
  {
    $this->root = $root;
  }
  /**
   * @return Google_Service_PolyService_PolyFile
   */
  public function getRoot()
  {
    return $this->root;
  }
}
