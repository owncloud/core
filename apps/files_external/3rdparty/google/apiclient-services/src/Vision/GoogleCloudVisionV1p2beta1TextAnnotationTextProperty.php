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

class GoogleCloudVisionV1p2beta1TextAnnotationTextProperty extends \Google\Collection
{
  protected $collection_key = 'detectedLanguages';
  protected $detectedBreakType = GoogleCloudVisionV1p2beta1TextAnnotationDetectedBreak::class;
  protected $detectedBreakDataType = '';
  protected $detectedLanguagesType = GoogleCloudVisionV1p2beta1TextAnnotationDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';

  /**
   * @param GoogleCloudVisionV1p2beta1TextAnnotationDetectedBreak
   */
  public function setDetectedBreak(GoogleCloudVisionV1p2beta1TextAnnotationDetectedBreak $detectedBreak)
  {
    $this->detectedBreak = $detectedBreak;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1TextAnnotationDetectedBreak
   */
  public function getDetectedBreak()
  {
    return $this->detectedBreak;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1TextAnnotationDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1TextAnnotationDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p2beta1TextAnnotationTextProperty::class, 'Google_Service_Vision_GoogleCloudVisionV1p2beta1TextAnnotationTextProperty');
