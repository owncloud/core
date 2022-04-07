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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Schema extends \Google\Collection
{
  protected $collection_key = 'partitionFields';
  protected $fieldsType = GoogleCloudDataplexV1SchemaSchemaField::class;
  protected $fieldsDataType = 'array';
  protected $partitionFieldsType = GoogleCloudDataplexV1SchemaPartitionField::class;
  protected $partitionFieldsDataType = 'array';
  /**
   * @var string
   */
  public $partitionStyle;
  /**
   * @var bool
   */
  public $userManaged;

  /**
   * @param GoogleCloudDataplexV1SchemaSchemaField[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return GoogleCloudDataplexV1SchemaSchemaField[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param GoogleCloudDataplexV1SchemaPartitionField[]
   */
  public function setPartitionFields($partitionFields)
  {
    $this->partitionFields = $partitionFields;
  }
  /**
   * @return GoogleCloudDataplexV1SchemaPartitionField[]
   */
  public function getPartitionFields()
  {
    return $this->partitionFields;
  }
  /**
   * @param string
   */
  public function setPartitionStyle($partitionStyle)
  {
    $this->partitionStyle = $partitionStyle;
  }
  /**
   * @return string
   */
  public function getPartitionStyle()
  {
    return $this->partitionStyle;
  }
  /**
   * @param bool
   */
  public function setUserManaged($userManaged)
  {
    $this->userManaged = $userManaged;
  }
  /**
   * @return bool
   */
  public function getUserManaged()
  {
    return $this->userManaged;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Schema::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Schema');
