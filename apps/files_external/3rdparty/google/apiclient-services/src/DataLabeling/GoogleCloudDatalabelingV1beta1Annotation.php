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

class GoogleCloudDatalabelingV1beta1Annotation extends \Google\Model
{
  protected $annotationMetadataType = GoogleCloudDatalabelingV1beta1AnnotationMetadata::class;
  protected $annotationMetadataDataType = '';
  public $annotationSentiment;
  public $annotationSource;
  protected $annotationValueType = GoogleCloudDatalabelingV1beta1AnnotationValue::class;
  protected $annotationValueDataType = '';
  public $name;

  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationMetadata
   */
  public function setAnnotationMetadata(GoogleCloudDatalabelingV1beta1AnnotationMetadata $annotationMetadata)
  {
    $this->annotationMetadata = $annotationMetadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationMetadata
   */
  public function getAnnotationMetadata()
  {
    return $this->annotationMetadata;
  }
  public function setAnnotationSentiment($annotationSentiment)
  {
    $this->annotationSentiment = $annotationSentiment;
  }
  public function getAnnotationSentiment()
  {
    return $this->annotationSentiment;
  }
  public function setAnnotationSource($annotationSource)
  {
    $this->annotationSource = $annotationSource;
  }
  public function getAnnotationSource()
  {
    return $this->annotationSource;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationValue
   */
  public function setAnnotationValue(GoogleCloudDatalabelingV1beta1AnnotationValue $annotationValue)
  {
    $this->annotationValue = $annotationValue;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationValue
   */
  public function getAnnotationValue()
  {
    return $this->annotationValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Annotation::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Annotation');
