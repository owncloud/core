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

class Google_Service_Vision_GoogleCloudVisionV1p2beta1AnnotateFileResponse extends Google_Collection
{
  protected $collection_key = 'responses';
  protected $errorType = 'Google_Service_Vision_Status';
  protected $errorDataType = '';
  protected $inputConfigType = 'Google_Service_Vision_GoogleCloudVisionV1p2beta1InputConfig';
  protected $inputConfigDataType = '';
  protected $responsesType = 'Google_Service_Vision_GoogleCloudVisionV1p2beta1AnnotateImageResponse';
  protected $responsesDataType = 'array';
  public $totalPages;

  /**
   * @param Google_Service_Vision_Status
   */
  public function setError(Google_Service_Vision_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Vision_Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p2beta1InputConfig
   */
  public function setInputConfig(Google_Service_Vision_GoogleCloudVisionV1p2beta1InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p2beta1InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p2beta1AnnotateImageResponse
   */
  public function setResponses($responses)
  {
    $this->responses = $responses;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p2beta1AnnotateImageResponse
   */
  public function getResponses()
  {
    return $this->responses;
  }
  public function setTotalPages($totalPages)
  {
    $this->totalPages = $totalPages;
  }
  public function getTotalPages()
  {
    return $this->totalPages;
  }
}
