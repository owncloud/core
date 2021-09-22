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

namespace Google\Service\Bigquery;

class JobConfigurationExtract extends \Google\Collection
{
  protected $collection_key = 'destinationUris';
  public $compression;
  public $destinationFormat;
  public $destinationUri;
  public $destinationUris;
  public $fieldDelimiter;
  public $printHeader;
  protected $sourceModelType = ModelReference::class;
  protected $sourceModelDataType = '';
  protected $sourceTableType = TableReference::class;
  protected $sourceTableDataType = '';
  public $useAvroLogicalTypes;

  public function setCompression($compression)
  {
    $this->compression = $compression;
  }
  public function getCompression()
  {
    return $this->compression;
  }
  public function setDestinationFormat($destinationFormat)
  {
    $this->destinationFormat = $destinationFormat;
  }
  public function getDestinationFormat()
  {
    return $this->destinationFormat;
  }
  public function setDestinationUri($destinationUri)
  {
    $this->destinationUri = $destinationUri;
  }
  public function getDestinationUri()
  {
    return $this->destinationUri;
  }
  public function setDestinationUris($destinationUris)
  {
    $this->destinationUris = $destinationUris;
  }
  public function getDestinationUris()
  {
    return $this->destinationUris;
  }
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  public function getFieldDelimiter()
  {
    return $this->fieldDelimiter;
  }
  public function setPrintHeader($printHeader)
  {
    $this->printHeader = $printHeader;
  }
  public function getPrintHeader()
  {
    return $this->printHeader;
  }
  /**
   * @param ModelReference
   */
  public function setSourceModel(ModelReference $sourceModel)
  {
    $this->sourceModel = $sourceModel;
  }
  /**
   * @return ModelReference
   */
  public function getSourceModel()
  {
    return $this->sourceModel;
  }
  /**
   * @param TableReference
   */
  public function setSourceTable(TableReference $sourceTable)
  {
    $this->sourceTable = $sourceTable;
  }
  /**
   * @return TableReference
   */
  public function getSourceTable()
  {
    return $this->sourceTable;
  }
  public function setUseAvroLogicalTypes($useAvroLogicalTypes)
  {
    $this->useAvroLogicalTypes = $useAvroLogicalTypes;
  }
  public function getUseAvroLogicalTypes()
  {
    return $this->useAvroLogicalTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfigurationExtract::class, 'Google_Service_Bigquery_JobConfigurationExtract');
