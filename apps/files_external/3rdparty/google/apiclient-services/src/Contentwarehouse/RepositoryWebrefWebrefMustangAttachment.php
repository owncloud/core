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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefWebrefMustangAttachment extends \Google\Collection
{
  protected $collection_key = 'undermergedMembers';
  /**
   * @var int[]
   */
  public $categoryConfidenceE2;
  /**
   * @var string[]
   */
  public $categoryEncodedMid;
  /**
   * @var int[]
   */
  public $confidenceE2;
  /**
   * @var string[]
   */
  public $encodedMid;
  protected $entityMetadataType = RepositoryWebrefWebrefAttachmentMetadata::class;
  protected $entityMetadataDataType = 'array';
  protected $iqlAttachmentType = KnowledgeAnswersIntentQueryIndexingIQLAttachment::class;
  protected $iqlAttachmentDataType = '';
  /**
   * @var int[]
   */
  public $isAuthorIndex;
  /**
   * @var int[]
   */
  public $isPublisherIndex;
  /**
   * @var int[]
   */
  public $referencePageIndex;
  /**
   * @var int[]
   */
  public $topicalityE2;
  /**
   * @var string[]
   */
  public $unboundIntentMid;
  /**
   * @var int[]
   */
  public $unboundIntentScoreE2;
  protected $undermergedMembersType = RepositoryWebrefWebrefMustangAttachmentUndermergedMembers::class;
  protected $undermergedMembersDataType = 'array';

  /**
   * @param int[]
   */
  public function setCategoryConfidenceE2($categoryConfidenceE2)
  {
    $this->categoryConfidenceE2 = $categoryConfidenceE2;
  }
  /**
   * @return int[]
   */
  public function getCategoryConfidenceE2()
  {
    return $this->categoryConfidenceE2;
  }
  /**
   * @param string[]
   */
  public function setCategoryEncodedMid($categoryEncodedMid)
  {
    $this->categoryEncodedMid = $categoryEncodedMid;
  }
  /**
   * @return string[]
   */
  public function getCategoryEncodedMid()
  {
    return $this->categoryEncodedMid;
  }
  /**
   * @param int[]
   */
  public function setConfidenceE2($confidenceE2)
  {
    $this->confidenceE2 = $confidenceE2;
  }
  /**
   * @return int[]
   */
  public function getConfidenceE2()
  {
    return $this->confidenceE2;
  }
  /**
   * @param string[]
   */
  public function setEncodedMid($encodedMid)
  {
    $this->encodedMid = $encodedMid;
  }
  /**
   * @return string[]
   */
  public function getEncodedMid()
  {
    return $this->encodedMid;
  }
  /**
   * @param RepositoryWebrefWebrefAttachmentMetadata[]
   */
  public function setEntityMetadata($entityMetadata)
  {
    $this->entityMetadata = $entityMetadata;
  }
  /**
   * @return RepositoryWebrefWebrefAttachmentMetadata[]
   */
  public function getEntityMetadata()
  {
    return $this->entityMetadata;
  }
  /**
   * @param KnowledgeAnswersIntentQueryIndexingIQLAttachment
   */
  public function setIqlAttachment(KnowledgeAnswersIntentQueryIndexingIQLAttachment $iqlAttachment)
  {
    $this->iqlAttachment = $iqlAttachment;
  }
  /**
   * @return KnowledgeAnswersIntentQueryIndexingIQLAttachment
   */
  public function getIqlAttachment()
  {
    return $this->iqlAttachment;
  }
  /**
   * @param int[]
   */
  public function setIsAuthorIndex($isAuthorIndex)
  {
    $this->isAuthorIndex = $isAuthorIndex;
  }
  /**
   * @return int[]
   */
  public function getIsAuthorIndex()
  {
    return $this->isAuthorIndex;
  }
  /**
   * @param int[]
   */
  public function setIsPublisherIndex($isPublisherIndex)
  {
    $this->isPublisherIndex = $isPublisherIndex;
  }
  /**
   * @return int[]
   */
  public function getIsPublisherIndex()
  {
    return $this->isPublisherIndex;
  }
  /**
   * @param int[]
   */
  public function setReferencePageIndex($referencePageIndex)
  {
    $this->referencePageIndex = $referencePageIndex;
  }
  /**
   * @return int[]
   */
  public function getReferencePageIndex()
  {
    return $this->referencePageIndex;
  }
  /**
   * @param int[]
   */
  public function setTopicalityE2($topicalityE2)
  {
    $this->topicalityE2 = $topicalityE2;
  }
  /**
   * @return int[]
   */
  public function getTopicalityE2()
  {
    return $this->topicalityE2;
  }
  /**
   * @param string[]
   */
  public function setUnboundIntentMid($unboundIntentMid)
  {
    $this->unboundIntentMid = $unboundIntentMid;
  }
  /**
   * @return string[]
   */
  public function getUnboundIntentMid()
  {
    return $this->unboundIntentMid;
  }
  /**
   * @param int[]
   */
  public function setUnboundIntentScoreE2($unboundIntentScoreE2)
  {
    $this->unboundIntentScoreE2 = $unboundIntentScoreE2;
  }
  /**
   * @return int[]
   */
  public function getUnboundIntentScoreE2()
  {
    return $this->unboundIntentScoreE2;
  }
  /**
   * @param RepositoryWebrefWebrefMustangAttachmentUndermergedMembers[]
   */
  public function setUndermergedMembers($undermergedMembers)
  {
    $this->undermergedMembers = $undermergedMembers;
  }
  /**
   * @return RepositoryWebrefWebrefMustangAttachmentUndermergedMembers[]
   */
  public function getUndermergedMembers()
  {
    return $this->undermergedMembers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefMustangAttachment::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefMustangAttachment');
