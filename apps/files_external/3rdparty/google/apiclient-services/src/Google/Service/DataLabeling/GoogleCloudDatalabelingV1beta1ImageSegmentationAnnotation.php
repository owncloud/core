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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation extends Google_Model
{
  protected $annotationColorsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec';
  protected $annotationColorsDataType = 'map';
  public $imageBytes;
  public $mimeType;

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function setAnnotationColors($annotationColors)
  {
    $this->annotationColors = $annotationColors;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function getAnnotationColors()
  {
    return $this->annotationColors;
  }
  public function setImageBytes($imageBytes)
  {
    $this->imageBytes = $imageBytes;
  }
  public function getImageBytes()
  {
    return $this->imageBytes;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
}
