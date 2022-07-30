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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SecurityReportResultView extends \Google\Collection
{
  protected $collection_key = 'rows';
  /**
   * @var int
   */
  public $code;
  /**
   * @var string
   */
  public $error;
  protected $metadataType = GoogleCloudApigeeV1SecurityReportMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var array[]
   */
  public $rows;
  /**
   * @var string
   */
  public $state;

  /**
   * @param int
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return int
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param string
   */
  public function setError($error)
  {
    $this->error = $error;
  }
  /**
   * @return string
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityReportMetadata
   */
  public function setMetadata(GoogleCloudApigeeV1SecurityReportMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityReportMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param array[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return array[]
   */
  public function getRows()
  {
    return $this->rows;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SecurityReportResultView::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SecurityReportResultView');
