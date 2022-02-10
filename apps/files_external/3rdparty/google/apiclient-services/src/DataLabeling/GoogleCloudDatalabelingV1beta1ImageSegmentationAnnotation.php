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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation extends \Google\Model
{
  protected $annotationColorsType = GoogleCloudDatalabelingV1beta1AnnotationSpec::class;
  protected $annotationColorsDataType = 'map';
  /**
   * @var string
   */
  public $imageBytes;
  /**
   * @var string
   */
  public $mimeType;

  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function setAnnotationColors($annotationColors)
  {
    $this->annotationColors = $annotationColors;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationSpec[]
   */
  public function getAnnotationColors()
  {
    return $this->annotationColors;
  }
  /**
   * @param string
   */
  public function setImageBytes($imageBytes)
  {
    $this->imageBytes = $imageBytes;
  }
  /**
   * @return string
   */
  public function getImageBytes()
  {
    return $this->imageBytes;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation');
