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

class RepositoryWebrefWebrefEntity extends \Google\Collection
{
  protected $collection_key = 'mrf';
  protected $annotatedRelationshipType = RepositoryWebrefWebrefEntityRelationship::class;
  protected $annotatedRelationshipDataType = 'array';
  protected $annotationsType = RepositoryWebrefEntityAnnotations::class;
  protected $annotationsDataType = '';
  protected $collectionsType = RepositoryWebrefWebrefEntityCollections::class;
  protected $collectionsDataType = '';
  protected $entityJoinType = RepositoryWebrefEntityJoin::class;
  protected $entityJoinDataType = '';
  protected $idType = RepositoryWebrefWebrefEntityId::class;
  protected $idDataType = '';
  protected $mrfType = KnowledgeAnswersIntentQueryArgument::class;
  protected $mrfDataType = 'array';

  /**
   * @param RepositoryWebrefWebrefEntityRelationship[]
   */
  public function setAnnotatedRelationship($annotatedRelationship)
  {
    $this->annotatedRelationship = $annotatedRelationship;
  }
  /**
   * @return RepositoryWebrefWebrefEntityRelationship[]
   */
  public function getAnnotatedRelationship()
  {
    return $this->annotatedRelationship;
  }
  /**
   * @param RepositoryWebrefEntityAnnotations
   */
  public function setAnnotations(RepositoryWebrefEntityAnnotations $annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return RepositoryWebrefEntityAnnotations
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param RepositoryWebrefWebrefEntityCollections
   */
  public function setCollections(RepositoryWebrefWebrefEntityCollections $collections)
  {
    $this->collections = $collections;
  }
  /**
   * @return RepositoryWebrefWebrefEntityCollections
   */
  public function getCollections()
  {
    return $this->collections;
  }
  /**
   * @param RepositoryWebrefEntityJoin
   */
  public function setEntityJoin(RepositoryWebrefEntityJoin $entityJoin)
  {
    $this->entityJoin = $entityJoin;
  }
  /**
   * @return RepositoryWebrefEntityJoin
   */
  public function getEntityJoin()
  {
    return $this->entityJoin;
  }
  /**
   * @param RepositoryWebrefWebrefEntityId
   */
  public function setId(RepositoryWebrefWebrefEntityId $id)
  {
    $this->id = $id;
  }
  /**
   * @return RepositoryWebrefWebrefEntityId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgument[]
   */
  public function setMrf($mrf)
  {
    $this->mrf = $mrf;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgument[]
   */
  public function getMrf()
  {
    return $this->mrf;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefEntity::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefEntity');
