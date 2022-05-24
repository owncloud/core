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

class GoogleCloudDatalabelingV1p1alpha1LabelOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'partialFailures';
  /**
   * @var string
   */
  public $annotatedDataset;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $dataset;
  protected $imageBoundingBoxDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingBoxOperationMetadata::class;
  protected $imageBoundingBoxDetailsDataType = '';
  protected $imageBoundingPolyDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingPolyOperationMetadata::class;
  protected $imageBoundingPolyDetailsDataType = '';
  protected $imageClassificationDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImageClassificationOperationMetadata::class;
  protected $imageClassificationDetailsDataType = '';
  protected $imageOrientedBoundingBoxDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImageOrientedBoundingBoxOperationMetadata::class;
  protected $imageOrientedBoundingBoxDetailsDataType = '';
  protected $imagePolylineDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImagePolylineOperationMetadata::class;
  protected $imagePolylineDetailsDataType = '';
  protected $imageSegmentationDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelImageSegmentationOperationMetadata::class;
  protected $imageSegmentationDetailsDataType = '';
  protected $partialFailuresType = GoogleRpcStatus::class;
  protected $partialFailuresDataType = 'array';
  /**
   * @var int
   */
  public $progressPercent;
  protected $textClassificationDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelTextClassificationOperationMetadata::class;
  protected $textClassificationDetailsDataType = '';
  protected $textEntityExtractionDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelTextEntityExtractionOperationMetadata::class;
  protected $textEntityExtractionDetailsDataType = '';
  protected $videoClassificationDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelVideoClassificationOperationMetadata::class;
  protected $videoClassificationDetailsDataType = '';
  protected $videoEventDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelVideoEventOperationMetadata::class;
  protected $videoEventDetailsDataType = '';
  protected $videoObjectDetectionDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectDetectionOperationMetadata::class;
  protected $videoObjectDetectionDetailsDataType = '';
  protected $videoObjectTrackingDetailsType = GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectTrackingOperationMetadata::class;
  protected $videoObjectTrackingDetailsDataType = '';

  /**
   * @param string
   */
  public function setAnnotatedDataset($annotatedDataset)
  {
    $this->annotatedDataset = $annotatedDataset;
  }
  /**
   * @return string
   */
  public function getAnnotatedDataset()
  {
    return $this->annotatedDataset;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingBoxOperationMetadata
   */
  public function setImageBoundingBoxDetails(GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingBoxOperationMetadata $imageBoundingBoxDetails)
  {
    $this->imageBoundingBoxDetails = $imageBoundingBoxDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingBoxOperationMetadata
   */
  public function getImageBoundingBoxDetails()
  {
    return $this->imageBoundingBoxDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingPolyOperationMetadata
   */
  public function setImageBoundingPolyDetails(GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingPolyOperationMetadata $imageBoundingPolyDetails)
  {
    $this->imageBoundingPolyDetails = $imageBoundingPolyDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImageBoundingPolyOperationMetadata
   */
  public function getImageBoundingPolyDetails()
  {
    return $this->imageBoundingPolyDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImageClassificationOperationMetadata
   */
  public function setImageClassificationDetails(GoogleCloudDatalabelingV1p1alpha1LabelImageClassificationOperationMetadata $imageClassificationDetails)
  {
    $this->imageClassificationDetails = $imageClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImageClassificationOperationMetadata
   */
  public function getImageClassificationDetails()
  {
    return $this->imageClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function setImageOrientedBoundingBoxDetails(GoogleCloudDatalabelingV1p1alpha1LabelImageOrientedBoundingBoxOperationMetadata $imageOrientedBoundingBoxDetails)
  {
    $this->imageOrientedBoundingBoxDetails = $imageOrientedBoundingBoxDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImageOrientedBoundingBoxOperationMetadata
   */
  public function getImageOrientedBoundingBoxDetails()
  {
    return $this->imageOrientedBoundingBoxDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImagePolylineOperationMetadata
   */
  public function setImagePolylineDetails(GoogleCloudDatalabelingV1p1alpha1LabelImagePolylineOperationMetadata $imagePolylineDetails)
  {
    $this->imagePolylineDetails = $imagePolylineDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImagePolylineOperationMetadata
   */
  public function getImagePolylineDetails()
  {
    return $this->imagePolylineDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelImageSegmentationOperationMetadata
   */
  public function setImageSegmentationDetails(GoogleCloudDatalabelingV1p1alpha1LabelImageSegmentationOperationMetadata $imageSegmentationDetails)
  {
    $this->imageSegmentationDetails = $imageSegmentationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelImageSegmentationOperationMetadata
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
  /**
   * @param int
   */
  public function setProgressPercent($progressPercent)
  {
    $this->progressPercent = $progressPercent;
  }
  /**
   * @return int
   */
  public function getProgressPercent()
  {
    return $this->progressPercent;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelTextClassificationOperationMetadata
   */
  public function setTextClassificationDetails(GoogleCloudDatalabelingV1p1alpha1LabelTextClassificationOperationMetadata $textClassificationDetails)
  {
    $this->textClassificationDetails = $textClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelTextClassificationOperationMetadata
   */
  public function getTextClassificationDetails()
  {
    return $this->textClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelTextEntityExtractionOperationMetadata
   */
  public function setTextEntityExtractionDetails(GoogleCloudDatalabelingV1p1alpha1LabelTextEntityExtractionOperationMetadata $textEntityExtractionDetails)
  {
    $this->textEntityExtractionDetails = $textEntityExtractionDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelTextEntityExtractionOperationMetadata
   */
  public function getTextEntityExtractionDetails()
  {
    return $this->textEntityExtractionDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelVideoClassificationOperationMetadata
   */
  public function setVideoClassificationDetails(GoogleCloudDatalabelingV1p1alpha1LabelVideoClassificationOperationMetadata $videoClassificationDetails)
  {
    $this->videoClassificationDetails = $videoClassificationDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelVideoClassificationOperationMetadata
   */
  public function getVideoClassificationDetails()
  {
    return $this->videoClassificationDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelVideoEventOperationMetadata
   */
  public function setVideoEventDetails(GoogleCloudDatalabelingV1p1alpha1LabelVideoEventOperationMetadata $videoEventDetails)
  {
    $this->videoEventDetails = $videoEventDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelVideoEventOperationMetadata
   */
  public function getVideoEventDetails()
  {
    return $this->videoEventDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectDetectionOperationMetadata
   */
  public function setVideoObjectDetectionDetails(GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectDetectionOperationMetadata $videoObjectDetectionDetails)
  {
    $this->videoObjectDetectionDetails = $videoObjectDetectionDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectDetectionOperationMetadata
   */
  public function getVideoObjectDetectionDetails()
  {
    return $this->videoObjectDetectionDetails;
  }
  /**
   * @param GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectTrackingOperationMetadata
   */
  public function setVideoObjectTrackingDetails(GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectTrackingOperationMetadata $videoObjectTrackingDetails)
  {
    $this->videoObjectTrackingDetails = $videoObjectTrackingDetails;
  }
  /**
   * @return GoogleCloudDatalabelingV1p1alpha1LabelVideoObjectTrackingOperationMetadata
   */
  public function getVideoObjectTrackingDetails()
  {
    return $this->videoObjectTrackingDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1p1alpha1LabelOperationMetadata::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1p1alpha1LabelOperationMetadata');
