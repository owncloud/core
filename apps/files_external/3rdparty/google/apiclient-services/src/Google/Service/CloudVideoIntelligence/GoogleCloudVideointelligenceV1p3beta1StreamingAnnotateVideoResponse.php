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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingAnnotateVideoResponse extends Google_Model
{
  protected $annotationResultsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults';
  protected $annotationResultsDataType = '';
  public $annotationResultsUri;
  protected $errorType = 'Google_Service_CloudVideoIntelligence_GoogleRpcStatus';
  protected $errorDataType = '';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults
   */
  public function setAnnotationResults(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults $annotationResults)
  {
    $this->annotationResults = $annotationResults;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1StreamingVideoAnnotationResults
   */
  public function getAnnotationResults()
  {
    return $this->annotationResults;
  }
  public function setAnnotationResultsUri($annotationResultsUri)
  {
    $this->annotationResultsUri = $annotationResultsUri;
  }
  public function getAnnotationResultsUri()
  {
    return $this->annotationResultsUri;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleRpcStatus
   */
  public function setError(Google_Service_CloudVideoIntelligence_GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
}
