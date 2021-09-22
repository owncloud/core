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

namespace Google\Service\PolyService;

class Format extends \Google\Collection
{
  protected $collection_key = 'resources';
  protected $formatComplexityType = FormatComplexity::class;
  protected $formatComplexityDataType = '';
  public $formatType;
  protected $resourcesType = PolyFile::class;
  protected $resourcesDataType = 'array';
  protected $rootType = PolyFile::class;
  protected $rootDataType = '';

  /**
   * @param FormatComplexity
   */
  public function setFormatComplexity(FormatComplexity $formatComplexity)
  {
    $this->formatComplexity = $formatComplexity;
  }
  /**
   * @return FormatComplexity
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
   * @param PolyFile[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return PolyFile[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param PolyFile
   */
  public function setRoot(PolyFile $root)
  {
    $this->root = $root;
  }
  /**
   * @return PolyFile
   */
  public function getRoot()
  {
    return $this->root;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Format::class, 'Google_Service_PolyService_Format');
