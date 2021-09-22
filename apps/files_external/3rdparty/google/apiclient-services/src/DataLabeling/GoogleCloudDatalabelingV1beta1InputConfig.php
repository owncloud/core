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

class GoogleCloudDatalabelingV1beta1InputConfig extends \Google\Model
{
  public $annotationType;
  protected $bigquerySourceType = GoogleCloudDatalabelingV1beta1BigQuerySource::class;
  protected $bigquerySourceDataType = '';
  protected $classificationMetadataType = GoogleCloudDatalabelingV1beta1ClassificationMetadata::class;
  protected $classificationMetadataDataType = '';
  public $dataType;
  protected $gcsSourceType = GoogleCloudDatalabelingV1beta1GcsSource::class;
  protected $gcsSourceDataType = '';
  protected $textMetadataType = GoogleCloudDatalabelingV1beta1TextMetadata::class;
  protected $textMetadataDataType = '';

  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1BigQuerySource
   */
  public function setBigquerySource(GoogleCloudDatalabelingV1beta1BigQuerySource $bigquerySource)
  {
    $this->bigquerySource = $bigquerySource;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1BigQuerySource
   */
  public function getBigquerySource()
  {
    return $this->bigquerySource;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ClassificationMetadata
   */
  public function setClassificationMetadata(GoogleCloudDatalabelingV1beta1ClassificationMetadata $classificationMetadata)
  {
    $this->classificationMetadata = $classificationMetadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ClassificationMetadata
   */
  public function getClassificationMetadata()
  {
    return $this->classificationMetadata;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1GcsSource
   */
  public function setGcsSource(GoogleCloudDatalabelingV1beta1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1TextMetadata
   */
  public function setTextMetadata(GoogleCloudDatalabelingV1beta1TextMetadata $textMetadata)
  {
    $this->textMetadata = $textMetadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1TextMetadata
   */
  public function getTextMetadata()
  {
    return $this->textMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1InputConfig::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig');
