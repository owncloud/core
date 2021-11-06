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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1beta1OutputConfig extends \Google\Model
{
  protected $gcsDestinationType = GoogleCloudDocumentaiV1beta1GcsDestination::class;
  protected $gcsDestinationDataType = '';
  public $pagesPerShard;

  /**
   * @param GoogleCloudDocumentaiV1beta1GcsDestination
   */
  public function setGcsDestination(GoogleCloudDocumentaiV1beta1GcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1GcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
  public function setPagesPerShard($pagesPerShard)
  {
    $this->pagesPerShard = $pagesPerShard;
  }
  public function getPagesPerShard()
  {
    return $this->pagesPerShard;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1OutputConfig::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1OutputConfig');
