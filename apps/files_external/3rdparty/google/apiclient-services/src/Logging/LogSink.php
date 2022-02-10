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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $destination;
  /**
   * @var bool
   */
  public $disabled;
  protected $exclusionsType = LogExclusion::class;
  protected $exclusionsDataType = 'array';
  /**
   * @var string
   */
  public $filter;
  /**
   * @var bool
   */
  public $includeChildren;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $outputVersionFormat;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return string
   */
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param bool
   */
  public function setIncludeChildren($includeChildren)
  {
    $this->includeChildren = $includeChildren;
  }
  /**
   * @return bool
   */
  public function getIncludeChildren()
  {
    return $this->includeChildren;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOutputVersionFormat($outputVersionFormat)
  {
    $this->outputVersionFormat = $outputVersionFormat;
  }
  /**
   * @return string
   */
  public function getOutputVersionFormat()
  {
    return $this->outputVersionFormat;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setWriterIdentity($writerIdentity)
  {
    $this->writerIdentity = $writerIdentity;
  }
  /**
   * @return string
   */
  public function getWriterIdentity()
  {
    return $this->writerIdentity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogSink::class, 'Google_Service_Logging_LogSink');
