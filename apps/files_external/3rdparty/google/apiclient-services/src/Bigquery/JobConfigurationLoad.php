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
  /**
   * @var bool
   */
  public $allowJaggedRows;
  /**
   * @var bool
   */
  public $allowQuotedNewlines;
  /**
   * @var bool
   */
  public $autodetect;
  protected $clusteringType = Clustering::class;
  protected $clusteringDataType = '';
  protected $connectionPropertiesType = ConnectionProperty::class;
  protected $connectionPropertiesDataType = 'array';
  /**
   * @var string
   */
  public $createDisposition;
  /**
   * @var bool
   */
  public $createSession;
  /**
   * @var string[]
   */
  public $decimalTargetTypes;
  protected $destinationEncryptionConfigurationType = EncryptionConfiguration::class;
  protected $destinationEncryptionConfigurationDataType = '';
  protected $destinationTableType = TableReference::class;
  protected $destinationTableDataType = '';
  protected $destinationTablePropertiesType = DestinationTableProperties::class;
  protected $destinationTablePropertiesDataType = '';
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var string
   */
  public $fieldDelimiter;
  protected $hivePartitioningOptionsType = HivePartitioningOptions::class;
  protected $hivePartitioningOptionsDataType = '';
  /**
   * @var bool
   */
  public $ignoreUnknownValues;
  /**
   * @var string
   */
  public $jsonExtension;
  /**
   * @var int
   */
  public $maxBadRecords;
  /**
   * @var string
   */
  public $nullMarker;
  protected $parquetOptionsType = ParquetOptions::class;
  protected $parquetOptionsDataType = '';
  /**
   * @var bool
   */
  public $preserveAsciiControlCharacters;
  /**
   * @var string[]
   */
  public $projectionFields;
  /**
   * @var string
   */
  public $quote;
  protected $rangePartitioningType = RangePartitioning::class;
  protected $rangePartitioningDataType = '';
  /**
   * @var string
   */
  public $referenceFileSchemaUri;
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  /**
   * @var string
   */
  public $schemaInline;
  /**
   * @var string
   */
  public $schemaInlineFormat;
  /**
   * @var string[]
   */
  public $schemaUpdateOptions;
  /**
   * @var int
   */
  public $skipLeadingRows;
  /**
   * @var string
   */
  public $sourceFormat;
  /**
   * @var string[]
   */
  public $sourceUris;
  protected $timePartitioningType = TimePartitioning::class;
  protected $timePartitioningDataType = '';
  /**
   * @var bool
   */
  public $useAvroLogicalTypes;
  /**
   * @var string
   */
  public $writeDisposition;

  /**
   * @param bool
   */
  public function setAllowJaggedRows($allowJaggedRows)
  {
    $this->allowJaggedRows = $allowJaggedRows;
  }
  /**
   * @return bool
   */
  public function getAllowJaggedRows()
  {
    return $this->allowJaggedRows;
  }
  /**
   * @param bool
   */
  public function setAllowQuotedNewlines($allowQuotedNewlines)
  {
    $this->allowQuotedNewlines = $allowQuotedNewlines;
  }
  /**
   * @return bool
   */
  public function getAllowQuotedNewlines()
  {
    return $this->allowQuotedNewlines;
  }
  /**
   * @param bool
   */
  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  /**
   * @return bool
   */
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
  /**
   * @param ConnectionProperty[]
   */
  public function setConnectionProperties($connectionProperties)
  {
    $this->connectionProperties = $connectionProperties;
  }
  /**
   * @return ConnectionProperty[]
   */
  public function getConnectionProperties()
  {
    return $this->connectionProperties;
  }
  /**
   * @param string
   */
  public function setCreateDisposition($createDisposition)
  {
    $this->createDisposition = $createDisposition;
  }
  /**
   * @return string
   */
  public function getCreateDisposition()
  {
    return $this->createDisposition;
  }
  /**
   * @param bool
   */
  public function setCreateSession($createSession)
  {
    $this->createSession = $createSession;
  }
  /**
   * @return bool
   */
  public function getCreateSession()
  {
    return $this->createSession;
  }
  /**
   * @param string[]
   */
  public function setDecimalTargetTypes($decimalTargetTypes)
  {
    $this->decimalTargetTypes = $decimalTargetTypes;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return string
   */
  public function getEncoding()
  {
    return $this->encoding;
  }
  /**
   * @param string
   */
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  /**
   * @return string
   */
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
  /**
   * @param bool
   */
  public function setIgnoreUnknownValues($ignoreUnknownValues)
  {
    $this->ignoreUnknownValues = $ignoreUnknownValues;
  }
  /**
   * @return bool
   */
  public function getIgnoreUnknownValues()
  {
    return $this->ignoreUnknownValues;
  }
  /**
   * @param string
   */
  public function setJsonExtension($jsonExtension)
  {
    $this->jsonExtension = $jsonExtension;
  }
  /**
   * @return string
   */
  public function getJsonExtension()
  {
    return $this->jsonExtension;
  }
  /**
   * @param int
   */
  public function setMaxBadRecords($maxBadRecords)
  {
    $this->maxBadRecords = $maxBadRecords;
  }
  /**
   * @return int
   */
  public function getMaxBadRecords()
  {
    return $this->maxBadRecords;
  }
  /**
   * @param string
   */
  public function setNullMarker($nullMarker)
  {
    $this->nullMarker = $nullMarker;
  }
  /**
   * @return string
   */
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
  /**
   * @param bool
   */
  public function setPreserveAsciiControlCharacters($preserveAsciiControlCharacters)
  {
    $this->preserveAsciiControlCharacters = $preserveAsciiControlCharacters;
  }
  /**
   * @return bool
   */
  public function getPreserveAsciiControlCharacters()
  {
    return $this->preserveAsciiControlCharacters;
  }
  /**
   * @param string[]
   */
  public function setProjectionFields($projectionFields)
  {
    $this->projectionFields = $projectionFields;
  }
  /**
   * @return string[]
   */
  public function getProjectionFields()
  {
    return $this->projectionFields;
  }
  /**
   * @param string
   */
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setReferenceFileSchemaUri($referenceFileSchemaUri)
  {
    $this->referenceFileSchemaUri = $referenceFileSchemaUri;
  }
  /**
   * @return string
   */
  public function getReferenceFileSchemaUri()
  {
    return $this->referenceFileSchemaUri;
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
  /**
   * @param string
   */
  public function setSchemaInline($schemaInline)
  {
    $this->schemaInline = $schemaInline;
  }
  /**
   * @return string
   */
  public function getSchemaInline()
  {
    return $this->schemaInline;
  }
  /**
   * @param string
   */
  public function setSchemaInlineFormat($schemaInlineFormat)
  {
    $this->schemaInlineFormat = $schemaInlineFormat;
  }
  /**
   * @return string
   */
  public function getSchemaInlineFormat()
  {
    return $this->schemaInlineFormat;
  }
  /**
   * @param string[]
   */
  public function setSchemaUpdateOptions($schemaUpdateOptions)
  {
    $this->schemaUpdateOptions = $schemaUpdateOptions;
  }
  /**
   * @return string[]
   */
  public function getSchemaUpdateOptions()
  {
    return $this->schemaUpdateOptions;
  }
  /**
   * @param int
   */
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  /**
   * @return int
   */
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
  }
  /**
   * @param string
   */
  public function setSourceFormat($sourceFormat)
  {
    $this->sourceFormat = $sourceFormat;
  }
  /**
   * @return string
   */
  public function getSourceFormat()
  {
    return $this->sourceFormat;
  }
  /**
   * @param string[]
   */
  public function setSourceUris($sourceUris)
  {
    $this->sourceUris = $sourceUris;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param bool
   */
  public function setUseAvroLogicalTypes($useAvroLogicalTypes)
  {
    $this->useAvroLogicalTypes = $useAvroLogicalTypes;
  }
  /**
   * @return bool
   */
  public function getUseAvroLogicalTypes()
  {
    return $this->useAvroLogicalTypes;
  }
  /**
   * @param string
   */
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  /**
   * @return string
   */
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfigurationLoad::class, 'Google_Service_Bigquery_JobConfigurationLoad');
