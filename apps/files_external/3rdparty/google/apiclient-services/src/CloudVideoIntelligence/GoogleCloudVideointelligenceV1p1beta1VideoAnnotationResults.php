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

class GoogleCloudVideointelligenceV1p1beta1VideoAnnotationResults extends \Google\Collection
{
  protected $collection_key = 'textAnnotations';
  protected $errorType = GoogleRpcStatus::class;
  protected $errorDataType = '';
  protected $explicitAnnotationType = GoogleCloudVideointelligenceV1p1beta1ExplicitContentAnnotation::class;
  protected $explicitAnnotationDataType = '';
  protected $faceAnnotationsType = GoogleCloudVideointelligenceV1p1beta1FaceAnnotation::class;
  protected $faceAnnotationsDataType = 'array';
  protected $faceDetectionAnnotationsType = GoogleCloudVideointelligenceV1p1beta1FaceDetectionAnnotation::class;
  protected $faceDetectionAnnotationsDataType = 'array';
  protected $frameLabelAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LabelAnnotation::class;
  protected $frameLabelAnnotationsDataType = 'array';
  public $inputUri;
  protected $logoRecognitionAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LogoRecognitionAnnotation::class;
  protected $logoRecognitionAnnotationsDataType = 'array';
  protected $objectAnnotationsType = GoogleCloudVideointelligenceV1p1beta1ObjectTrackingAnnotation::class;
  protected $objectAnnotationsDataType = 'array';
  protected $personDetectionAnnotationsType = GoogleCloudVideointelligenceV1p1beta1PersonDetectionAnnotation::class;
  protected $personDetectionAnnotationsDataType = 'array';
  protected $segmentType = GoogleCloudVideointelligenceV1p1beta1VideoSegment::class;
  protected $segmentDataType = '';
  protected $segmentLabelAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LabelAnnotation::class;
  protected $segmentLabelAnnotationsDataType = 'array';
  protected $segmentPresenceLabelAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LabelAnnotation::class;
  protected $segmentPresenceLabelAnnotationsDataType = 'array';
  protected $shotAnnotationsType = GoogleCloudVideointelligenceV1p1beta1VideoSegment::class;
  protected $shotAnnotationsDataType = 'array';
  protected $shotLabelAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LabelAnnotation::class;
  protected $shotLabelAnnotationsDataType = 'array';
  protected $shotPresenceLabelAnnotationsType = GoogleCloudVideointelligenceV1p1beta1LabelAnnotation::class;
  protected $shotPresenceLabelAnnotationsDataType = 'array';
  protected $speechTranscriptionsType = GoogleCloudVideointelligenceV1p1beta1SpeechTranscription::class;
  protected $speechTranscriptionsDataType = 'array';
  protected $textAnnotationsType = GoogleCloudVideointelligenceV1p1beta1TextAnnotation::class;
  protected $textAnnotationsDataType = 'array';

  /**
   * @param GoogleRpcStatus
   */
  public function setError(GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1ExplicitContentAnnotation
   */
  public function setExplicitAnnotation(GoogleCloudVideointelligenceV1p1beta1ExplicitContentAnnotation $explicitAnnotation)
  {
    $this->explicitAnnotation = $explicitAnnotation;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1ExplicitContentAnnotation
   */
  public function getExplicitAnnotation()
  {
    return $this->explicitAnnotation;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1FaceAnnotation[]
   */
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1FaceAnnotation[]
   */
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1FaceDetectionAnnotation[]
   */
  public function setFaceDetectionAnnotations($faceDetectionAnnotations)
  {
    $this->faceDetectionAnnotations = $faceDetectionAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1FaceDetectionAnnotation[]
   */
  public function getFaceDetectionAnnotations()
  {
    return $this->faceDetectionAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function setFrameLabelAnnotations($frameLabelAnnotations)
  {
    $this->frameLabelAnnotations = $frameLabelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function getFrameLabelAnnotations()
  {
    return $this->frameLabelAnnotations;
  }
  public function setInputUri($inputUri)
  {
    $this->inputUri = $inputUri;
  }
  public function getInputUri()
  {
    return $this->inputUri;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LogoRecognitionAnnotation[]
   */
  public function setLogoRecognitionAnnotations($logoRecognitionAnnotations)
  {
    $this->logoRecognitionAnnotations = $logoRecognitionAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LogoRecognitionAnnotation[]
   */
  public function getLogoRecognitionAnnotations()
  {
    return $this->logoRecognitionAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1ObjectTrackingAnnotation[]
   */
  public function setObjectAnnotations($objectAnnotations)
  {
    $this->objectAnnotations = $objectAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1ObjectTrackingAnnotation[]
   */
  public function getObjectAnnotations()
  {
    return $this->objectAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1PersonDetectionAnnotation[]
   */
  public function setPersonDetectionAnnotations($personDetectionAnnotations)
  {
    $this->personDetectionAnnotations = $personDetectionAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1PersonDetectionAnnotation[]
   */
  public function getPersonDetectionAnnotations()
  {
    return $this->personDetectionAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1VideoSegment
   */
  public function setSegment(GoogleCloudVideointelligenceV1p1beta1VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function setSegmentLabelAnnotations($segmentLabelAnnotations)
  {
    $this->segmentLabelAnnotations = $segmentLabelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function getSegmentLabelAnnotations()
  {
    return $this->segmentLabelAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function setSegmentPresenceLabelAnnotations($segmentPresenceLabelAnnotations)
  {
    $this->segmentPresenceLabelAnnotations = $segmentPresenceLabelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function getSegmentPresenceLabelAnnotations()
  {
    return $this->segmentPresenceLabelAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1VideoSegment[]
   */
  public function setShotAnnotations($shotAnnotations)
  {
    $this->shotAnnotations = $shotAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1VideoSegment[]
   */
  public function getShotAnnotations()
  {
    return $this->shotAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function setShotLabelAnnotations($shotLabelAnnotations)
  {
    $this->shotLabelAnnotations = $shotLabelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function getShotLabelAnnotations()
  {
    return $this->shotLabelAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function setShotPresenceLabelAnnotations($shotPresenceLabelAnnotations)
  {
    $this->shotPresenceLabelAnnotations = $shotPresenceLabelAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1LabelAnnotation[]
   */
  public function getShotPresenceLabelAnnotations()
  {
    return $this->shotPresenceLabelAnnotations;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1SpeechTranscription[]
   */
  public function setSpeechTranscriptions($speechTranscriptions)
  {
    $this->speechTranscriptions = $speechTranscriptions;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1SpeechTranscription[]
   */
  public function getSpeechTranscriptions()
  {
    return $this->speechTranscriptions;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p1beta1TextAnnotation[]
   */
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p1beta1TextAnnotation[]
   */
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p1beta1VideoAnnotationResults::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoAnnotationResults');
