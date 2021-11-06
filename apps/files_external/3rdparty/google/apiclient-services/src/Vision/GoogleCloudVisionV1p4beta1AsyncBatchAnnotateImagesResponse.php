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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p4beta1AsyncBatchAnnotateImagesResponse extends \Google\Model
{
  protected $outputConfigType = GoogleCloudVisionV1p4beta1OutputConfig::class;
  protected $outputConfigDataType = '';

  /**
   * @param GoogleCloudVisionV1p4beta1OutputConfig
   */
  public function setOutputConfig(GoogleCloudVisionV1p4beta1OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p4beta1AsyncBatchAnnotateImagesResponse::class, 'Google_Service_Vision_GoogleCloudVisionV1p4beta1AsyncBatchAnnotateImagesResponse');
