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

class AsyncAnnotateFileRequest extends \Google\Collection
{
  protected $collection_key = 'features';
  protected $featuresType = Feature::class;
  protected $featuresDataType = 'array';
  protected $imageContextType = ImageContext::class;
  protected $imageContextDataType = '';
  protected $inputConfigType = InputConfig::class;
  protected $inputConfigDataType = '';
  protected $outputConfigType = OutputConfig::class;
  protected $outputConfigDataType = '';

  /**
   * @param Feature[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Feature[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param ImageContext
   */
  public function setImageContext(ImageContext $imageContext)
  {
    $this->imageContext = $imageContext;
  }
  /**
   * @return ImageContext
   */
  public function getImageContext()
  {
    return $this->imageContext;
  }
  /**
   * @param InputConfig
   */
  public function setInputConfig(InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param OutputConfig
   */
  public function setOutputConfig(OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AsyncAnnotateFileRequest::class, 'Google_Service_Vision_AsyncAnnotateFileRequest');
