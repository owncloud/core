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

class GoogleCloudDatalabelingV1beta1Instruction extends \Google\Collection
{
  protected $collection_key = 'blockingResources';
  public $blockingResources;
  public $createTime;
  protected $csvInstructionType = GoogleCloudDatalabelingV1beta1CsvInstruction::class;
  protected $csvInstructionDataType = '';
  public $dataType;
  public $description;
  public $displayName;
  public $name;
  protected $pdfInstructionType = GoogleCloudDatalabelingV1beta1PdfInstruction::class;
  protected $pdfInstructionDataType = '';
  public $updateTime;

  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1CsvInstruction
   */
  public function setCsvInstruction(GoogleCloudDatalabelingV1beta1CsvInstruction $csvInstruction)
  {
    $this->csvInstruction = $csvInstruction;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1CsvInstruction
   */
  public function getCsvInstruction()
  {
    return $this->csvInstruction;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1PdfInstruction
   */
  public function setPdfInstruction(GoogleCloudDatalabelingV1beta1PdfInstruction $pdfInstruction)
  {
    $this->pdfInstruction = $pdfInstruction;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1PdfInstruction
   */
  public function getPdfInstruction()
  {
    return $this->pdfInstruction;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Instruction::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Instruction');
