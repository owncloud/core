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

class Google_Service_Bigquery_HivePartitioningOptions extends Google_Model
{
  public $mode;
  public $requirePartitionFilter;
  public $sourceUriPrefix;

  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  public function setRequirePartitionFilter($requirePartitionFilter)
  {
    $this->requirePartitionFilter = $requirePartitionFilter;
  }
  public function getRequirePartitionFilter()
  {
    return $this->requirePartitionFilter;
  }
  public function setSourceUriPrefix($sourceUriPrefix)
  {
    $this->sourceUriPrefix = $sourceUriPrefix;
  }
  public function getSourceUriPrefix()
  {
    return $this->sourceUriPrefix;
  }
}
