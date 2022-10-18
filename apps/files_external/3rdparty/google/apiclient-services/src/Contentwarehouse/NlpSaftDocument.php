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

class NlpSaftDocument extends \Google\Collection
{
  protected $collection_key = 'topic';
  protected $annotatedPhraseType = NlpSaftAnnotatedPhrase::class;
  protected $annotatedPhraseDataType = 'array';
  protected $annotationsType = Proto2BridgeMessageSet::class;
  protected $annotationsDataType = '';
  /**
   * @var string[]
   */
  public $author;
  /**
   * @var string
   */
  public $bylineDate;
  protected $constituencyNodeType = NlpSaftConstituencyNode::class;
  protected $constituencyNodeDataType = 'array';
  /**
   * @var int[]
   */
  public $constituencyRoot;
  /**
   * @var string
   */
  public $contentFirstseen;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var string
   */
  public $contentage;
  /**
   * @var string
   */
  public $date;
  /**
   * @var string
   */
  public $docid;
  protected $entityType = NlpSaftEntity::class;
  protected $entityDataType = 'array';
  /**
   * @var string[]
   */
  public $entityLabel;
  /**
   * @var int
   */
  public $focusEntity;
  /**
   * @var bool
   */
  public $golden;
  /**
   * @var string
   */
  public $httpHeaders;
  protected $hyperlinkType = NlpSaftHyperlink::class;
  protected $hyperlinkDataType = 'array';
  protected $labeledSpansType = NlpSaftLabeledSpans::class;
  protected $labeledSpansDataType = 'map';
  /**
   * @var int
   */
  public $language;
  /**
   * @var string
   */
  public $lastSignificantUpdate;
  protected $measureType = NlpSaftMeasure::class;
  protected $measureDataType = 'array';
  /**
   * @var bool
   */
  public $privacySensitive;
  protected $relationType = NlpSaftRelation::class;
  protected $relationDataType = 'array';
  /**
   * @var bool
   */
  public $rpcError;
  protected $semanticNodeType = NlpSaftSemanticNode::class;
  protected $semanticNodeDataType = 'array';
  protected $subsectionType = NlpSaftDocument::class;
  protected $subsectionDataType = 'array';
  /**
   * @var string
   */
  public $syntacticDate;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $title;
  protected $tokenType = NlpSaftToken::class;
  protected $tokenDataType = 'array';
  protected $topicType = NlpSaftDocumentTopic::class;
  protected $topicDataType = 'array';
  /**
   * @var bool
   */
  public $trace;
  /**
   * @var string
   */
  public $url;

  /**
   * @param NlpSaftAnnotatedPhrase[]
   */
  public function setAnnotatedPhrase($annotatedPhrase)
  {
    $this->annotatedPhrase = $annotatedPhrase;
  }
  /**
   * @return NlpSaftAnnotatedPhrase[]
   */
  public function getAnnotatedPhrase()
  {
    return $this->annotatedPhrase;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setAnnotations(Proto2BridgeMessageSet $annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param string[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string
   */
  public function setBylineDate($bylineDate)
  {
    $this->bylineDate = $bylineDate;
  }
  /**
   * @return string
   */
  public function getBylineDate()
  {
    return $this->bylineDate;
  }
  /**
   * @param NlpSaftConstituencyNode[]
   */
  public function setConstituencyNode($constituencyNode)
  {
    $this->constituencyNode = $constituencyNode;
  }
  /**
   * @return NlpSaftConstituencyNode[]
   */
  public function getConstituencyNode()
  {
    return $this->constituencyNode;
  }
  /**
   * @param int[]
   */
  public function setConstituencyRoot($constituencyRoot)
  {
    $this->constituencyRoot = $constituencyRoot;
  }
  /**
   * @return int[]
   */
  public function getConstituencyRoot()
  {
    return $this->constituencyRoot;
  }
  /**
   * @param string
   */
  public function setContentFirstseen($contentFirstseen)
  {
    $this->contentFirstseen = $contentFirstseen;
  }
  /**
   * @return string
   */
  public function getContentFirstseen()
  {
    return $this->contentFirstseen;
  }
  /**
   * @param int
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return int
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setContentage($contentage)
  {
    $this->contentage = $contentage;
  }
  /**
   * @return string
   */
  public function getContentage()
  {
    return $this->contentage;
  }
  /**
   * @param string
   */
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param NlpSaftEntity[]
   */
  public function setEntity($entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return NlpSaftEntity[]
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param string[]
   */
  public function setEntityLabel($entityLabel)
  {
    $this->entityLabel = $entityLabel;
  }
  /**
   * @return string[]
   */
  public function getEntityLabel()
  {
    return $this->entityLabel;
  }
  /**
   * @param int
   */
  public function setFocusEntity($focusEntity)
  {
    $this->focusEntity = $focusEntity;
  }
  /**
   * @return int
   */
  public function getFocusEntity()
  {
    return $this->focusEntity;
  }
  /**
   * @param bool
   */
  public function setGolden($golden)
  {
    $this->golden = $golden;
  }
  /**
   * @return bool
   */
  public function getGolden()
  {
    return $this->golden;
  }
  /**
   * @param string
   */
  public function setHttpHeaders($httpHeaders)
  {
    $this->httpHeaders = $httpHeaders;
  }
  /**
   * @return string
   */
  public function getHttpHeaders()
  {
    return $this->httpHeaders;
  }
  /**
   * @param NlpSaftHyperlink[]
   */
  public function setHyperlink($hyperlink)
  {
    $this->hyperlink = $hyperlink;
  }
  /**
   * @return NlpSaftHyperlink[]
   */
  public function getHyperlink()
  {
    return $this->hyperlink;
  }
  /**
   * @param NlpSaftLabeledSpans[]
   */
  public function setLabeledSpans($labeledSpans)
  {
    $this->labeledSpans = $labeledSpans;
  }
  /**
   * @return NlpSaftLabeledSpans[]
   */
  public function getLabeledSpans()
  {
    return $this->labeledSpans;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLastSignificantUpdate($lastSignificantUpdate)
  {
    $this->lastSignificantUpdate = $lastSignificantUpdate;
  }
  /**
   * @return string
   */
  public function getLastSignificantUpdate()
  {
    return $this->lastSignificantUpdate;
  }
  /**
   * @param NlpSaftMeasure[]
   */
  public function setMeasure($measure)
  {
    $this->measure = $measure;
  }
  /**
   * @return NlpSaftMeasure[]
   */
  public function getMeasure()
  {
    return $this->measure;
  }
  /**
   * @param bool
   */
  public function setPrivacySensitive($privacySensitive)
  {
    $this->privacySensitive = $privacySensitive;
  }
  /**
   * @return bool
   */
  public function getPrivacySensitive()
  {
    return $this->privacySensitive;
  }
  /**
   * @param NlpSaftRelation[]
   */
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  /**
   * @return NlpSaftRelation[]
   */
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param bool
   */
  public function setRpcError($rpcError)
  {
    $this->rpcError = $rpcError;
  }
  /**
   * @return bool
   */
  public function getRpcError()
  {
    return $this->rpcError;
  }
  /**
   * @param NlpSaftSemanticNode[]
   */
  public function setSemanticNode($semanticNode)
  {
    $this->semanticNode = $semanticNode;
  }
  /**
   * @return NlpSaftSemanticNode[]
   */
  public function getSemanticNode()
  {
    return $this->semanticNode;
  }
  /**
   * @param NlpSaftDocument[]
   */
  public function setSubsection($subsection)
  {
    $this->subsection = $subsection;
  }
  /**
   * @return NlpSaftDocument[]
   */
  public function getSubsection()
  {
    return $this->subsection;
  }
  /**
   * @param string
   */
  public function setSyntacticDate($syntacticDate)
  {
    $this->syntacticDate = $syntacticDate;
  }
  /**
   * @return string
   */
  public function getSyntacticDate()
  {
    return $this->syntacticDate;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param NlpSaftToken[]
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return NlpSaftToken[]
   */
  public function getToken()
  {
    return $this->token;
  }
  /**
   * @param NlpSaftDocumentTopic[]
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return NlpSaftDocumentTopic[]
   */
  public function getTopic()
  {
    return $this->topic;
  }
  /**
   * @param bool
   */
  public function setTrace($trace)
  {
    $this->trace = $trace;
  }
  /**
   * @return bool
   */
  public function getTrace()
  {
    return $this->trace;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftDocument::class, 'Google_Service_Contentwarehouse_NlpSaftDocument');
