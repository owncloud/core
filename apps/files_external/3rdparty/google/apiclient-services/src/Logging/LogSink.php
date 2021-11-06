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

namespace Google\Service\Logging;

class LogSink extends \Google\Collection
{
  protected $collection_key = 'exclusions';
  protected $bigqueryOptionsType = BigQueryOptions::class;
  protected $bigqueryOptionsDataType = '';
  public $createTime;
  public $description;
  public $destination;
  public $disabled;
  protected $exclusionsType = LogExclusion::class;
  protected $exclusionsDataType = 'array';
  public $filter;
  public $includeChildren;
  public $name;
  public $outputVersionFormat;
  public $updateTime;
  public $writerIdentity;

  /**
   * @param BigQueryOptions
   */
  public function setBigqueryOptions(BigQueryOptions $bigqueryOptions)
  {
    $this->bigqueryOptions = $bigqueryOptions;
  }
  /**
   * @return BigQueryOptions
   */
  public function getBigqueryOptions()
  {
    return $this->bigqueryOptions;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param LogExclusion[]
   */
  public function setExclusions($exclusions)
  {
    $this->exclusions = $exclusions;
  }
  /**
   * @return LogExclusion[]
   */
  public function getExclusions()
  {
    return $this->exclusions;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setIncludeChildren($includeChildren)
  {
    $this->includeChildren = $includeChildren;
  }
  public function getIncludeChildren()
  {
    return $this->includeChildren;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOutputVersionFormat($outputVersionFormat)
  {
    $this->outputVersionFormat = $outputVersionFormat;
  }
  public function getOutputVersionFormat()
  {
    return $this->outputVersionFormat;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWriterIdentity($writerIdentity)
  {
    $this->writerIdentity = $writerIdentity;
  }
  public function getWriterIdentity()
  {
    return $this->writerIdentity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogSink::class, 'Google_Service_Logging_LogSink');
