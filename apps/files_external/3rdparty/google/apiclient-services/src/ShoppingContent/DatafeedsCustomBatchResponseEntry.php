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

namespace Google\Service\ShoppingContent;

class DatafeedsCustomBatchResponseEntry extends \Google\Model
{
  public $batchId;
  protected $datafeedType = Datafeed::class;
  protected $datafeedDataType = '';
  protected $errorsType = Errors::class;
  protected $errorsDataType = '';

  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param Datafeed
   */
  public function setDatafeed(Datafeed $datafeed)
  {
    $this->datafeed = $datafeed;
  }
  /**
   * @return Datafeed
   */
  public function getDatafeed()
  {
    return $this->datafeed;
  }
  /**
   * @param Errors
   */
  public function setErrors(Errors $errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Errors
   */
  public function getErrors()
  {
    return $this->errors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedsCustomBatchResponseEntry::class, 'Google_Service_ShoppingContent_DatafeedsCustomBatchResponseEntry');
