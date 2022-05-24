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

class GoogleCloudVisionV1p1beta1AnnotateFileResponse extends \Google\Collection
{
  protected $collection_key = 'responses';
  protected $errorType = Status::class;
  protected $errorDataType = '';
  protected $inputConfigType = GoogleCloudVisionV1p1beta1InputConfig::class;
  protected $inputConfigDataType = '';
  protected $responsesType = GoogleCloudVisionV1p1beta1AnnotateImageResponse::class;
  protected $responsesDataType = 'array';
  /**
   * @var int
   */
  public $totalPages;

  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleCloudVisionV1p1beta1InputConfig
   */
  public function setInputConfig(GoogleCloudVisionV1p1beta1InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param GoogleCloudVisionV1p1beta1AnnotateImageResponse[]
   */
  public function setResponses($responses)
  {
    $this->responses = $responses;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1AnnotateImageResponse[]
   */
  public function getResponses()
  {
    return $this->responses;
  }
  /**
   * @param int
   */
  public function setTotalPages($totalPages)
  {
    $this->totalPages = $totalPages;
  }
  /**
   * @return int
   */
  public function getTotalPages()
  {
    return $this->totalPages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1AnnotateFileResponse::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1AnnotateFileResponse');
