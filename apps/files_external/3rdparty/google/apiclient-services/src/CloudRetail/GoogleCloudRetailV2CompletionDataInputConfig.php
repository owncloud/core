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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2CompletionDataInputConfig extends \Google\Model
{
  protected $bigQuerySourceType = GoogleCloudRetailV2BigQuerySource::class;
  protected $bigQuerySourceDataType = '';

  /**
   * @param GoogleCloudRetailV2BigQuerySource
   */
  public function setBigQuerySource(GoogleCloudRetailV2BigQuerySource $bigQuerySource)
  {
    $this->bigQuerySource = $bigQuerySource;
  }
  /**
   * @return GoogleCloudRetailV2BigQuerySource
   */
  public function getBigQuerySource()
  {
    return $this->bigQuerySource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CompletionDataInputConfig::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CompletionDataInputConfig');
