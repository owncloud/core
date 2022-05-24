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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1AnnotateVideoRequest extends \Google\Collection
{
  protected $collection_key = 'features';
  /**
   * @var string[]
   */
  public $features;
  /**
   * @var string
   */
  public $inputContent;
  /**
   * @var string
   */
  public $inputUri;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $outputUri;
  protected $videoContextType = GoogleCloudVideointelligenceV1VideoContext::class;
  protected $videoContextDataType = '';

  /**
   * @param string[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return string[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param string
   */
  public function setInputContent($inputContent)
  {
    $this->inputContent = $inputContent;
  }
  /**
   * @return string
   */
  public function getInputContent()
  {
    return $this->inputContent;
  }
  /**
   * @param string
   */
  public function setInputUri($inputUri)
  {
    $this->inputUri = $inputUri;
  }
  /**
   * @return string
   */
  public function getInputUri()
  {
    return $this->inputUri;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param string
   */
  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  /**
   * @return string
   */
  public function getOutputUri()
  {
    return $this->outputUri;
  }
  /**
   * @param GoogleCloudVideointelligenceV1VideoContext
   */
  public function setVideoContext(GoogleCloudVideointelligenceV1VideoContext $videoContext)
  {
    $this->videoContext = $videoContext;
  }
  /**
   * @return GoogleCloudVideointelligenceV1VideoContext
   */
  public function getVideoContext()
  {
    return $this->videoContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1AnnotateVideoRequest::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1AnnotateVideoRequest');
