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

namespace Google\Service\YouTube;

class ContentRating extends \Google\Collection
{
  protected $collection_key = 'fpbRatingReasons';
  /**
   * @var string
   */
  public $acbRating;
  /**
   * @var string
   */
  public $agcomRating;
  /**
   * @var string
   */
  public $anatelRating;
  /**
   * @var string
   */
  public $bbfcRating;
  /**
   * @var string
   */
  public $bfvcRating;
  /**
   * @var string
   */
  public $bmukkRating;
  /**
   * @var string
   */
  public $catvRating;
  /**
   * @var string
   */
  public $catvfrRating;
  /**
   * @var string
   */
  public $cbfcRating;
  /**
   * @var string
   */
  public $cccRating;
  /**
   * @var string
   */
  public $cceRating;
  /**
   * @var string
   */
  public $chfilmRating;
  /**
   * @var string
   */
  public $chvrsRating;
  /**
   * @var string
   */
  public $cicfRating;
  /**
   * @var string
   */
  public $cnaRating;
  /**
   * @var string
   */
  public $cncRating;
  /**
   * @var string
   */
  public $csaRating;
  /**
   * @var string
   */
  public $cscfRating;
  /**
   * @var string
   */
  public $czfilmRating;
  /**
   * @var string
   */
  public $djctqRating;
  /**
   * @var string[]
   */
  public $djctqRatingReasons;
  /**
   * @var string
   */
  public $ecbmctRating;
  /**
   * @var string
   */
  public $eefilmRating;
  /**
   * @var string
   */
  public $egfilmRating;
  /**
   * @var string
   */
  public $eirinRating;
  /**
   * @var string
   */
  public $fcbmRating;
  /**
   * @var string
   */
  public $fcoRating;
  /**
   * @var string
   */
  public $fmocRating;
  /**
   * @var string
   */
  public $fpbRating;
  /**
   * @var string[]
   */
  public $fpbRatingReasons;
  /**
   * @var string
   */
  public $fskRating;
  /**
   * @var string
   */
  public $grfilmRating;
  /**
   * @var string
   */
  public $icaaRating;
  /**
   * @var string
   */
  public $ifcoRating;
  /**
   * @var string
   */
  public $ilfilmRating;
  /**
   * @var string
   */
  public $incaaRating;
  /**
   * @var string
   */
  public $kfcbRating;
  /**
   * @var string
   */
  public $kijkwijzerRating;
  /**
   * @var string
   */
  public $kmrbRating;
  /**
   * @var string
   */
  public $lsfRating;
  /**
   * @var string
   */
  public $mccaaRating;
  /**
   * @var string
   */
  public $mccypRating;
  /**
   * @var string
   */
  public $mcstRating;
  /**
   * @var string
   */
  public $mdaRating;
  /**
   * @var string
   */
  public $medietilsynetRating;
  /**
   * @var string
   */
  public $mekuRating;
  /**
   * @var string
   */
  public $menaMpaaRating;
  /**
   * @var string
   */
  public $mibacRating;
  /**
   * @var string
   */
  public $mocRating;
  /**
   * @var string
   */
  public $moctwRating;
  /**
   * @var string
   */
  public $mpaaRating;
  /**
   * @var string
   */
  public $mpaatRating;
  /**
   * @var string
   */
  public $mtrcbRating;
  /**
   * @var string
   */
  public $nbcRating;
  /**
   * @var string
   */
  public $nbcplRating;
  /**
   * @var string
   */
  public $nfrcRating;
  /**
   * @var string
   */
  public $nfvcbRating;
  /**
   * @var string
   */
  public $nkclvRating;
  /**
   * @var string
   */
  public $nmcRating;
  /**
   * @var string
   */
  public $oflcRating;
  /**
   * @var string
   */
  public $pefilmRating;
  /**
   * @var string
   */
  public $rcnofRating;
  /**
   * @var string
   */
  public $resorteviolenciaRating;
  /**
   * @var string
   */
  public $rtcRating;
  /**
   * @var string
   */
  public $rteRating;
  /**
   * @var string
   */
  public $russiaRating;
  /**
   * @var string
   */
  public $skfilmRating;
  /**
   * @var string
   */
  public $smaisRating;
  /**
   * @var string
   */
  public $smsaRating;
  /**
   * @var string
   */
  public $tvpgRating;
  /**
   * @var string
   */
  public $ytRating;

  /**
   * @param string
   */
  public function setAcbRating($acbRating)
  {
    $this->acbRating = $acbRating;
  }
  /**
   * @return string
   */
  public function getAcbRating()
  {
    return $this->acbRating;
  }
  /**
   * @param string
   */
  public function setAgcomRating($agcomRating)
  {
    $this->agcomRating = $agcomRating;
  }
  /**
   * @return string
   */
  public function getAgcomRating()
  {
    return $this->agcomRating;
  }
  /**
   * @param string
   */
  public function setAnatelRating($anatelRating)
  {
    $this->anatelRating = $anatelRating;
  }
  /**
   * @return string
   */
  public function getAnatelRating()
  {
    return $this->anatelRating;
  }
  /**
   * @param string
   */
  public function setBbfcRating($bbfcRating)
  {
    $this->bbfcRating = $bbfcRating;
  }
  /**
   * @return string
   */
  public function getBbfcRating()
  {
    return $this->bbfcRating;
  }
  /**
   * @param string
   */
  public function setBfvcRating($bfvcRating)
  {
    $this->bfvcRating = $bfvcRating;
  }
  /**
   * @return string
   */
  public function getBfvcRating()
  {
    return $this->bfvcRating;
  }
  /**
   * @param string
   */
  public function setBmukkRating($bmukkRating)
  {
    $this->bmukkRating = $bmukkRating;
  }
  /**
   * @return string
   */
  public function getBmukkRating()
  {
    return $this->bmukkRating;
  }
  /**
   * @param string
   */
  public function setCatvRating($catvRating)
  {
    $this->catvRating = $catvRating;
  }
  /**
   * @return string
   */
  public function getCatvRating()
  {
    return $this->catvRating;
  }
  /**
   * @param string
   */
  public function setCatvfrRating($catvfrRating)
  {
    $this->catvfrRating = $catvfrRating;
  }
  /**
   * @return string
   */
  public function getCatvfrRating()
  {
    return $this->catvfrRating;
  }
  /**
   * @param string
   */
  public function setCbfcRating($cbfcRating)
  {
    $this->cbfcRating = $cbfcRating;
  }
  /**
   * @return string
   */
  public function getCbfcRating()
  {
    return $this->cbfcRating;
  }
  /**
   * @param string
   */
  public function setCccRating($cccRating)
  {
    $this->cccRating = $cccRating;
  }
  /**
   * @return string
   */
  public function getCccRating()
  {
    return $this->cccRating;
  }
  /**
   * @param string
   */
  public function setCceRating($cceRating)
  {
    $this->cceRating = $cceRating;
  }
  /**
   * @return string
   */
  public function getCceRating()
  {
    return $this->cceRating;
  }
  /**
   * @param string
   */
  public function setChfilmRating($chfilmRating)
  {
    $this->chfilmRating = $chfilmRating;
  }
  /**
   * @return string
   */
  public function getChfilmRating()
  {
    return $this->chfilmRating;
  }
  /**
   * @param string
   */
  public function setChvrsRating($chvrsRating)
  {
    $this->chvrsRating = $chvrsRating;
  }
  /**
   * @return string
   */
  public function getChvrsRating()
  {
    return $this->chvrsRating;
  }
  /**
   * @param string
   */
  public function setCicfRating($cicfRating)
  {
    $this->cicfRating = $cicfRating;
  }
  /**
   * @return string
   */
  public function getCicfRating()
  {
    return $this->cicfRating;
  }
  /**
   * @param string
   */
  public function setCnaRating($cnaRating)
  {
    $this->cnaRating = $cnaRating;
  }
  /**
   * @return string
   */
  public function getCnaRating()
  {
    return $this->cnaRating;
  }
  /**
   * @param string
   */
  public function setCncRating($cncRating)
  {
    $this->cncRating = $cncRating;
  }
  /**
   * @return string
   */
  public function getCncRating()
  {
    return $this->cncRating;
  }
  /**
   * @param string
   */
  public function setCsaRating($csaRating)
  {
    $this->csaRating = $csaRating;
  }
  /**
   * @return string
   */
  public function getCsaRating()
  {
    return $this->csaRating;
  }
  /**
   * @param string
   */
  public function setCscfRating($cscfRating)
  {
    $this->cscfRating = $cscfRating;
  }
  /**
   * @return string
   */
  public function getCscfRating()
  {
    return $this->cscfRating;
  }
  /**
   * @param string
   */
  public function setCzfilmRating($czfilmRating)
  {
    $this->czfilmRating = $czfilmRating;
  }
  /**
   * @return string
   */
  public function getCzfilmRating()
  {
    return $this->czfilmRating;
  }
  /**
   * @param string
   */
  public function setDjctqRating($djctqRating)
  {
    $this->djctqRating = $djctqRating;
  }
  /**
   * @return string
   */
  public function getDjctqRating()
  {
    return $this->djctqRating;
  }
  /**
   * @param string[]
   */
  public function setDjctqRatingReasons($djctqRatingReasons)
  {
    $this->djctqRatingReasons = $djctqRatingReasons;
  }
  /**
   * @return string[]
   */
  public function getDjctqRatingReasons()
  {
    return $this->djctqRatingReasons;
  }
  /**
   * @param string
   */
  public function setEcbmctRating($ecbmctRating)
  {
    $this->ecbmctRating = $ecbmctRating;
  }
  /**
   * @return string
   */
  public function getEcbmctRating()
  {
    return $this->ecbmctRating;
  }
  /**
   * @param string
   */
  public function setEefilmRating($eefilmRating)
  {
    $this->eefilmRating = $eefilmRating;
  }
  /**
   * @return string
   */
  public function getEefilmRating()
  {
    return $this->eefilmRating;
  }
  /**
   * @param string
   */
  public function setEgfilmRating($egfilmRating)
  {
    $this->egfilmRating = $egfilmRating;
  }
  /**
   * @return string
   */
  public function getEgfilmRating()
  {
    return $this->egfilmRating;
  }
  /**
   * @param string
   */
  public function setEirinRating($eirinRating)
  {
    $this->eirinRating = $eirinRating;
  }
  /**
   * @return string
   */
  public function getEirinRating()
  {
    return $this->eirinRating;
  }
  /**
   * @param string
   */
  public function setFcbmRating($fcbmRating)
  {
    $this->fcbmRating = $fcbmRating;
  }
  /**
   * @return string
   */
  public function getFcbmRating()
  {
    return $this->fcbmRating;
  }
  /**
   * @param string
   */
  public function setFcoRating($fcoRating)
  {
    $this->fcoRating = $fcoRating;
  }
  /**
   * @return string
   */
  public function getFcoRating()
  {
    return $this->fcoRating;
  }
  /**
   * @param string
   */
  public function setFmocRating($fmocRating)
  {
    $this->fmocRating = $fmocRating;
  }
  /**
   * @return string
   */
  public function getFmocRating()
  {
    return $this->fmocRating;
  }
  /**
   * @param string
   */
  public function setFpbRating($fpbRating)
  {
    $this->fpbRating = $fpbRating;
  }
  /**
   * @return string
   */
  public function getFpbRating()
  {
    return $this->fpbRating;
  }
  /**
   * @param string[]
   */
  public function setFpbRatingReasons($fpbRatingReasons)
  {
    $this->fpbRatingReasons = $fpbRatingReasons;
  }
  /**
   * @return string[]
   */
  public function getFpbRatingReasons()
  {
    return $this->fpbRatingReasons;
  }
  /**
   * @param string
   */
  public function setFskRating($fskRating)
  {
    $this->fskRating = $fskRating;
  }
  /**
   * @return string
   */
  public function getFskRating()
  {
    return $this->fskRating;
  }
  /**
   * @param string
   */
  public function setGrfilmRating($grfilmRating)
  {
    $this->grfilmRating = $grfilmRating;
  }
  /**
   * @return string
   */
  public function getGrfilmRating()
  {
    return $this->grfilmRating;
  }
  /**
   * @param string
   */
  public function setIcaaRating($icaaRating)
  {
    $this->icaaRating = $icaaRating;
  }
  /**
   * @return string
   */
  public function getIcaaRating()
  {
    return $this->icaaRating;
  }
  /**
   * @param string
   */
  public function setIfcoRating($ifcoRating)
  {
    $this->ifcoRating = $ifcoRating;
  }
  /**
   * @return string
   */
  public function getIfcoRating()
  {
    return $this->ifcoRating;
  }
  /**
   * @param string
   */
  public function setIlfilmRating($ilfilmRating)
  {
    $this->ilfilmRating = $ilfilmRating;
  }
  /**
   * @return string
   */
  public function getIlfilmRating()
  {
    return $this->ilfilmRating;
  }
  /**
   * @param string
   */
  public function setIncaaRating($incaaRating)
  {
    $this->incaaRating = $incaaRating;
  }
  /**
   * @return string
   */
  public function getIncaaRating()
  {
    return $this->incaaRating;
  }
  /**
   * @param string
   */
  public function setKfcbRating($kfcbRating)
  {
    $this->kfcbRating = $kfcbRating;
  }
  /**
   * @return string
   */
  public function getKfcbRating()
  {
    return $this->kfcbRating;
  }
  /**
   * @param string
   */
  public function setKijkwijzerRating($kijkwijzerRating)
  {
    $this->kijkwijzerRating = $kijkwijzerRating;
  }
  /**
   * @return string
   */
  public function getKijkwijzerRating()
  {
    return $this->kijkwijzerRating;
  }
  /**
   * @param string
   */
  public function setKmrbRating($kmrbRating)
  {
    $this->kmrbRating = $kmrbRating;
  }
  /**
   * @return string
   */
  public function getKmrbRating()
  {
    return $this->kmrbRating;
  }
  /**
   * @param string
   */
  public function setLsfRating($lsfRating)
  {
    $this->lsfRating = $lsfRating;
  }
  /**
   * @return string
   */
  public function getLsfRating()
  {
    return $this->lsfRating;
  }
  /**
   * @param string
   */
  public function setMccaaRating($mccaaRating)
  {
    $this->mccaaRating = $mccaaRating;
  }
  /**
   * @return string
   */
  public function getMccaaRating()
  {
    return $this->mccaaRating;
  }
  /**
   * @param string
   */
  public function setMccypRating($mccypRating)
  {
    $this->mccypRating = $mccypRating;
  }
  /**
   * @return string
   */
  public function getMccypRating()
  {
    return $this->mccypRating;
  }
  /**
   * @param string
   */
  public function setMcstRating($mcstRating)
  {
    $this->mcstRating = $mcstRating;
  }
  /**
   * @return string
   */
  public function getMcstRating()
  {
    return $this->mcstRating;
  }
  /**
   * @param string
   */
  public function setMdaRating($mdaRating)
  {
    $this->mdaRating = $mdaRating;
  }
  /**
   * @return string
   */
  public function getMdaRating()
  {
    return $this->mdaRating;
  }
  /**
   * @param string
   */
  public function setMedietilsynetRating($medietilsynetRating)
  {
    $this->medietilsynetRating = $medietilsynetRating;
  }
  /**
   * @return string
   */
  public function getMedietilsynetRating()
  {
    return $this->medietilsynetRating;
  }
  /**
   * @param string
   */
  public function setMekuRating($mekuRating)
  {
    $this->mekuRating = $mekuRating;
  }
  /**
   * @return string
   */
  public function getMekuRating()
  {
    return $this->mekuRating;
  }
  /**
   * @param string
   */
  public function setMenaMpaaRating($menaMpaaRating)
  {
    $this->menaMpaaRating = $menaMpaaRating;
  }
  /**
   * @return string
   */
  public function getMenaMpaaRating()
  {
    return $this->menaMpaaRating;
  }
  /**
   * @param string
   */
  public function setMibacRating($mibacRating)
  {
    $this->mibacRating = $mibacRating;
  }
  /**
   * @return string
   */
  public function getMibacRating()
  {
    return $this->mibacRating;
  }
  /**
   * @param string
   */
  public function setMocRating($mocRating)
  {
    $this->mocRating = $mocRating;
  }
  /**
   * @return string
   */
  public function getMocRating()
  {
    return $this->mocRating;
  }
  /**
   * @param string
   */
  public function setMoctwRating($moctwRating)
  {
    $this->moctwRating = $moctwRating;
  }
  /**
   * @return string
   */
  public function getMoctwRating()
  {
    return $this->moctwRating;
  }
  /**
   * @param string
   */
  public function setMpaaRating($mpaaRating)
  {
    $this->mpaaRating = $mpaaRating;
  }
  /**
   * @return string
   */
  public function getMpaaRating()
  {
    return $this->mpaaRating;
  }
  /**
   * @param string
   */
  public function setMpaatRating($mpaatRating)
  {
    $this->mpaatRating = $mpaatRating;
  }
  /**
   * @return string
   */
  public function getMpaatRating()
  {
    return $this->mpaatRating;
  }
  /**
   * @param string
   */
  public function setMtrcbRating($mtrcbRating)
  {
    $this->mtrcbRating = $mtrcbRating;
  }
  /**
   * @return string
   */
  public function getMtrcbRating()
  {
    return $this->mtrcbRating;
  }
  /**
   * @param string
   */
  public function setNbcRating($nbcRating)
  {
    $this->nbcRating = $nbcRating;
  }
  /**
   * @return string
   */
  public function getNbcRating()
  {
    return $this->nbcRating;
  }
  /**
   * @param string
   */
  public function setNbcplRating($nbcplRating)
  {
    $this->nbcplRating = $nbcplRating;
  }
  /**
   * @return string
   */
  public function getNbcplRating()
  {
    return $this->nbcplRating;
  }
  /**
   * @param string
   */
  public function setNfrcRating($nfrcRating)
  {
    $this->nfrcRating = $nfrcRating;
  }
  /**
   * @return string
   */
  public function getNfrcRating()
  {
    return $this->nfrcRating;
  }
  /**
   * @param string
   */
  public function setNfvcbRating($nfvcbRating)
  {
    $this->nfvcbRating = $nfvcbRating;
  }
  /**
   * @return string
   */
  public function getNfvcbRating()
  {
    return $this->nfvcbRating;
  }
  /**
   * @param string
   */
  public function setNkclvRating($nkclvRating)
  {
    $this->nkclvRating = $nkclvRating;
  }
  /**
   * @return string
   */
  public function getNkclvRating()
  {
    return $this->nkclvRating;
  }
  /**
   * @param string
   */
  public function setNmcRating($nmcRating)
  {
    $this->nmcRating = $nmcRating;
  }
  /**
   * @return string
   */
  public function getNmcRating()
  {
    return $this->nmcRating;
  }
  /**
   * @param string
   */
  public function setOflcRating($oflcRating)
  {
    $this->oflcRating = $oflcRating;
  }
  /**
   * @return string
   */
  public function getOflcRating()
  {
    return $this->oflcRating;
  }
  /**
   * @param string
   */
  public function setPefilmRating($pefilmRating)
  {
    $this->pefilmRating = $pefilmRating;
  }
  /**
   * @return string
   */
  public function getPefilmRating()
  {
    return $this->pefilmRating;
  }
  /**
   * @param string
   */
  public function setRcnofRating($rcnofRating)
  {
    $this->rcnofRating = $rcnofRating;
  }
  /**
   * @return string
   */
  public function getRcnofRating()
  {
    return $this->rcnofRating;
  }
  /**
   * @param string
   */
  public function setResorteviolenciaRating($resorteviolenciaRating)
  {
    $this->resorteviolenciaRating = $resorteviolenciaRating;
  }
  /**
   * @return string
   */
  public function getResorteviolenciaRating()
  {
    return $this->resorteviolenciaRating;
  }
  /**
   * @param string
   */
  public function setRtcRating($rtcRating)
  {
    $this->rtcRating = $rtcRating;
  }
  /**
   * @return string
   */
  public function getRtcRating()
  {
    return $this->rtcRating;
  }
  /**
   * @param string
   */
  public function setRteRating($rteRating)
  {
    $this->rteRating = $rteRating;
  }
  /**
   * @return string
   */
  public function getRteRating()
  {
    return $this->rteRating;
  }
  /**
   * @param string
   */
  public function setRussiaRating($russiaRating)
  {
    $this->russiaRating = $russiaRating;
  }
  /**
   * @return string
   */
  public function getRussiaRating()
  {
    return $this->russiaRating;
  }
  /**
   * @param string
   */
  public function setSkfilmRating($skfilmRating)
  {
    $this->skfilmRating = $skfilmRating;
  }
  /**
   * @return string
   */
  public function getSkfilmRating()
  {
    return $this->skfilmRating;
  }
  /**
   * @param string
   */
  public function setSmaisRating($smaisRating)
  {
    $this->smaisRating = $smaisRating;
  }
  /**
   * @return string
   */
  public function getSmaisRating()
  {
    return $this->smaisRating;
  }
  /**
   * @param string
   */
  public function setSmsaRating($smsaRating)
  {
    $this->smsaRating = $smsaRating;
  }
  /**
   * @return string
   */
  public function getSmsaRating()
  {
    return $this->smsaRating;
  }
  /**
   * @param string
   */
  public function setTvpgRating($tvpgRating)
  {
    $this->tvpgRating = $tvpgRating;
  }
  /**
   * @return string
   */
  public function getTvpgRating()
  {
    return $this->tvpgRating;
  }
  /**
   * @param string
   */
  public function setYtRating($ytRating)
  {
    $this->ytRating = $ytRating;
  }
  /**
   * @return string
   */
  public function getYtRating()
  {
    return $this->ytRating;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentRating::class, 'Google_Service_YouTube_ContentRating');
