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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationValue extends Google_Model
{
  protected $imageBoundingPolyAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageBoundingPolyAnnotation';
  protected $imageBoundingPolyAnnotationDataType = '';
  protected $imageClassificationAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationAnnotation';
  protected $imageClassificationAnnotationDataType = '';
  protected $imagePolylineAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePolylineAnnotation';
  protected $imagePolylineAnnotationDataType = '';
  protected $imageSegmentationAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation';
  protected $imageSegmentationAnnotationDataType = '';
  protected $textClassificationAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationAnnotation';
  protected $textClassificationAnnotationDataType = '';
  protected $textEntityExtractionAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation';
  protected $textEntityExtractionAnnotationDataType = '';
  protected $videoClassificationAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationAnnotation';
  protected $videoClassificationAnnotationDataType = '';
  protected $videoEventAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoEventAnnotation';
  protected $videoEventAnnotationDataType = '';
  protected $videoObjectTrackingAnnotationType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoObjectTrackingAnnotation';
  protected $videoObjectTrackingAnnotationDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageBoundingPolyAnnotation
   */
  public function setImageBoundingPolyAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageBoundingPolyAnnotation $imageBoundingPolyAnnotation)
  {
    $this->imageBoundingPolyAnnotation = $imageBoundingPolyAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageBoundingPolyAnnotation
   */
  public function getImageBoundingPolyAnnotation()
  {
    return $this->imageBoundingPolyAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationAnnotation
   */
  public function setImageClassificationAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationAnnotation $imageClassificationAnnotation)
  {
    $this->imageClassificationAnnotation = $imageClassificationAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationAnnotation
   */
  public function getImageClassificationAnnotation()
  {
    return $this->imageClassificationAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePolylineAnnotation
   */
  public function setImagePolylineAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePolylineAnnotation $imagePolylineAnnotation)
  {
    $this->imagePolylineAnnotation = $imagePolylineAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePolylineAnnotation
   */
  public function getImagePolylineAnnotation()
  {
    return $this->imagePolylineAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation
   */
  public function setImageSegmentationAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation $imageSegmentationAnnotation)
  {
    $this->imageSegmentationAnnotation = $imageSegmentationAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageSegmentationAnnotation
   */
  public function getImageSegmentationAnnotation()
  {
    return $this->imageSegmentationAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationAnnotation
   */
  public function setTextClassificationAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationAnnotation $textClassificationAnnotation)
  {
    $this->textClassificationAnnotation = $textClassificationAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationAnnotation
   */
  public function getTextClassificationAnnotation()
  {
    return $this->textClassificationAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation
   */
  public function setTextEntityExtractionAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation $textEntityExtractionAnnotation)
  {
    $this->textEntityExtractionAnnotation = $textEntityExtractionAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionAnnotation
   */
  public function getTextEntityExtractionAnnotation()
  {
    return $this->textEntityExtractionAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationAnnotation
   */
  public function setVideoClassificationAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationAnnotation $videoClassificationAnnotation)
  {
    $this->videoClassificationAnnotation = $videoClassificationAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationAnnotation
   */
  public function getVideoClassificationAnnotation()
  {
    return $this->videoClassificationAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoEventAnnotation
   */
  public function setVideoEventAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoEventAnnotation $videoEventAnnotation)
  {
    $this->videoEventAnnotation = $videoEventAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoEventAnnotation
   */
  public function getVideoEventAnnotation()
  {
    return $this->videoEventAnnotation;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoObjectTrackingAnnotation
   */
  public function setVideoObjectTrackingAnnotation(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoObjectTrackingAnnotation $videoObjectTrackingAnnotation)
  {
    $this->videoObjectTrackingAnnotation = $videoObjectTrackingAnnotation;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoObjectTrackingAnnotation
   */
  public function getVideoObjectTrackingAnnotation()
  {
    return $this->videoObjectTrackingAnnotation;
  }
}
