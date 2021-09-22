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

namespace Google\Service\Spanner;

class ResultSet extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $metadataType = ResultSetMetadata::class;
  protected $metadataDataType = '';
  public $rows;
  protected $statsType = ResultSetStats::class;
  protected $statsDataType = '';

  /**
   * @param ResultSetMetadata
   */
  public function setMetadata(ResultSetMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ResultSetMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param ResultSetStats
   */
  public function setStats(ResultSetStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return ResultSetStats
   */
  public function getStats()
  {
    return $this->stats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResultSet::class, 'Google_Service_Spanner_ResultSet');
