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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1UpdateOptions extends \Google\Model
{
  protected $mergeFieldsOptionsType = GoogleCloudContentwarehouseV1MergeFieldsOptions::class;
  protected $mergeFieldsOptionsDataType = '';
  /**
   * @var string
   */
  public $updateMask;
  /**
   * @var string
   */
  public $updateType;

  /**
   * @param GoogleCloudContentwarehouseV1MergeFieldsOptions
   */
  public function setMergeFieldsOptions(GoogleCloudContentwarehouseV1MergeFieldsOptions $mergeFieldsOptions)
  {
    $this->mergeFieldsOptions = $mergeFieldsOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1MergeFieldsOptions
   */
  public function getMergeFieldsOptions()
  {
    return $this->mergeFieldsOptions;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  /**
   * @param string
   */
  public function setUpdateType($updateType)
  {
    $this->updateType = $updateType;
  }
  /**
   * @return string
   */
  public function getUpdateType()
  {
    return $this->updateType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1UpdateOptions::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1UpdateOptions');
