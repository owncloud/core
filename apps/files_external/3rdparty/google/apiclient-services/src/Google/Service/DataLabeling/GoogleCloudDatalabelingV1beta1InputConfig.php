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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig extends Google_Model
{
  public $annotationType;
  protected $bigquerySourceType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BigQuerySource';
  protected $bigquerySourceDataType = '';
  protected $classificationMetadataType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetadata';
  protected $classificationMetadataDataType = '';
  public $dataType;
  protected $gcsSourceType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1GcsSource';
  protected $gcsSourceDataType = '';
  protected $textMetadataType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextMetadata';
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
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BigQuerySource
   */
  public function setBigquerySource(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BigQuerySource $bigquerySource)
  {
    $this->bigquerySource = $bigquerySource;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BigQuerySource
   */
  public function getBigquerySource()
  {
    return $this->bigquerySource;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetadata
   */
  public function setClassificationMetadata(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetadata $classificationMetadata)
  {
    $this->classificationMetadata = $classificationMetadata;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetadata
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
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1GcsSource
   */
  public function setGcsSource(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextMetadata
   */
  public function setTextMetadata(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextMetadata $textMetadata)
  {
    $this->textMetadata = $textMetadata;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextMetadata
   */
  public function getTextMetadata()
  {
    return $this->textMetadata;
  }
}
