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

class ExternalDataConfiguration extends \Google\Collection
{
  protected $collection_key = 'sourceUris';
  public $autodetect;
  protected $avroOptionsType = AvroOptions::class;
  protected $avroOptionsDataType = '';
  protected $bigtableOptionsType = BigtableOptions::class;
  protected $bigtableOptionsDataType = '';
  public $compression;
  public $connectionId;
  protected $csvOptionsType = CsvOptions::class;
  protected $csvOptionsDataType = '';
  public $decimalTargetTypes;
  protected $googleSheetsOptionsType = GoogleSheetsOptions::class;
  protected $googleSheetsOptionsDataType = '';
  protected $hivePartitioningOptionsType = HivePartitioningOptions::class;
  protected $hivePartitioningOptionsDataType = '';
  public $ignoreUnknownValues;
  public $maxBadRecords;
  protected $parquetOptionsType = ParquetOptions::class;
  protected $parquetOptionsDataType = '';
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  public $sourceFormat;
  public $sourceUris;

  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  public function getAutodetect()
  {
    return $this->autodetect;
  }
  /**
   * @param AvroOptions
   */
  public function setAvroOptions(AvroOptions $avroOptions)
  {
    $this->avroOptions = $avroOptions;
  }
  /**
   * @return AvroOptions
   */
  public function getAvroOptions()
  {
    return $this->avroOptions;
  }
  /**
   * @param BigtableOptions
   */
  public function setBigtableOptions(BigtableOptions $bigtableOptions)
  {
    $this->bigtableOptions = $bigtableOptions;
  }
  /**
   * @return BigtableOptions
   */
  public function getBigtableOptions()
  {
    return $this->bigtableOptions;
  }
  public function setCompression($compression)
  {
    $this->compression = $compression;
  }
  public function getCompression()
  {
    return $this->compression;
  }
  public function setConnectionId($connectionId)
  {
    $this->connectionId = $connectionId;
  }
  public function getConnectionId()
  {
    return $this->connectionId;
  }
  /**
   * @param CsvOptions
   */
  public function setCsvOptions(CsvOptions $csvOptions)
  {
    $this->csvOptions = $csvOptions;
  }
  /**
   * @return CsvOptions
   */
  public function getCsvOptions()
  {
    return $this->csvOptions;
  }
  public function setDecimalTargetTypes($decimalTargetTypes)
  {
    $this->decimalTargetTypes = $decimalTargetTypes;
  }
  public function getDecimalTargetTypes()
  {
    return $this->decimalTargetTypes;
  }
  /**
   * @param GoogleSheetsOptions
   */
  public function setGoogleSheetsOptions(GoogleSheetsOptions $googleSheetsOptions)
  {
    $this->googleSheetsOptions = $googleSheetsOptions;
  }
  /**
   * @return GoogleSheetsOptions
   */
  public function getGoogleSheetsOptions()
  {
    return $this->googleSheetsOptions;
  }
  /**
   * @param HivePartitioningOptions
   */
  public function setHivePartitioningOptions(HivePartitioningOptions $hivePartitioningOptions)
  {
    $this->hivePartitioningOptions = $hivePartitioningOptions;
  }
  /**
   * @return HivePartitioningOptions
   */
  public function getHivePartitioningOptions()
  {
    return $this->hivePartitioningOptions;
  }
  public function setIgnoreUnknownValues($ignoreUnknownValues)
  {
    $this->ignoreUnknownValues = $ignoreUnknownValues;
  }
  public function getIgnoreUnknownValues()
  {
    return $this->ignoreUnknownValues;
  }
  public function setMaxBadRecords($maxBadRecords)
  {
    $this->maxBadRecords = $maxBadRecords;
  }
  public function getMaxBadRecords()
  {
    return $this->maxBadRecords;
  }
  /**
   * @param ParquetOptions
   */
  public function setParquetOptions(ParquetOptions $parquetOptions)
  {
    $this->parquetOptions = $parquetOptions;
  }
  /**
   * @return ParquetOptions
   */
  public function getParquetOptions()
  {
    return $this->parquetOptions;
  }
  /**
   * @param TableSchema
   */
  public function setSchema(TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return TableSchema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setSourceFormat($sourceFormat)
  {
    $this->sourceFormat = $sourceFormat;
  }
  public function getSourceFormat()
  {
    return $this->sourceFormat;
  }
  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }
  public function getSourceUris()
  {
    return $this->sourceUris;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExternalDataConfiguration::class, 'Google_Service_Bigquery_ExternalDataConfiguration');
