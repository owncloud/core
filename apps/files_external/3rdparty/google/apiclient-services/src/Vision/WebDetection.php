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

class WebDetection extends \Google\Collection
{
  protected $collection_key = 'webEntities';
  protected $bestGuessLabelsType = WebLabel::class;
  protected $bestGuessLabelsDataType = 'array';
  protected $fullMatchingImagesType = WebImage::class;
  protected $fullMatchingImagesDataType = 'array';
  protected $pagesWithMatchingImagesType = WebPage::class;
  protected $pagesWithMatchingImagesDataType = 'array';
  protected $partialMatchingImagesType = WebImage::class;
  protected $partialMatchingImagesDataType = 'array';
  protected $visuallySimilarImagesType = WebImage::class;
  protected $visuallySimilarImagesDataType = 'array';
  protected $webEntitiesType = WebEntity::class;
  protected $webEntitiesDataType = 'array';

  /**
   * @param WebLabel[]
   */
  public function setBestGuessLabels($bestGuessLabels)
  {
    $this->bestGuessLabels = $bestGuessLabels;
  }
  /**
   * @return WebLabel[]
   */
  public function getBestGuessLabels()
  {
    return $this->bestGuessLabels;
  }
  /**
   * @param WebImage[]
   */
  public function setFullMatchingImages($fullMatchingImages)
  {
    $this->fullMatchingImages = $fullMatchingImages;
  }
  /**
   * @return WebImage[]
   */
  public function getFullMatchingImages()
  {
    return $this->fullMatchingImages;
  }
  /**
   * @param WebPage[]
   */
  public function setPagesWithMatchingImages($pagesWithMatchingImages)
  {
    $this->pagesWithMatchingImages = $pagesWithMatchingImages;
  }
  /**
   * @return WebPage[]
   */
  public function getPagesWithMatchingImages()
  {
    return $this->pagesWithMatchingImages;
  }
  /**
   * @param WebImage[]
   */
  public function setPartialMatchingImages($partialMatchingImages)
  {
    $this->partialMatchingImages = $partialMatchingImages;
  }
  /**
   * @return WebImage[]
   */
  public function getPartialMatchingImages()
  {
    return $this->partialMatchingImages;
  }
  /**
   * @param WebImage[]
   */
  public function setVisuallySimilarImages($visuallySimilarImages)
  {
    $this->visuallySimilarImages = $visuallySimilarImages;
  }
  /**
   * @return WebImage[]
   */
  public function getVisuallySimilarImages()
  {
    return $this->visuallySimilarImages;
  }
  /**
   * @param WebEntity[]
   */
  public function setWebEntities($webEntities)
  {
    $this->webEntities = $webEntities;
  }
  /**
   * @return WebEntity[]
   */
  public function getWebEntities()
  {
    return $this->webEntities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebDetection::class, 'Google_Service_Vision_WebDetection');
