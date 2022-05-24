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

class GoogleCloudVisionV1p3beta1AnnotateImageResponse extends \Google\Collection
{
  protected $collection_key = 'textAnnotations';
  protected $contextType = GoogleCloudVisionV1p3beta1ImageAnnotationContext::class;
  protected $contextDataType = '';
  protected $cropHintsAnnotationType = GoogleCloudVisionV1p3beta1CropHintsAnnotation::class;
  protected $cropHintsAnnotationDataType = '';
  protected $errorType = Status::class;
  protected $errorDataType = '';
  protected $faceAnnotationsType = GoogleCloudVisionV1p3beta1FaceAnnotation::class;
  protected $faceAnnotationsDataType = 'array';
  protected $fullTextAnnotationType = GoogleCloudVisionV1p3beta1TextAnnotation::class;
  protected $fullTextAnnotationDataType = '';
  protected $imagePropertiesAnnotationType = GoogleCloudVisionV1p3beta1ImageProperties::class;
  protected $imagePropertiesAnnotationDataType = '';
  protected $labelAnnotationsType = GoogleCloudVisionV1p3beta1EntityAnnotation::class;
  protected $labelAnnotationsDataType = 'array';
  protected $landmarkAnnotationsType = GoogleCloudVisionV1p3beta1EntityAnnotation::class;
  protected $landmarkAnnotationsDataType = 'array';
  protected $localizedObjectAnnotationsType = GoogleCloudVisionV1p3beta1LocalizedObjectAnnotation::class;
  protected $localizedObjectAnnotationsDataType = 'array';
  protected $logoAnnotationsType = GoogleCloudVisionV1p3beta1EntityAnnotation::class;
  protected $logoAnnotationsDataType = 'array';
  protected $productSearchResultsType = GoogleCloudVisionV1p3beta1ProductSearchResults::class;
  protected $productSearchResultsDataType = '';
  protected $safeSearchAnnotationType = GoogleCloudVisionV1p3beta1SafeSearchAnnotation::class;
  protected $safeSearchAnnotationDataType = '';
  protected $textAnnotationsType = GoogleCloudVisionV1p3beta1EntityAnnotation::class;
  protected $textAnnotationsDataType = 'array';
  protected $webDetectionType = GoogleCloudVisionV1p3beta1WebDetection::class;
  protected $webDetectionDataType = '';

  /**
   * @param GoogleCloudVisionV1p3beta1ImageAnnotationContext
   */
  public function setContext(GoogleCloudVisionV1p3beta1ImageAnnotationContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1ImageAnnotationContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1CropHintsAnnotation
   */
  public function setCropHintsAnnotation(GoogleCloudVisionV1p3beta1CropHintsAnnotation $cropHintsAnnotation)
  {
    $this->cropHintsAnnotation = $cropHintsAnnotation;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1CropHintsAnnotation
   */
  public function getCropHintsAnnotation()
  {
    return $this->cropHintsAnnotation;
  }
  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1FaceAnnotation[]
   */
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1FaceAnnotation[]
   */
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1TextAnnotation
   */
  public function setFullTextAnnotation(GoogleCloudVisionV1p3beta1TextAnnotation $fullTextAnnotation)
  {
    $this->fullTextAnnotation = $fullTextAnnotation;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1TextAnnotation
   */
  public function getFullTextAnnotation()
  {
    return $this->fullTextAnnotation;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1ImageProperties
   */
  public function setImagePropertiesAnnotation(GoogleCloudVisionV1p3beta1ImageProperties $imagePropertiesAnnotation)
  {
    $this->imagePropertiesAnnotation = $imagePropertiesAnnotation;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1ImageProperties
   */
  public function getImagePropertiesAnnotation()
  {
    return $this->imagePropertiesAnnotation;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function setLandmarkAnnotations($landmarkAnnotations)
  {
    $this->landmarkAnnotations = $landmarkAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function getLandmarkAnnotations()
  {
    return $this->landmarkAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1LocalizedObjectAnnotation[]
   */
  public function setLocalizedObjectAnnotations($localizedObjectAnnotations)
  {
    $this->localizedObjectAnnotations = $localizedObjectAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1LocalizedObjectAnnotation[]
   */
  public function getLocalizedObjectAnnotations()
  {
    return $this->localizedObjectAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function setLogoAnnotations($logoAnnotations)
  {
    $this->logoAnnotations = $logoAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function getLogoAnnotations()
  {
    return $this->logoAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1ProductSearchResults
   */
  public function setProductSearchResults(GoogleCloudVisionV1p3beta1ProductSearchResults $productSearchResults)
  {
    $this->productSearchResults = $productSearchResults;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1ProductSearchResults
   */
  public function getProductSearchResults()
  {
    return $this->productSearchResults;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1SafeSearchAnnotation
   */
  public function setSafeSearchAnnotation(GoogleCloudVisionV1p3beta1SafeSearchAnnotation $safeSearchAnnotation)
  {
    $this->safeSearchAnnotation = $safeSearchAnnotation;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1SafeSearchAnnotation
   */
  public function getSafeSearchAnnotation()
  {
    return $this->safeSearchAnnotation;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1EntityAnnotation[]
   */
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1WebDetection
   */
  public function setWebDetection(GoogleCloudVisionV1p3beta1WebDetection $webDetection)
  {
    $this->webDetection = $webDetection;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1WebDetection
   */
  public function getWebDetection()
  {
    return $this->webDetection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p3beta1AnnotateImageResponse::class, 'Google_Service_Vision_GoogleCloudVisionV1p3beta1AnnotateImageResponse');
