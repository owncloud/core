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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1ConversationDataSource extends \Google\Model
{
  protected $dialogflowSourceType = GoogleCloudContactcenterinsightsV1DialogflowSource::class;
  protected $dialogflowSourceDataType = '';
  protected $gcsSourceType = GoogleCloudContactcenterinsightsV1GcsSource::class;
  protected $gcsSourceDataType = '';

  /**
   * @param GoogleCloudContactcenterinsightsV1DialogflowSource
   */
  public function setDialogflowSource(GoogleCloudContactcenterinsightsV1DialogflowSource $dialogflowSource)
  {
    $this->dialogflowSource = $dialogflowSource;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1DialogflowSource
   */
  public function getDialogflowSource()
  {
    return $this->dialogflowSource;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1GcsSource
   */
  public function setGcsSource(GoogleCloudContactcenterinsightsV1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1ConversationDataSource::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1ConversationDataSource');
