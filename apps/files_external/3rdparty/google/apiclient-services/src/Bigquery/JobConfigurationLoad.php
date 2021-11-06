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

class JobConfigurationLoad extends \Google\Collection
{
  protected $collection_key = 'sourceUris';
  public $allowJaggedRows;
  public $allowQuotedNewlines;
  public $autodetect;
  protected $clusteringType = Clustering::class;
  protected $clusteringDataType = '';
  public $createDisposition;
  public $decimalTargetTypes;
  protected $destinationEncryptionConfigurationType = EncryptionConfiguration::class;
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = TableReference::class;
  protected $destinationTableDataType = '';
  protected $destinationTablePropertiesType = DestinationTableProperties::class;
  protected $destinationTablePropertiesDataType = '';
  public $encoding;
  public $fieldDelimiter;
  protected $hivePartitioningOptionsType = HivePartitioningOptions::class;
  protected $hivePartitioningOptionsDataType = '';
  public $ignoreUnknownValues;
  public $jsonExtension;
  public $maxBadRecords;
  public $nullMarker;
  protected $parquetOptionsType = ParquetOptions::class;
  protected $parquetOptionsDataType = '';
  public $projectionFields;
  public $quote;
  protected $rangePartitioningType = RangePartitioning::class;
  protected $rangePartitioningDataType = '';
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  public $schemaInline;
  public $schemaInlineFormat;
  public $schemaUpdateOptions;
  public $skipLeadingRows;
  public $sourceFormat;
  public $sourceUris;
  protected $timePartitioningType = TimePartitioning::class;
  protected $timePartitioningDataType = '';
  public $useAvroLogicalTypes;
  public $writeDisposition;

  public function setAllowJaggedRows($allowJaggedRows)
  {
    $this->allowJaggedRows = $allowJaggedRows;
  }
  public function getAllowJaggedRows()
  {
    return $this->allowJaggedRows;
  }
  public function setAllowQuotedNewlines($allowQuotedNewlines)
  {
    $this->allowQuotedNewlines = $allowQuotedNewlines;
  }
  public function getAllowQuotedNewlines()
  {
    return $this->allowQuotedNewlines;
  }
  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  public function getAutodetect()
  {
    return $this->autodetect;
  }
  /**
   * @param Clustering
   */
  public function setClustering(Clustering $clustering)
  {
    $this->clustering = $clustering;
  }
  /**
   * @return Clustering
   */
  public function getClustering()
  {
    return $this->clustering;
  }
  public function setCreateDisposition($createDisposition)
  {
    $this->createDisposition = $createDisposition;
  }
  public function getCreateDisposition()
  {
    return $this->createDisposition;
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
   * @param EncryptionConfiguration
   */
  public function setDestinationEncryptionConfiguration(EncryptionConfiguration $destinationEncryptionConfiguration)
  {
    $this->destinationEncryptionConfiguration = $destinationEncryptionConfiguration;
  }
  /**
   * @return EncryptionConfiguration
   */
  public function getDestinationEncryptionConfiguration()
  {
    return $this->destinationEncryptionConfiguration;
  }
  /**
   * @param TableReference
   */
  public function setDestinationTable(TableReference $destinationTable)
  {
    $this->destinationTable = $destinationTable;
  }
  /**
   * @return TableReference
   */
  public function getDestinationTable()
  {
    return $this->destinationTable;
  }
  /**
   * @param DestinationTableProperties
   */
  public function setDestinationTableProperties(DestinationTableProperties $destinationTableProperties)
  {
    $this->destinationTableProperties = $destinationTableProperties;
  }
  /**
   * @return DestinationTableProperties
   */
  public function getDestinationTableProperties()
  {
    return $this->destinationTableProperties;
  }
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  public function getFieldDelimiter()
  {
    return $this->fieldDelimiter;
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
  public function setJsonExtension($jsonExtension)
  {
    $this->jsonExtension = $jsonExtension;
  }
  public function getJsonExtension()
  {
    return $this->jsonExtension;
  }
  public function setMaxBadRecords($maxBadRecords)
  {
    $this->maxBadRecords = $maxBadRecords;
  }
  public function getMaxBadRecords()
  {
    return $this->maxBadRecords;
  }
  public function setNullMarker($nullMarker)
  {
    $this->nullMarker = $nullMarker;
  }
  public function getNullMarker()
  {
    return $this->nullMarker;
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
  public function setProjectionFields($projectionFields)
  {
    $this->projectionFields = $projectionFields;
  }
  public function getProjectionFields()
  {
    return $this->projectionFields;
  }
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  public function getQuote()
  {
    return $this->quote;
  }
  /**
   * @param RangePartitioning
   */
  public function setRangePartitioning(RangePartitioning $rangePartitioning)
  {
    $this->rangePartitioning = $rangePartitioning;
  }
  /**
   * @return RangePartitioning
   */
  public function getRangePartitioning()
  {
    return $this->rangePartitioning;
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
  public function setSchemaInline($schemaInline)
  {
    $this->schemaInline = $schemaInline;
  }
  public function getSchemaInline()
  {
    return $this->schemaInline;
  }
  public function setSchemaInlineFormat($schemaInlineFormat)
  {
    $this->schemaInlineFormat = $schemaInlineFormat;
  }
  public function getSchemaInlineFormat()
  {
    return $this->schemaInlineFormat;
  }
  public function setSchemaUpdateOptions($schemaUpdateOptions)
  {
    $this->schemaUpdateOptions = $schemaUpdateOptions;
  }
  public function getSchemaUpdateOptions()
  {
    return $this->schemaUpdateOptions;
  }
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
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
  /**
   * @param TimePartitioning
   */
  public function setTimePartitioning(TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return TimePartitioning
   */
  public function getTimePartitioning()
  {
    return $this->timePartitioning;
  }
  public function setUseAvroLogicalTypes($useAvroLogicalTypes)
  {
    $this->useAvroLogicalTypes = $useAvroLogicalTypes;
  }
  public function getUseAvroLogicalTypes()
  {
    return $this->useAvroLogicalTypes;
  }
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfigurationLoad::class, 'Google_Service_Bigquery_JobConfigurationLoad');
