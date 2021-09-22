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

class GoogleCloudDatalabelingV1alpha1LabelOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'partialFailures';
  public $annotatedDataset;
  public $createTime;
  public $dataset;
  protected $imageBoundingBoxDetailsType = GoogleCloudDatalabelingV1alpha1LabelImageBoundingBoxOperationMetadata::class;
  protected $imageBoundingBoxDetailsDataType = '';
  protected $imageBoundingPolyDetailsType = GoogleCloudDatalabelingV1alpha1LabelImageBoundingPolyOperationMetadata::class;
  protected $imageBoundingPolyDetailsDataType = '';
  protected $imageClassificationDetailsType = GoogleCloudDatalabelingV1alpha1LabelImageClassificationOperationMetadata::class;
  protected $imageClassificationDetailsDataType = '';
  protected $imageOrientedBoundingBoxDetailsType = GoogleCloudDatalabelingV1alpha1LabelImageOrientedBoundingBoxOperationMetadata::class;
  protected $imageOrientedBoundingBoxDetailsDataType = '';
  protected $imagePolylineDetailsType = GoogleCloudDatalabelingV1alpha1LabelImagePolylineOperationMetadata::class;
  protected $imagePolylineDetailsDataType = '';
  protected $imageSegmentationDetailsType = GoogleCloudDatalabelingV1alpha1LabelImageSegmentationOperationMetadata::class;
  protected $imageSegmentationDetailsDataType = '';
  protected $partialFailuresType = GoogleRpcStatus::class;
  protected $partialFailuresDataType = 'array';
  public $progressPercent;
  protected $textClassificationDetailsType = GoogleCloudDatalabelingV1alpha1LabelTextClassificationOperationMetadata::class;
  protected $textClassificationDetailsDataType = '';
  protected $textEntityExtractionDetailsType = GoogleCloudDatalabelingV1alpha1LabelTextEntityExtractionOperationMetadata::class;
  protected $textEntityExtractionDetailsDataType = '';
  protected $videoClassificationDetailsType = GoogleCloudDatalabelingV1alpha1LabelVideoClassificationOperationMetadata::class;
  protected $videoClassificationDetailsDataType = '';
  protected $videoEventDetailsType = GoogleCloudDatalabelingV1alpha1LabelVideoEventOperationMetadata::class;
  protected $videoEventDetailsDataType = '';
  protected $videoObjectDetectionDetailsType = GoogleCloudDatalabelingV1alpha1LabelVideoObjectDetectionOperationMetadata::class;
  protected $videoObjectDetectionDetailsDataType = '';
  protected $videoObjectTrackingDetailsType = GoogleCloudDatalabelingV1alpha1LabelVideoObjectTrackingOperationMetadata::class;
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
   * @param GoogleCloudDatalabelingV1alpha1LabelImageBoundingBoxOperationMetadata
   */
  public function setImageBoundingBoxDetails(GoogleCloudDatalabelingV1alpha1LabelImageBoundingBoxOperationMetadata $imageBoundingBoxDetails)
  {
    $this->imageBoundingBoxDetails = $imageBoundingBoxDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImageBoundingBoxOperationMetadata
   */
  public function getImageBoundingBoxDetails()
  {
    return $this->imageBoundingBoxDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelImageBoundingPolyOperationMetadata
   */
  public function setImageBoundingPolyDetails(GoogleCloudDatalabelingV1alpha1LabelImageBoundingPolyOperationMetadata $imageBoundingPolyDetails)
  {
    $this->imageBoundingPolyDetails = $imageBoundingPolyDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImageBoundingPolyOperationMetadata
   */
  public function getImageBoundingPolyDetails()
  {
    return $this->imageBoundingPolyDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelImageClassificationOperationMetadata
   */
  public function setImageClassificationDetails(GoogleCloudDatalabelingV1alpha1LabelImageClassificationOperationMetadata $imageClassificationDetails)
  {
    $this->imageClassificationDetails = $imageClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImageClassificationOperationMetadata
   */
  public function getImageClassificationDetails()
  {
    return $this->imageClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function setImageOrientedBoundingBoxDetails(GoogleCloudDatalabelingV1alpha1LabelImageOrientedBoundingBoxOperationMetadata $imageOrientedBoundingBoxDetails)
  {
    $this->imageOrientedBoundingBoxDetails = $imageOrientedBoundingBoxDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function getImageOrientedBoundingBoxDetails()
  {
    return $this->imageOrientedBoundingBoxDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelImagePolylineOperationMetadata
   */
  public function setImagePolylineDetails(GoogleCloudDatalabelingV1alpha1LabelImagePolylineOperationMetadata $imagePolylineDetails)
  {
    $this->imagePolylineDetails = $imagePolylineDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImagePolylineOperationMetadata
   */
  public function getImagePolylineDetails()
  {
    return $this->imagePolylineDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelImageSegmentationOperationMetadata
   */
  public function setImageSegmentationDetails(GoogleCloudDatalabelingV1alpha1LabelImageSegmentationOperationMetadata $imageSegmentationDetails)
  {
    $this->imageSegmentationDetails = $imageSegmentationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelImageSegmentationOperationMetadata
   */
  public function getImageSegmentationDetails()
  {
    return $this->imageSegmentationDetails;
  }
  /**
   * @param GoogleRpcStatus[]
   */
  public function setPartialFailures($partialFailures)
  {
    $this->partialFailures = $partialFailures;
  }
  /**
   * @return GoogleRpcStatus[]
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
   * @param GoogleCloudDatalabelingV1alpha1LabelTextClassificationOperationMetadata
   */
  public function setTextClassificationDetails(GoogleCloudDatalabelingV1alpha1LabelTextClassificationOperationMetadata $textClassificationDetails)
  {
    $this->textClassificationDetails = $textClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelTextClassificationOperationMetadata
   */
  public function getTextClassificationDetails()
  {
    return $this->textClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelTextEntityExtractionOperationMetadata
   */
  public function setTextEntityExtractionDetails(GoogleCloudDatalabelingV1alpha1LabelTextEntityExtractionOperationMetadata $textEntityExtractionDetails)
  {
    $this->textEntityExtractionDetails = $textEntityExtractionDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelTextEntityExtractionOperationMetadata
   */
  public function getTextEntityExtractionDetails()
  {
    return $this->textEntityExtractionDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelVideoClassificationOperationMetadata
   */
  public function setVideoClassificationDetails(GoogleCloudDatalabelingV1alpha1LabelVideoClassificationOperationMetadata $videoClassificationDetails)
  {
    $this->videoClassificationDetails = $videoClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelVideoClassificationOperationMetadata
   */
  public function getVideoClassificationDetails()
  {
    return $this->videoClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelVideoEventOperationMetadata
   */
  public function setVideoEventDetails(GoogleCloudDatalabelingV1alpha1LabelVideoEventOperationMetadata $videoEventDetails)
  {
    $this->videoEventDetails = $videoEventDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelVideoEventOperationMetadata
   */
  public function getVideoEventDetails()
  {
    return $this->videoEventDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelVideoObjectDetectionOperationMetadata
   */
  public function setVideoObjectDetectionDetails(GoogleCloudDatalabelingV1alpha1LabelVideoObjectDetectionOperationMetadata $videoObjectDetectionDetails)
  {
    $this->videoObjectDetectionDetails = $videoObjectDetectionDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelVideoObjectDetectionOperationMetadata
   */
  public function getVideoObjectDetectionDetails()
  {
    return $this->videoObjectDetectionDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1alpha1LabelVideoObjectTrackingOperationMetadata
   */
  public function setVideoObjectTrackingDetails(GoogleCloudDatalabelingV1alpha1LabelVideoObjectTrackingOperationMetadata $videoObjectTrackingDetails)
  {
    $this->videoObjectTrackingDetails = $videoObjectTrackingDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1alpha1LabelVideoObjectTrackingOperationMetadata
   */
  public function getVideoObjectTrackingDetails()
  {
    return $this->videoObjectTrackingDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1alpha1LabelOperationMetadata::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1alpha1LabelOperationMetadata');
