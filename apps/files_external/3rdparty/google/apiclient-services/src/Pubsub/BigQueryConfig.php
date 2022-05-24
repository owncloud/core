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

namespace Google\Service\Pubsub;

class BigQueryConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $dropUnknownFields;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $table;
  /**
   * @var bool
   */
  public $useTopicSchema;
  /**
   * @var bool
   */
  public $writeMetadata;

  /**
   * @param bool
   */
  public function setDropUnknownFields($dropUnknownFields)
  {
    $this->dropUnknownFields = $dropUnknownFields;
  }
  /**
   * @return bool
   */
  public function getDropUnknownFields()
  {
    return $this->dropUnknownFields;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTable($table)
  {
    $this->table = $table;
  }
  /**
   * @return string
   */
  public function getTable()
  {
    return $this->table;
  }
  /**
   * @param bool
   */
  public function setUseTopicSchema($useTopicSchema)
  {
    $this->useTopicSchema = $useTopicSchema;
  }
  /**
   * @return bool
   */
  public function getUseTopicSchema()
  {
    return $this->useTopicSchema;
  }
  /**
   * @param bool
   */
  public function setWriteMetadata($writeMetadata)
  {
    $this->writeMetadata = $writeMetadata;
  }
  /**
   * @return bool
   */
  public function getWriteMetadata()
  {
    return $this->writeMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigQueryConfig::class, 'Google_Service_Pubsub_BigQueryConfig');
