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

class YoutubeCommentsClusteringMiniStanza extends \Google\Collection
{
  protected $collection_key = 'videoTimestamps';
  public $ansibleScores;
  public $automodScores;
  protected $blarneyStoneScoreType = YoutubeDistillerBlarneyStoneScores::class;
  protected $blarneyStoneScoreDataType = '';
  /**
   * @var string
   */
  public $channelDiscussionId;
  /**
   * @var string
   */
  public $channelId;
  public $channelProfileQualityScores;
  public $charEntropy;
  public $commentClassification;
  /**
   * @var string[]
   */
  public $commentClassificationBuckets;
  public $commentClassificationRanking;
  /**
   * @var string
   */
  public $commentType;
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $contentUpdateTimestamp;
  /**
   * @var bool
   */
  public $coverageSamplingEligible;
  /**
   * @var string
   */
  public $creationDevice;
  /**
   * @var string
   */
  public $creationTimeInSeconds;
  /**
   * @var string
   */
  public $detailedLanguageCode;
  protected $distillerEngagementsType = AppsPeopleActivityStreamqualityDistillerEngagements::class;
  protected $distillerEngagementsDataType = '';
  /**
   * @var string[]
   */
  public $eligibleQualifiedTeaserFilters;
  protected $empiricalCtrsType = VideoYoutubeCommentsRankingCTRMetrics::class;
  protected $empiricalCtrsDataType = '';
  public $fds;
  /**
   * @var bool
   */
  public $hasCreatorHeart;
  /**
   * @var bool
   */
  public $hasCreatorReply;
  /**
   * @var bool
   */
  public $isAuthorSponsor;
  /**
   * @var bool
   */
  public $isDeleted;
  /**
   * @var bool
   */
  public $isPinned;
  /**
   * @var bool
   */
  public $isPubliclyVisible;
  /**
   * @var bool
   */
  public $isReply;
  /**
   * @var bool
   */
  public $isSubscriber;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $lastReplyTimestampUsec;
  /**
   * @var bool[]
   */
  public $lowQualityDecisions;
  /**
   * @var int
   */
  public $mentionedTimestampCommentSecond;
  public $misinfoScores;
  /**
   * @var int
   */
  public $numDislikes;
  /**
   * @var int
   */
  public $numLikes;
  /**
   * @var int
   */
  public $numRepliers;
  /**
   * @var int
   */
  public $numReplies;
  /**
   * @var int
   */
  public $numSubscribersBucket;
  public $offlineEngagementScores;
  /**
   * @var string
   */
  public $parentId;
  /**
   * @var string
   */
  public $postId;
  /**
   * @var string
   */
  public $rankingPostLanguage;
  protected $segmentsType = SocialCommonSegments::class;
  protected $segmentsDataType = '';
  public $sensitivityScores;
  protected $sentimentType = YoutubeCommentsSentimentSentiment::class;
  protected $sentimentDataType = '';
  protected $smartRepliesType = VideoYoutubeCommentsClassificationProtoYouTubeCommentSmartReply::class;
  protected $smartRepliesDataType = 'map';
  /**
   * @var string
   */
  public $stanzaId;
  protected $stanzaRestrictionsType = SocialStanzaStanzaRestriction::class;
  protected $stanzaRestrictionsDataType = 'array';
  protected $subjectType = SecurityCredentialsPrincipalProto::class;
  protected $subjectDataType = '';
  /**
   * @var bool
   */
  public $subjectIsVideoOwner;
  /**
   * @var string
   */
  public $subscriptionTimestamp;
  protected $superThanksInfoType = YoutubeBackstageSuperVodCommentInfo::class;
  protected $superThanksInfoDataType = '';
  protected $textEmbeddingType = YoutubeCommentsRankingYouTubeCommentTextEmbedding::class;
  protected $textEmbeddingDataType = 'map';
  /**
   * @var int
   */
  public $textLength;
  protected $textQualityScoresType = YoutubeCommentsRankingYouTubeCommentTextQualityAnnotation::class;
  protected $textQualityScoresDataType = '';
  /**
   * @var string
   */
  public $videoId;
  /**
   * @var int[]
   */
  public $videoTimestamps;
  public $wordEntropy;
  public $ytCommentQualityScore;
  public $ytCommentQualityScore2;
  public $ytCommentQualityScore3;
  /**
   * @var string
   */
  public $ytReplyToItemId;

  public function setAnsibleScores($ansibleScores)
  {
    $this->ansibleScores = $ansibleScores;
  }
  public function getAnsibleScores()
  {
    return $this->ansibleScores;
  }
  public function setAutomodScores($automodScores)
  {
    $this->automodScores = $automodScores;
  }
  public function getAutomodScores()
  {
    return $this->automodScores;
  }
  /**
   * @param YoutubeDistillerBlarneyStoneScores
   */
  public function setBlarneyStoneScore(YoutubeDistillerBlarneyStoneScores $blarneyStoneScore)
  {
    $this->blarneyStoneScore = $blarneyStoneScore;
  }
  /**
   * @return YoutubeDistillerBlarneyStoneScores
   */
  public function getBlarneyStoneScore()
  {
    return $this->blarneyStoneScore;
  }
  /**
   * @param string
   */
  public function setChannelDiscussionId($channelDiscussionId)
  {
    $this->channelDiscussionId = $channelDiscussionId;
  }
  /**
   * @return string
   */
  public function getChannelDiscussionId()
  {
    return $this->channelDiscussionId;
  }
  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setChannelProfileQualityScores($channelProfileQualityScores)
  {
    $this->channelProfileQualityScores = $channelProfileQualityScores;
  }
  public function getChannelProfileQualityScores()
  {
    return $this->channelProfileQualityScores;
  }
  public function setCharEntropy($charEntropy)
  {
    $this->charEntropy = $charEntropy;
  }
  public function getCharEntropy()
  {
    return $this->charEntropy;
  }
  public function setCommentClassification($commentClassification)
  {
    $this->commentClassification = $commentClassification;
  }
  public function getCommentClassification()
  {
    return $this->commentClassification;
  }
  /**
   * @param string[]
   */
  public function setCommentClassificationBuckets($commentClassificationBuckets)
  {
    $this->commentClassificationBuckets = $commentClassificationBuckets;
  }
  /**
   * @return string[]
   */
  public function getCommentClassificationBuckets()
  {
    return $this->commentClassificationBuckets;
  }
  public function setCommentClassificationRanking($commentClassificationRanking)
  {
    $this->commentClassificationRanking = $commentClassificationRanking;
  }
  public function getCommentClassificationRanking()
  {
    return $this->commentClassificationRanking;
  }
  /**
   * @param string
   */
  public function setCommentType($commentType)
  {
    $this->commentType = $commentType;
  }
  /**
   * @return string
   */
  public function getCommentType()
  {
    return $this->commentType;
  }
  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setContentUpdateTimestamp($contentUpdateTimestamp)
  {
    $this->contentUpdateTimestamp = $contentUpdateTimestamp;
  }
  /**
   * @return string
   */
  public function getContentUpdateTimestamp()
  {
    return $this->contentUpdateTimestamp;
  }
  /**
   * @param bool
   */
  public function setCoverageSamplingEligible($coverageSamplingEligible)
  {
    $this->coverageSamplingEligible = $coverageSamplingEligible;
  }
  /**
   * @return bool
   */
  public function getCoverageSamplingEligible()
  {
    return $this->coverageSamplingEligible;
  }
  /**
   * @param string
   */
  public function setCreationDevice($creationDevice)
  {
    $this->creationDevice = $creationDevice;
  }
  /**
   * @return string
   */
  public function getCreationDevice()
  {
    return $this->creationDevice;
  }
  /**
   * @param string
   */
  public function setCreationTimeInSeconds($creationTimeInSeconds)
  {
    $this->creationTimeInSeconds = $creationTimeInSeconds;
  }
  /**
   * @return string
   */
  public function getCreationTimeInSeconds()
  {
    return $this->creationTimeInSeconds;
  }
  /**
   * @param string
   */
  public function setDetailedLanguageCode($detailedLanguageCode)
  {
    $this->detailedLanguageCode = $detailedLanguageCode;
  }
  /**
   * @return string
   */
  public function getDetailedLanguageCode()
  {
    return $this->detailedLanguageCode;
  }
  /**
   * @param AppsPeopleActivityStreamqualityDistillerEngagements
   */
  public function setDistillerEngagements(AppsPeopleActivityStreamqualityDistillerEngagements $distillerEngagements)
  {
    $this->distillerEngagements = $distillerEngagements;
  }
  /**
   * @return AppsPeopleActivityStreamqualityDistillerEngagements
   */
  public function getDistillerEngagements()
  {
    return $this->distillerEngagements;
  }
  /**
   * @param string[]
   */
  public function setEligibleQualifiedTeaserFilters($eligibleQualifiedTeaserFilters)
  {
    $this->eligibleQualifiedTeaserFilters = $eligibleQualifiedTeaserFilters;
  }
  /**
   * @return string[]
   */
  public function getEligibleQualifiedTeaserFilters()
  {
    return $this->eligibleQualifiedTeaserFilters;
  }
  /**
   * @param VideoYoutubeCommentsRankingCTRMetrics
   */
  public function setEmpiricalCtrs(VideoYoutubeCommentsRankingCTRMetrics $empiricalCtrs)
  {
    $this->empiricalCtrs = $empiricalCtrs;
  }
  /**
   * @return VideoYoutubeCommentsRankingCTRMetrics
   */
  public function getEmpiricalCtrs()
  {
    return $this->empiricalCtrs;
  }
  public function setFds($fds)
  {
    $this->fds = $fds;
  }
  public function getFds()
  {
    return $this->fds;
  }
  /**
   * @param bool
   */
  public function setHasCreatorHeart($hasCreatorHeart)
  {
    $this->hasCreatorHeart = $hasCreatorHeart;
  }
  /**
   * @return bool
   */
  public function getHasCreatorHeart()
  {
    return $this->hasCreatorHeart;
  }
  /**
   * @param bool
   */
  public function setHasCreatorReply($hasCreatorReply)
  {
    $this->hasCreatorReply = $hasCreatorReply;
  }
  /**
   * @return bool
   */
  public function getHasCreatorReply()
  {
    return $this->hasCreatorReply;
  }
  /**
   * @param bool
   */
  public function setIsAuthorSponsor($isAuthorSponsor)
  {
    $this->isAuthorSponsor = $isAuthorSponsor;
  }
  /**
   * @return bool
   */
  public function getIsAuthorSponsor()
  {
    return $this->isAuthorSponsor;
  }
  /**
   * @param bool
   */
  public function setIsDeleted($isDeleted)
  {
    $this->isDeleted = $isDeleted;
  }
  /**
   * @return bool
   */
  public function getIsDeleted()
  {
    return $this->isDeleted;
  }
  /**
   * @param bool
   */
  public function setIsPinned($isPinned)
  {
    $this->isPinned = $isPinned;
  }
  /**
   * @return bool
   */
  public function getIsPinned()
  {
    return $this->isPinned;
  }
  /**
   * @param bool
   */
  public function setIsPubliclyVisible($isPubliclyVisible)
  {
    $this->isPubliclyVisible = $isPubliclyVisible;
  }
  /**
   * @return bool
   */
  public function getIsPubliclyVisible()
  {
    return $this->isPubliclyVisible;
  }
  /**
   * @param bool
   */
  public function setIsReply($isReply)
  {
    $this->isReply = $isReply;
  }
  /**
   * @return bool
   */
  public function getIsReply()
  {
    return $this->isReply;
  }
  /**
   * @param bool
   */
  public function setIsSubscriber($isSubscriber)
  {
    $this->isSubscriber = $isSubscriber;
  }
  /**
   * @return bool
   */
  public function getIsSubscriber()
  {
    return $this->isSubscriber;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLastReplyTimestampUsec($lastReplyTimestampUsec)
  {
    $this->lastReplyTimestampUsec = $lastReplyTimestampUsec;
  }
  /**
   * @return string
   */
  public function getLastReplyTimestampUsec()
  {
    return $this->lastReplyTimestampUsec;
  }
  /**
   * @param bool[]
   */
  public function setLowQualityDecisions($lowQualityDecisions)
  {
    $this->lowQualityDecisions = $lowQualityDecisions;
  }
  /**
   * @return bool[]
   */
  public function getLowQualityDecisions()
  {
    return $this->lowQualityDecisions;
  }
  /**
   * @param int
   */
  public function setMentionedTimestampCommentSecond($mentionedTimestampCommentSecond)
  {
    $this->mentionedTimestampCommentSecond = $mentionedTimestampCommentSecond;
  }
  /**
   * @return int
   */
  public function getMentionedTimestampCommentSecond()
  {
    return $this->mentionedTimestampCommentSecond;
  }
  public function setMisinfoScores($misinfoScores)
  {
    $this->misinfoScores = $misinfoScores;
  }
  public function getMisinfoScores()
  {
    return $this->misinfoScores;
  }
  /**
   * @param int
   */
  public function setNumDislikes($numDislikes)
  {
    $this->numDislikes = $numDislikes;
  }
  /**
   * @return int
   */
  public function getNumDislikes()
  {
    return $this->numDislikes;
  }
  /**
   * @param int
   */
  public function setNumLikes($numLikes)
  {
    $this->numLikes = $numLikes;
  }
  /**
   * @return int
   */
  public function getNumLikes()
  {
    return $this->numLikes;
  }
  /**
   * @param int
   */
  public function setNumRepliers($numRepliers)
  {
    $this->numRepliers = $numRepliers;
  }
  /**
   * @return int
   */
  public function getNumRepliers()
  {
    return $this->numRepliers;
  }
  /**
   * @param int
   */
  public function setNumReplies($numReplies)
  {
    $this->numReplies = $numReplies;
  }
  /**
   * @return int
   */
  public function getNumReplies()
  {
    return $this->numReplies;
  }
  /**
   * @param int
   */
  public function setNumSubscribersBucket($numSubscribersBucket)
  {
    $this->numSubscribersBucket = $numSubscribersBucket;
  }
  /**
   * @return int
   */
  public function getNumSubscribersBucket()
  {
    return $this->numSubscribersBucket;
  }
  public function setOfflineEngagementScores($offlineEngagementScores)
  {
    $this->offlineEngagementScores = $offlineEngagementScores;
  }
  public function getOfflineEngagementScores()
  {
    return $this->offlineEngagementScores;
  }
  /**
   * @param string
   */
  public function setParentId($parentId)
  {
    $this->parentId = $parentId;
  }
  /**
   * @return string
   */
  public function getParentId()
  {
    return $this->parentId;
  }
  /**
   * @param string
   */
  public function setPostId($postId)
  {
    $this->postId = $postId;
  }
  /**
   * @return string
   */
  public function getPostId()
  {
    return $this->postId;
  }
  /**
   * @param string
   */
  public function setRankingPostLanguage($rankingPostLanguage)
  {
    $this->rankingPostLanguage = $rankingPostLanguage;
  }
  /**
   * @return string
   */
  public function getRankingPostLanguage()
  {
    return $this->rankingPostLanguage;
  }
  /**
   * @param SocialCommonSegments
   */
  public function setSegments(SocialCommonSegments $segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return SocialCommonSegments
   */
  public function getSegments()
  {
    return $this->segments;
  }
  public function setSensitivityScores($sensitivityScores)
  {
    $this->sensitivityScores = $sensitivityScores;
  }
  public function getSensitivityScores()
  {
    return $this->sensitivityScores;
  }
  /**
   * @param YoutubeCommentsSentimentSentiment
   */
  public function setSentiment(YoutubeCommentsSentimentSentiment $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return YoutubeCommentsSentimentSentiment
   */
  public function getSentiment()
  {
    return $this->sentiment;
  }
  /**
   * @param VideoYoutubeCommentsClassificationProtoYouTubeCommentSmartReply[]
   */
  public function setSmartReplies($smartReplies)
  {
    $this->smartReplies = $smartReplies;
  }
  /**
   * @return VideoYoutubeCommentsClassificationProtoYouTubeCommentSmartReply[]
   */
  public function getSmartReplies()
  {
    return $this->smartReplies;
  }
  /**
   * @param string
   */
  public function setStanzaId($stanzaId)
  {
    $this->stanzaId = $stanzaId;
  }
  /**
   * @return string
   */
  public function getStanzaId()
  {
    return $this->stanzaId;
  }
  /**
   * @param SocialStanzaStanzaRestriction[]
   */
  public function setStanzaRestrictions($stanzaRestrictions)
  {
    $this->stanzaRestrictions = $stanzaRestrictions;
  }
  /**
   * @return SocialStanzaStanzaRestriction[]
   */
  public function getStanzaRestrictions()
  {
    return $this->stanzaRestrictions;
  }
  /**
   * @param SecurityCredentialsPrincipalProto
   */
  public function setSubject(SecurityCredentialsPrincipalProto $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return SecurityCredentialsPrincipalProto
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param bool
   */
  public function setSubjectIsVideoOwner($subjectIsVideoOwner)
  {
    $this->subjectIsVideoOwner = $subjectIsVideoOwner;
  }
  /**
   * @return bool
   */
  public function getSubjectIsVideoOwner()
  {
    return $this->subjectIsVideoOwner;
  }
  /**
   * @param string
   */
  public function setSubscriptionTimestamp($subscriptionTimestamp)
  {
    $this->subscriptionTimestamp = $subscriptionTimestamp;
  }
  /**
   * @return string
   */
  public function getSubscriptionTimestamp()
  {
    return $this->subscriptionTimestamp;
  }
  /**
   * @param YoutubeBackstageSuperVodCommentInfo
   */
  public function setSuperThanksInfo(YoutubeBackstageSuperVodCommentInfo $superThanksInfo)
  {
    $this->superThanksInfo = $superThanksInfo;
  }
  /**
   * @return YoutubeBackstageSuperVodCommentInfo
   */
  public function getSuperThanksInfo()
  {
    return $this->superThanksInfo;
  }
  /**
   * @param YoutubeCommentsRankingYouTubeCommentTextEmbedding[]
   */
  public function setTextEmbedding($textEmbedding)
  {
    $this->textEmbedding = $textEmbedding;
  }
  /**
   * @return YoutubeCommentsRankingYouTubeCommentTextEmbedding[]
   */
  public function getTextEmbedding()
  {
    return $this->textEmbedding;
  }
  /**
   * @param int
   */
  public function setTextLength($textLength)
  {
    $this->textLength = $textLength;
  }
  /**
   * @return int
   */
  public function getTextLength()
  {
    return $this->textLength;
  }
  /**
   * @param YoutubeCommentsRankingYouTubeCommentTextQualityAnnotation
   */
  public function setTextQualityScores(YoutubeCommentsRankingYouTubeCommentTextQualityAnnotation $textQualityScores)
  {
    $this->textQualityScores = $textQualityScores;
  }
  /**
   * @return YoutubeCommentsRankingYouTubeCommentTextQualityAnnotation
   */
  public function getTextQualityScores()
  {
    return $this->textQualityScores;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
  /**
   * @param int[]
   */
  public function setVideoTimestamps($videoTimestamps)
  {
    $this->videoTimestamps = $videoTimestamps;
  }
  /**
   * @return int[]
   */
  public function getVideoTimestamps()
  {
    return $this->videoTimestamps;
  }
  public function setWordEntropy($wordEntropy)
  {
    $this->wordEntropy = $wordEntropy;
  }
  public function getWordEntropy()
  {
    return $this->wordEntropy;
  }
  public function setYtCommentQualityScore($ytCommentQualityScore)
  {
    $this->ytCommentQualityScore = $ytCommentQualityScore;
  }
  public function getYtCommentQualityScore()
  {
    return $this->ytCommentQualityScore;
  }
  public function setYtCommentQualityScore2($ytCommentQualityScore2)
  {
    $this->ytCommentQualityScore2 = $ytCommentQualityScore2;
  }
  public function getYtCommentQualityScore2()
  {
    return $this->ytCommentQualityScore2;
  }
  public function setYtCommentQualityScore3($ytCommentQualityScore3)
  {
    $this->ytCommentQualityScore3 = $ytCommentQualityScore3;
  }
  public function getYtCommentQualityScore3()
  {
    return $this->ytCommentQualityScore3;
  }
  /**
   * @param string
   */
  public function setYtReplyToItemId($ytReplyToItemId)
  {
    $this->ytReplyToItemId = $ytReplyToItemId;
  }
  /**
   * @return string
   */
  public function getYtReplyToItemId()
  {
    return $this->ytReplyToItemId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeCommentsClusteringMiniStanza::class, 'Google_Service_Contentwarehouse_YoutubeCommentsClusteringMiniStanza');
