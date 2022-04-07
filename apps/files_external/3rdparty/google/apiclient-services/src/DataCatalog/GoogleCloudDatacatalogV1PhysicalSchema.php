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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1PhysicalSchema extends \Google\Model
{
  protected $avroType = GoogleCloudDatacatalogV1PhysicalSchemaAvroSchema::class;
  protected $avroDataType = '';
  protected $csvType = GoogleCloudDatacatalogV1PhysicalSchemaCsvSchema::class;
  protected $csvDataType = '';
  protected $orcType = GoogleCloudDatacatalogV1PhysicalSchemaOrcSchema::class;
  protected $orcDataType = '';
  protected $parquetType = GoogleCloudDatacatalogV1PhysicalSchemaParquetSchema::class;
  protected $parquetDataType = '';
  protected $protobufType = GoogleCloudDatacatalogV1PhysicalSchemaProtobufSchema::class;
  protected $protobufDataType = '';
  protected $thriftType = GoogleCloudDatacatalogV1PhysicalSchemaThriftSchema::class;
  protected $thriftDataType = '';

  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaAvroSchema
   */
  public function setAvro(GoogleCloudDatacatalogV1PhysicalSchemaAvroSchema $avro)
  {
    $this->avro = $avro;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaAvroSchema
   */
  public function getAvro()
  {
    return $this->avro;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaCsvSchema
   */
  public function setCsv(GoogleCloudDatacatalogV1PhysicalSchemaCsvSchema $csv)
  {
    $this->csv = $csv;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaCsvSchema
   */
  public function getCsv()
  {
    return $this->csv;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaOrcSchema
   */
  public function setOrc(GoogleCloudDatacatalogV1PhysicalSchemaOrcSchema $orc)
  {
    $this->orc = $orc;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaOrcSchema
   */
  public function getOrc()
  {
    return $this->orc;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaParquetSchema
   */
  public function setParquet(GoogleCloudDatacatalogV1PhysicalSchemaParquetSchema $parquet)
  {
    $this->parquet = $parquet;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaParquetSchema
   */
  public function getParquet()
  {
    return $this->parquet;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaProtobufSchema
   */
  public function setProtobuf(GoogleCloudDatacatalogV1PhysicalSchemaProtobufSchema $protobuf)
  {
    $this->protobuf = $protobuf;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaProtobufSchema
   */
  public function getProtobuf()
  {
    return $this->protobuf;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchemaThriftSchema
   */
  public function setThrift(GoogleCloudDatacatalogV1PhysicalSchemaThriftSchema $thrift)
  {
    $this->thrift = $thrift;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchemaThriftSchema
   */
  public function getThrift()
  {
    return $this->thrift;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1PhysicalSchema::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1PhysicalSchema');
