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

class Google_Service_Vision_GoogleCloudVisionV1p1beta1AnnotateImageResponse extends Google_Collection
{
  protected $collection_key = 'textAnnotations';
  protected $contextType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageAnnotationContext';
  protected $contextDataType = '';
  protected $cropHintsAnnotationType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1CropHintsAnnotation';
  protected $cropHintsAnnotationDataType = '';
  protected $errorType = 'Google_Service_Vision_Status';
  protected $errorDataType = '';
  protected $faceAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1FaceAnnotation';
  protected $faceAnnotationsDataType = 'array';
  protected $fullTextAnnotationType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotation';
  protected $fullTextAnnotationDataType = '';
  protected $imagePropertiesAnnotationType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageProperties';
  protected $imagePropertiesAnnotationDataType = '';
  protected $labelAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation';
  protected $labelAnnotationsDataType = 'array';
  protected $landmarkAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation';
  protected $landmarkAnnotationsDataType = 'array';
  protected $localizedObjectAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1LocalizedObjectAnnotation';
  protected $localizedObjectAnnotationsDataType = 'array';
  protected $logoAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation';
  protected $logoAnnotationsDataType = 'array';
  protected $productSearchResultsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1ProductSearchResults';
  protected $productSearchResultsDataType = '';
  protected $safeSearchAnnotationType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1SafeSearchAnnotation';
  protected $safeSearchAnnotationDataType = '';
  protected $textAnnotationsType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation';
  protected $textAnnotationsDataType = 'array';
  protected $webDetectionType = 'Google_Service_Vision_GoogleCloudVisionV1p1beta1WebDetection';
  protected $webDetectionDataType = '';

  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageAnnotationContext
   */
  public function setContext(Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageAnnotationContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageAnnotationContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1CropHintsAnnotation
   */
  public function setCropHintsAnnotation(Google_Service_Vision_GoogleCloudVisionV1p1beta1CropHintsAnnotation $cropHintsAnnotation)
  {
    $this->cropHintsAnnotation = $cropHintsAnnotation;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1CropHintsAnnotation
   */
  public function getCropHintsAnnotation()
  {
    return $this->cropHintsAnnotation;
  }
  /**
   * @param Google_Service_Vision_Status
   */
  public function setError(Google_Service_Vision_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Vision_Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1FaceAnnotation[]
   */
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1FaceAnnotation[]
   */
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotation
   */
  public function setFullTextAnnotation(Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotation $fullTextAnnotation)
  {
    $this->fullTextAnnotation = $fullTextAnnotation;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotation
   */
  public function getFullTextAnnotation()
  {
    return $this->fullTextAnnotation;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageProperties
   */
  public function setImagePropertiesAnnotation(Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageProperties $imagePropertiesAnnotation)
  {
    $this->imagePropertiesAnnotation = $imagePropertiesAnnotation;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1ImageProperties
   */
  public function getImagePropertiesAnnotation()
  {
    return $this->imagePropertiesAnnotation;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function setLandmarkAnnotations($landmarkAnnotations)
  {
    $this->landmarkAnnotations = $landmarkAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function getLandmarkAnnotations()
  {
    return $this->landmarkAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1LocalizedObjectAnnotation[]
   */
  public function setLocalizedObjectAnnotations($localizedObjectAnnotations)
  {
    $this->localizedObjectAnnotations = $localizedObjectAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1LocalizedObjectAnnotation[]
   */
  public function getLocalizedObjectAnnotations()
  {
    return $this->localizedObjectAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function setLogoAnnotations($logoAnnotations)
  {
    $this->logoAnnotations = $logoAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function getLogoAnnotations()
  {
    return $this->logoAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1ProductSearchResults
   */
  public function setProductSearchResults(Google_Service_Vision_GoogleCloudVisionV1p1beta1ProductSearchResults $productSearchResults)
  {
    $this->productSearchResults = $productSearchResults;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1ProductSearchResults
   */
  public function getProductSearchResults()
  {
    return $this->productSearchResults;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1SafeSearchAnnotation
   */
  public function setSafeSearchAnnotation(Google_Service_Vision_GoogleCloudVisionV1p1beta1SafeSearchAnnotation $safeSearchAnnotation)
  {
    $this->safeSearchAnnotation = $safeSearchAnnotation;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1SafeSearchAnnotation
   */
  public function getSafeSearchAnnotation()
  {
    return $this->safeSearchAnnotation;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation[]
   */
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p1beta1WebDetection
   */
  public function setWebDetection(Google_Service_Vision_GoogleCloudVisionV1p1beta1WebDetection $webDetection)
  {
    $this->webDetection = $webDetection;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p1beta1WebDetection
   */
  public function getWebDetection()
  {
    return $this->webDetection;
  }
}
