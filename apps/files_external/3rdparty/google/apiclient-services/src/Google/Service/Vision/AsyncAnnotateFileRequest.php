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

class Google_Service_Vision_AsyncAnnotateFileRequest extends Google_Collection
{
  protected $collection_key = 'features';
  protected $featuresType = 'Google_Service_Vision_Feature';
  protected $featuresDataType = 'array';
  protected $imageContextType = 'Google_Service_Vision_ImageContext';
  protected $imageContextDataType = '';
  protected $inputConfigType = 'Google_Service_Vision_InputConfig';
  protected $inputConfigDataType = '';
  protected $outputConfigType = 'Google_Service_Vision_OutputConfig';
  protected $outputConfigDataType = '';

  /**
   * @param Google_Service_Vision_Feature
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_Vision_Feature
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param Google_Service_Vision_ImageContext
   */
  public function setImageContext(Google_Service_Vision_ImageContext $imageContext)
  {
    $this->imageContext = $imageContext;
  }
  /**
   * @return Google_Service_Vision_ImageContext
   */
  public function getImageContext()
  {
    return $this->imageContext;
  }
  /**
   * @param Google_Service_Vision_InputConfig
   */
  public function setInputConfig(Google_Service_Vision_InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return Google_Service_Vision_InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
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
}
