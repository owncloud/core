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

namespace Google\Service\ToolResults;

class TestSuiteOverview extends \Google\Model
{
  protected $elapsedTimeType = Duration::class;
  protected $elapsedTimeDataType = '';
  /**
   * @var int
   */
  public $errorCount;
  /**
   * @var int
   */
  public $failureCount;
  /**
   * @var int
   */
  public $flakyCount;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $skippedCount;
  /**
   * @var int
   */
  public $totalCount;
  protected $xmlSourceType = FileReference::class;
  protected $xmlSourceDataType = '';

  /**
   * @param Duration
   */
  public function setElapsedTime(Duration $elapsedTime)
  {
    $this->elapsedTime = $elapsedTime;
  }
  /**
   * @return Duration
   */
  public function getElapsedTime()
  {
    return $this->elapsedTime;
  }
  /**
   * @param int
   */
  public function setErrorCount($errorCount)
  {
    $this->errorCount = $errorCount;
  }
  /**
   * @return int
   */
  public function getErrorCount()
  {
    return $this->errorCount;
  }
  /**
   * @param int
   */
  public function setFailureCount($failureCount)
  {
    $this->failureCount = $failureCount;
  }
  /**
   * @return int
   */
  public function getFailureCount()
  {
    return $this->failureCount;
  }
  /**
   * @param int
   */
  public function setFlakyCount($flakyCount)
  {
    $this->flakyCount = $flakyCount;
  }
  /**
   * @return int
   */
  public function getFlakyCount()
  {
    return $this->flakyCount;
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
   * @param int
   */
  public function setSkippedCount($skippedCount)
  {
    $this->skippedCount = $skippedCount;
  }
  /**
   * @return int
   */
  public function getSkippedCount()
  {
    return $this->skippedCount;
  }
  /**
   * @param int
   */
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  /**
   * @return int
   */
  public function getTotalCount()
  {
    return $this->totalCount;
  }
  /**
   * @param FileReference
   */
  public function setXmlSource(FileReference $xmlSource)
  {
    $this->xmlSource = $xmlSource;
  }
  /**
   * @return FileReference
   */
  public function getXmlSource()
  {
    return $this->xmlSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestSuiteOverview::class, 'Google_Service_ToolResults_TestSuiteOverview');
