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

namespace Google\Service\Storagetransfer;

class TransferSpec extends \Google\Model
{
  protected $awsS3CompatibleDataSourceType = AwsS3CompatibleData::class;
  protected $awsS3CompatibleDataSourceDataType = '';
  protected $awsS3DataSourceType = AwsS3Data::class;
  protected $awsS3DataSourceDataType = '';
  protected $azureBlobStorageDataSourceType = AzureBlobStorageData::class;
  protected $azureBlobStorageDataSourceDataType = '';
  protected $gcsDataSinkType = GcsData::class;
  protected $gcsDataSinkDataType = '';
  protected $gcsDataSourceType = GcsData::class;
  protected $gcsDataSourceDataType = '';
  protected $gcsIntermediateDataLocationType = GcsData::class;
  protected $gcsIntermediateDataLocationDataType = '';
  protected $httpDataSourceType = HttpData::class;
  protected $httpDataSourceDataType = '';
  protected $objectConditionsType = ObjectConditions::class;
  protected $objectConditionsDataType = '';
  protected $posixDataSinkType = PosixFilesystem::class;
  protected $posixDataSinkDataType = '';
  protected $posixDataSourceType = PosixFilesystem::class;
  protected $posixDataSourceDataType = '';
  /**
   * @var string
   */
  public $sinkAgentPoolName;
  /**
   * @var string
   */
  public $sourceAgentPoolName;
  protected $transferManifestType = TransferManifest::class;
  protected $transferManifestDataType = '';
  protected $transferOptionsType = TransferOptions::class;
  protected $transferOptionsDataType = '';

  /**
   * @param AwsS3CompatibleData
   */
  public function setAwsS3CompatibleDataSource(AwsS3CompatibleData $awsS3CompatibleDataSource)
  {
    $this->awsS3CompatibleDataSource = $awsS3CompatibleDataSource;
  }
  /**
   * @return AwsS3CompatibleData
   */
  public function getAwsS3CompatibleDataSource()
  {
    return $this->awsS3CompatibleDataSource;
  }
  /**
   * @param AwsS3Data
   */
  public function setAwsS3DataSource(AwsS3Data $awsS3DataSource)
  {
    $this->awsS3DataSource = $awsS3DataSource;
  }
  /**
   * @return AwsS3Data
   */
  public function getAwsS3DataSource()
  {
    return $this->awsS3DataSource;
  }
  /**
   * @param AzureBlobStorageData
   */
  public function setAzureBlobStorageDataSource(AzureBlobStorageData $azureBlobStorageDataSource)
  {
    $this->azureBlobStorageDataSource = $azureBlobStorageDataSource;
  }
  /**
   * @return AzureBlobStorageData
   */
  public function getAzureBlobStorageDataSource()
  {
    return $this->azureBlobStorageDataSource;
  }
  /**
   * @param GcsData
   */
  public function setGcsDataSink(GcsData $gcsDataSink)
  {
    $this->gcsDataSink = $gcsDataSink;
  }
  /**
   * @return GcsData
   */
  public function getGcsDataSink()
  {
    return $this->gcsDataSink;
  }
  /**
   * @param GcsData
   */
  public function setGcsDataSource(GcsData $gcsDataSource)
  {
    $this->gcsDataSource = $gcsDataSource;
  }
  /**
   * @return GcsData
   */
  public function getGcsDataSource()
  {
    return $this->gcsDataSource;
  }
  /**
   * @param GcsData
   */
  public function setGcsIntermediateDataLocation(GcsData $gcsIntermediateDataLocation)
  {
    $this->gcsIntermediateDataLocation = $gcsIntermediateDataLocation;
  }
  /**
   * @return GcsData
   */
  public function getGcsIntermediateDataLocation()
  {
    return $this->gcsIntermediateDataLocation;
  }
  /**
   * @param HttpData
   */
  public function setHttpDataSource(HttpData $httpDataSource)
  {
    $this->httpDataSource = $httpDataSource;
  }
  /**
   * @return HttpData
   */
  public function getHttpDataSource()
  {
    return $this->httpDataSource;
  }
  /**
   * @param ObjectConditions
   */
  public function setObjectConditions(ObjectConditions $objectConditions)
  {
    $this->objectConditions = $objectConditions;
  }
  /**
   * @return ObjectConditions
   */
  public function getObjectConditions()
  {
    return $this->objectConditions;
  }
  /**
   * @param PosixFilesystem
   */
  public function setPosixDataSink(PosixFilesystem $posixDataSink)
  {
    $this->posixDataSink = $posixDataSink;
  }
  /**
   * @return PosixFilesystem
   */
  public function getPosixDataSink()
  {
    return $this->posixDataSink;
  }
  /**
   * @param PosixFilesystem
   */
  public function setPosixDataSource(PosixFilesystem $posixDataSource)
  {
    $this->posixDataSource = $posixDataSource;
  }
  /**
   * @return PosixFilesystem
   */
  public function getPosixDataSource()
  {
    return $this->posixDataSource;
  }
  /**
   * @param string
   */
  public function setSinkAgentPoolName($sinkAgentPoolName)
  {
    $this->sinkAgentPoolName = $sinkAgentPoolName;
  }
  /**
   * @return string
   */
  public function getSinkAgentPoolName()
  {
    return $this->sinkAgentPoolName;
  }
  /**
   * @param string
   */
  public function setSourceAgentPoolName($sourceAgentPoolName)
  {
    $this->sourceAgentPoolName = $sourceAgentPoolName;
  }
  /**
   * @return string
   */
  public function getSourceAgentPoolName()
  {
    return $this->sourceAgentPoolName;
  }
  /**
   * @param TransferManifest
   */
  public function setTransferManifest(TransferManifest $transferManifest)
  {
    $this->transferManifest = $transferManifest;
  }
  /**
   * @return TransferManifest
   */
  public function getTransferManifest()
  {
    return $this->transferManifest;
  }
  /**
   * @param TransferOptions
   */
  public function setTransferOptions(TransferOptions $transferOptions)
  {
    $this->transferOptions = $transferOptions;
  }
  /**
   * @return TransferOptions
   */
  public function getTransferOptions()
  {
    return $this->transferOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferSpec::class, 'Google_Service_Storagetransfer_TransferSpec');
