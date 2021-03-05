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

class Google_Service_Vision_AsyncBatchAnnotateImagesRequest extends Google_Collection
{
  protected $collection_key = 'requests';
  protected $outputConfigType = 'Google_Service_Vision_OutputConfig';
  protected $outputConfigDataType = '';
  public $parent;
  protected $requestsType = 'Google_Service_Vision_AnnotateImageRequest';
  protected $requestsDataType = 'array';

  /**
   * @param Google_Service_Vision_OutputConfig
   */
  public function setOutputConfig(Google_Service_Vision_OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_Vision_OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param Google_Service_Vision_AnnotateImageRequest[]
   */
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  /**
   * @return Google_Service_Vision_AnnotateImageRequest[]
   */
  public function getRequests()
  {
    return $this->requests;
  }
}
