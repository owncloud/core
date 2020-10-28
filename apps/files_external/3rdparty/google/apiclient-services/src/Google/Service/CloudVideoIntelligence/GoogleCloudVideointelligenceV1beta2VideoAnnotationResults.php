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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoAnnotationResults extends Google_Collection
{
  protected $collection_key = 'textAnnotations';
  protected $errorType = 'Google_Service_CloudVideoIntelligence_GoogleRpcStatus';
  protected $errorDataType = '';
  protected $explicitAnnotationType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ExplicitContentAnnotation';
  protected $explicitAnnotationDataType = '';
  protected $faceAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceAnnotation';
  protected $faceAnnotationsDataType = 'array';
  protected $faceDetectionAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceDetectionAnnotation';
  protected $faceDetectionAnnotationsDataType = 'array';
  protected $frameLabelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation';
  protected $frameLabelAnnotationsDataType = 'array';
  public $inputUri;
  protected $logoRecognitionAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LogoRecognitionAnnotation';
  protected $logoRecognitionAnnotationsDataType = 'array';
  protected $objectAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ObjectTrackingAnnotation';
  protected $objectAnnotationsDataType = 'array';
  protected $personDetectionAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2PersonDetectionAnnotation';
  protected $personDetectionAnnotationsDataType = 'array';
  protected $segmentType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment';
  protected $segmentDataType = '';
  protected $segmentLabelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation';
  protected $segmentLabelAnnotationsDataType = 'array';
  protected $segmentPresenceLabelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation';
  protected $segmentPresenceLabelAnnotationsDataType = 'array';
  protected $shotAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment';
  protected $shotAnnotationsDataType = 'array';
  protected $shotLabelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation';
  protected $shotLabelAnnotationsDataType = 'array';
  protected $shotPresenceLabelAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation';
  protected $shotPresenceLabelAnnotationsDataType = 'array';
  protected $speechTranscriptionsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2SpeechTranscription';
  protected $speechTranscriptionsDataType = 'array';
  protected $textAnnotationsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2TextAnnotation';
  protected $textAnnotationsDataType = 'array';

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
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ExplicitContentAnnotation
   */
  public function setExplicitAnnotation(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ExplicitContentAnnotation $explicitAnnotation)
  {
    $this->explicitAnnotation = $explicitAnnotation;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ExplicitContentAnnotation
   */
  public function getExplicitAnnotation()
  {
    return $this->explicitAnnotation;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceAnnotation
   */
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceAnnotation
   */
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceDetectionAnnotation
   */
  public function setFaceDetectionAnnotations($faceDetectionAnnotations)
  {
    $this->faceDetectionAnnotations = $faceDetectionAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2FaceDetectionAnnotation
   */
  public function getFaceDetectionAnnotations()
  {
    return $this->faceDetectionAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function setFrameLabelAnnotations($frameLabelAnnotations)
  {
    $this->frameLabelAnnotations = $frameLabelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
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
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LogoRecognitionAnnotation
   */
  public function setLogoRecognitionAnnotations($logoRecognitionAnnotations)
  {
    $this->logoRecognitionAnnotations = $logoRecognitionAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LogoRecognitionAnnotation
   */
  public function getLogoRecognitionAnnotations()
  {
    return $this->logoRecognitionAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ObjectTrackingAnnotation
   */
  public function setObjectAnnotations($objectAnnotations)
  {
    $this->objectAnnotations = $objectAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ObjectTrackingAnnotation
   */
  public function getObjectAnnotations()
  {
    return $this->objectAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2PersonDetectionAnnotation
   */
  public function setPersonDetectionAnnotations($personDetectionAnnotations)
  {
    $this->personDetectionAnnotations = $personDetectionAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2PersonDetectionAnnotation
   */
  public function getPersonDetectionAnnotations()
  {
    return $this->personDetectionAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment
   */
  public function setSegment(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function setSegmentLabelAnnotations($segmentLabelAnnotations)
  {
    $this->segmentLabelAnnotations = $segmentLabelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function getSegmentLabelAnnotations()
  {
    return $this->segmentLabelAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function setSegmentPresenceLabelAnnotations($segmentPresenceLabelAnnotations)
  {
    $this->segmentPresenceLabelAnnotations = $segmentPresenceLabelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function getSegmentPresenceLabelAnnotations()
  {
    return $this->segmentPresenceLabelAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment
   */
  public function setShotAnnotations($shotAnnotations)
  {
    $this->shotAnnotations = $shotAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2VideoSegment
   */
  public function getShotAnnotations()
  {
    return $this->shotAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function setShotLabelAnnotations($shotLabelAnnotations)
  {
    $this->shotLabelAnnotations = $shotLabelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function getShotLabelAnnotations()
  {
    return $this->shotLabelAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function setShotPresenceLabelAnnotations($shotPresenceLabelAnnotations)
  {
    $this->shotPresenceLabelAnnotations = $shotPresenceLabelAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation
   */
  public function getShotPresenceLabelAnnotations()
  {
    return $this->shotPresenceLabelAnnotations;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2SpeechTranscription
   */
  public function setSpeechTranscriptions($speechTranscriptions)
  {
    $this->speechTranscriptions = $speechTranscriptions;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2SpeechTranscription
   */
  public function getSpeechTranscriptions()
  {
    return $this->speechTranscriptions;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2TextAnnotation
   */
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2TextAnnotation
   */
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
}
