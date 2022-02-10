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

class BigtableOptions extends \Google\Collection
{
  protected $collection_key = 'columnFamilies';
  protected $columnFamiliesType = BigtableColumnFamily::class;
  protected $columnFamiliesDataType = 'array';
  /**
   * @var bool
   */
  public $ignoreUnspecifiedColumnFamilies;
  /**
   * @var bool
   */
  public $readRowkeyAsString;

  /**
   * @param BigtableColumnFamily[]
   */
  public function setColumnFamilies($columnFamilies)
  {
    $this->columnFamilies = $columnFamilies;
  }
  /**
   * @return BigtableColumnFamily[]
   */
  public function getColumnFamilies()
  {
    return $this->columnFamilies;
  }
  /**
   * @param bool
   */
  public function setIgnoreUnspecifiedColumnFamilies($ignoreUnspecifiedColumnFamilies)
  {
    $this->ignoreUnspecifiedColumnFamilies = $ignoreUnspecifiedColumnFamilies;
  }
  /**
   * @return bool
   */
  public function getIgnoreUnspecifiedColumnFamilies()
  {
    return $this->ignoreUnspecifiedColumnFamilies;
  }
  /**
   * @param bool
   */
  public function setReadRowkeyAsString($readRowkeyAsString)
  {
    $this->readRowkeyAsString = $readRowkeyAsString;
  }
  /**
   * @return bool
   */
  public function getReadRowkeyAsString()
  {
    return $this->readRowkeyAsString;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigtableOptions::class, 'Google_Service_Bigquery_BigtableOptions');
