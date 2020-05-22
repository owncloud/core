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

class Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetection extends Google_Collection
{
  protected $collection_key = 'webEntities';
  protected $bestGuessLabelsType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebLabel';
  protected $bestGuessLabelsDataType = 'array';
  protected $fullMatchingImagesType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage';
  protected $fullMatchingImagesDataType = 'array';
  protected $pagesWithMatchingImagesType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebPage';
  protected $pagesWithMatchingImagesDataType = 'array';
  protected $partialMatchingImagesType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage';
  protected $partialMatchingImagesDataType = 'array';
  protected $visuallySimilarImagesType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage';
  protected $visuallySimilarImagesDataType = 'array';
  protected $webEntitiesType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebEntity';
  protected $webEntitiesDataType = 'array';

  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebLabel
   */
  public function setBestGuessLabels($bestGuessLabels)
  {
    $this->bestGuessLabels = $bestGuessLabels;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebLabel
   */
  public function getBestGuessLabels()
  {
    return $this->bestGuessLabels;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function setFullMatchingImages($fullMatchingImages)
  {
    $this->fullMatchingImages = $fullMatchingImages;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function getFullMatchingImages()
  {
    return $this->fullMatchingImages;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebPage
   */
  public function setPagesWithMatchingImages($pagesWithMatchingImages)
  {
    $this->pagesWithMatchingImages = $pagesWithMatchingImages;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebPage
   */
  public function getPagesWithMatchingImages()
  {
    return $this->pagesWithMatchingImages;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function setPartialMatchingImages($partialMatchingImages)
  {
    $this->partialMatchingImages = $partialMatchingImages;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function getPartialMatchingImages()
  {
    return $this->partialMatchingImages;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function setVisuallySimilarImages($visuallySimilarImages)
  {
    $this->visuallySimilarImages = $visuallySimilarImages;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebImage
   */
  public function getVisuallySimilarImages()
  {
    return $this->visuallySimilarImages;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebEntity
   */
  public function setWebEntities($webEntities)
  {
    $this->webEntities = $webEntities;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1WebDetectionWebEntity
   */
  public function getWebEntities()
  {
    return $this->webEntities;
  }
}
