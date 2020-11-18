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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelOperationMetadata extends Google_Collection
{
  protected $collection_key = 'partialFailures';
  public $annotatedDataset;
  public $createTime;
  public $dataset;
  protected $imageBoundingBoxDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingBoxOperationMetadata';
  protected $imageBoundingBoxDetailsDataType = '';
  protected $imageBoundingPolyDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingPolyOperationMetadata';
  protected $imageBoundingPolyDetailsDataType = '';
  protected $imageClassificationDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageClassificationOperationMetadata';
  protected $imageClassificationDetailsDataType = '';
  protected $imageOrientedBoundingBoxDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageOrientedBoundingBoxOperationMetadata';
  protected $imageOrientedBoundingBoxDetailsDataType = '';
  protected $imagePolylineDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImagePolylineOperationMetadata';
  protected $imagePolylineDetailsDataType = '';
  protected $imageSegmentationDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageSegmentationOperationMetadata';
  protected $imageSegmentationDetailsDataType = '';
  protected $partialFailuresType = 'Google_Service_DataLabeling_GoogleRpcStatus';
  protected $partialFailuresDataType = 'array';
  public $progressPercent;
  protected $textClassificationDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextClassificationOperationMetadata';
  protected $textClassificationDetailsDataType = '';
  protected $textEntityExtractionDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextEntityExtractionOperationMetadata';
  protected $textEntityExtractionDetailsDataType = '';
  protected $videoClassificationDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoClassificationOperationMetadata';
  protected $videoClassificationDetailsDataType = '';
  protected $videoEventDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoEventOperationMetadata';
  protected $videoEventDetailsDataType = '';
  protected $videoObjectDetectionDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectDetectionOperationMetadata';
  protected $videoObjectDetectionDetailsDataType = '';
  protected $videoObjectTrackingDetailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectTrackingOperationMetadata';
  protected $videoObjectTrackingDetailsDataType = '';

  public function setAnnotatedDataset($annotatedDataset)
  {
    $this->annotatedDataset = $annotatedDataset;
  }
  public function getAnnotatedDataset()
  {
    return $this->annotatedDataset;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingBoxOperationMetadata
   */
  public function setImageBoundingBoxDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingBoxOperationMetadata $imageBoundingBoxDetails)
  {
    $this->imageBoundingBoxDetails = $imageBoundingBoxDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingBoxOperationMetadata
   */
  public function getImageBoundingBoxDetails()
  {
    return $this->imageBoundingBoxDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingPolyOperationMetadata
   */
  public function setImageBoundingPolyDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingPolyOperationMetadata $imageBoundingPolyDetails)
  {
    $this->imageBoundingPolyDetails = $imageBoundingPolyDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageBoundingPolyOperationMetadata
   */
  public function getImageBoundingPolyDetails()
  {
    return $this->imageBoundingPolyDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageClassificationOperationMetadata
   */
  public function setImageClassificationDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageClassificationOperationMetadata $imageClassificationDetails)
  {
    $this->imageClassificationDetails = $imageClassificationDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageClassificationOperationMetadata
   */
  public function getImageClassificationDetails()
  {
    return $this->imageClassificationDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function setImageOrientedBoundingBoxDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageOrientedBoundingBoxOperationMetadata $imageOrientedBoundingBoxDetails)
  {
    $this->imageOrientedBoundingBoxDetails = $imageOrientedBoundingBoxDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function getImageOrientedBoundingBoxDetails()
  {
    return $this->imageOrientedBoundingBoxDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImagePolylineOperationMetadata
   */
  public function setImagePolylineDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImagePolylineOperationMetadata $imagePolylineDetails)
  {
    $this->imagePolylineDetails = $imagePolylineDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImagePolylineOperationMetadata
   */
  public function getImagePolylineDetails()
  {
    return $this->imagePolylineDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageSegmentationOperationMetadata
   */
  public function setImageSegmentationDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageSegmentationOperationMetadata $imageSegmentationDetails)
  {
    $this->imageSegmentationDetails = $imageSegmentationDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageSegmentationOperationMetadata
   */
  public function getImageSegmentationDetails()
  {
    return $this->imageSegmentationDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleRpcStatus
   */
  public function setPartialFailures($partialFailures)
  {
    $this->partialFailures = $partialFailures;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleRpcStatus
   */
  public function getPartialFailures()
  {
    return $this->partialFailures;
  }
  public function setProgressPercent($progressPercent)
  {
    $this->progressPercent = $progressPercent;
  }
  public function getProgressPercent()
  {
    return $this->progressPercent;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextClassificationOperationMetadata
   */
  public function setTextClassificationDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextClassificationOperationMetadata $textClassificationDetails)
  {
    $this->textClassificationDetails = $textClassificationDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextClassificationOperationMetadata
   */
  public function getTextClassificationDetails()
  {
    return $this->textClassificationDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextEntityExtractionOperationMetadata
   */
  public function setTextEntityExtractionDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextEntityExtractionOperationMetadata $textEntityExtractionDetails)
  {
    $this->textEntityExtractionDetails = $textEntityExtractionDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextEntityExtractionOperationMetadata
   */
  public function getTextEntityExtractionDetails()
  {
    return $this->textEntityExtractionDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoClassificationOperationMetadata
   */
  public function setVideoClassificationDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoClassificationOperationMetadata $videoClassificationDetails)
  {
    $this->videoClassificationDetails = $videoClassificationDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoClassificationOperationMetadata
   */
  public function getVideoClassificationDetails()
  {
    return $this->videoClassificationDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoEventOperationMetadata
   */
  public function setVideoEventDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoEventOperationMetadata $videoEventDetails)
  {
    $this->videoEventDetails = $videoEventDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoEventOperationMetadata
   */
  public function getVideoEventDetails()
  {
    return $this->videoEventDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectDetectionOperationMetadata
   */
  public function setVideoObjectDetectionDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectDetectionOperationMetadata $videoObjectDetectionDetails)
  {
    $this->videoObjectDetectionDetails = $videoObjectDetectionDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectDetectionOperationMetadata
   */
  public function getVideoObjectDetectionDetails()
  {
    return $this->videoObjectDetectionDetails;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectTrackingOperationMetadata
   */
  public function setVideoObjectTrackingDetails(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectTrackingOperationMetadata $videoObjectTrackingDetails)
  {
    $this->videoObjectTrackingDetails = $videoObjectTrackingDetails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelVideoObjectTrackingOperationMetadata
   */
  public function getVideoObjectTrackingDetails()
  {
    return $this->videoObjectTrackingDetails;
  }
}
